<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class SalesOrderController extends Controller
{
    public function index() {

        $customers = DB::table('master.m_customer')->get();

        $users = DB::table('users')->where('role_id', 2)->get();

        $data = DB::table('transaction.t_sales_order as sales_order')
                ->select(
                    'sales_order.*',
                    'customer.name as customer_name',
                    'users.display_name as assigned_to',
                    DB::raw("CASE
                                WHEN sales_order.tax_type = '0' THEN 'V0'
                                WHEN sales_order.tax_type = '1' THEN 'V1'
                                WHEN sales_order.tax_type = '2' THEN 'V2'
                                ELSE 'V3 (Sample)'
                            END AS str_tx_type"
                    ),
                    DB::raw("CASE
                                WHEN sales_order.status = '0' THEN 'DRAFT'
                                WHEN sales_order.status = '1' THEN 'MENUNGGU CLAIM DARI PIC'
                                WHEN sales_order.status = '2' THEN 'PROSES PRODUKSI (SPK)'
                                ELSE 'SELESAI'
                            END AS str_status"
                    )
                )
                ->join('master.m_customer as customer', 'customer.id', '=', 'sales_order.customer_id')
                ->leftJoin('public.users', 'users.id', '=', 'sales_order.assign_to')
                ->orderBy('sales_order.created_at', 'DESC')
                ->get();

        return view('transaction.sales-order.index', compact('data', 'customers', 'users'));
    }

    public function create() {
        $customers = DB::table('master.m_customer')->get();
        $users = DB::table('users')->get();
        return view('transaction.sales-order.create', compact('customers', 'users'));
    }

    public function save(Request $request) {

        if($request->exists('flag_use_customer_addr')){
            $customer = DB::table('master.m_customer')->where('id', $request->customer_id)->first();
            $cust_addr = $customer->address;
        } else {
            $cust_addr = $request->shipping_address;
        }

        $file_att_base64 = null;
        $file_mime_type = null;

        if ($request->hasFile('attachment')) {
            $file_att = $request->file('attachment');
            $file_mime_type = $file_att->getMimeType();
            $file_att_base64 = base64_encode(file_get_contents($file_att));
        }

        $flag_bypass = 0;

        if($request->flag_bypass != NULL) {
            $flag_bypass = $request->flag_bypass;
        }

        $salesOrder = DB::table('transaction.t_sales_order')
                    ->insertGetId([
                        'transaction_no' => DB::select("SELECT transaction.generate_sales_order_number() as transaction_no")[0]->transaction_no,
                        'ref_po_customer' => $request->ref_po_customer,
                        'customer_id' => $request->customer_id,
                        'order_date' => $request->order_date,
                        'delivery_date' => $request->delivery_date,
                        'tax_type' => $request->tax_type,
                        'assign_to' => $request->assign_to,
                        'status' => 0, // 0 = Draft, 1 = Waiting for Claimed, 2 = Claimed by PIC, 3 = Completed
                        'shipping_address' => $cust_addr,
                        'attachment' => $file_att_base64,
                        'attach_mime_type' => $file_mime_type,
                        'flag_bypass' => $flag_bypass,
                        'remarks' => $request->remarks,
                        'created_at' => date('Y-m-d H:i:s'),
                        'created_by' => Auth::user()->name,
                    ]);

        return redirect()->route('sales.edit', ['id' => $salesOrder]);
    }

    public function edit($id) {

        $users = DB::table('users')->where('role_id', 2)->get();
        $customers = DB::table('master.m_customer')->get();

        $salesOrder = DB::table('transaction.t_sales_order as sales_order')
                        ->select(
                            'sales_order.*',
                            'customer.name as cust_name',
                            'customer.id as cust_id',
                            DB::raw("CASE
                                        WHEN sales_order.status = '0' THEN 'Draft'
                                        WHEN sales_order.status = '1' THEN 'Menunggu Claim dari PIC'
                                        WHEN sales_order.status = '2' THEN 'Claimed by PIC'
                                        ELSE 'Completed'
                                    END AS str_status"),
                            DB::raw("CASE
                                        WHEN sales_order.tax_type = '0' THEN 'V0 (Kawasan Berikat)'
                                        WHEN sales_order.tax_type = '1' THEN 'V1 (Exlude Pajak)'
                                        WHEN sales_order.tax_type = '2' THEN 'V2 (Include Pajak)'
                                        ELSE 'V3 (Sample)'
                            END AS str_tax_type"),
                        )
                        ->join('master.m_customer as customer', 'customer.id', '=', 'sales_order.customer_id')
                        ->where('sales_order.id', $id)
                        ->first();

        $detailSalesOrders = DB::table('transaction.t_detail_sales_order AS detail_sales_order')
                        ->join('master.goods AS goods', 'goods.id', '=', 'detail_sales_order.goods_id')
                        ->select(
                            'detail_sales_order.id',
                            'goods.name AS goods_name',
                            'goods.spec_str',
                            'goods.meas_str',
                            'detail_sales_order.price',
                            'detail_sales_order.quantity'
                        )
                        ->where('detail_sales_order.sales_order_id', $id)
                        ->orderBy('detail_sales_order.id', 'ASC')
                        ->get();

        $goods =  DB::table('master.goods')->get();

        return view('transaction.sales-order.edit', compact('customers', 'salesOrder', 'users', 'detailSalesOrders', 'goods'));
    }

    public function update(Request $request){

        DB::table('transaction.t_sales_order')
                    ->where('id', $request->id)
                    ->update([
                        'ref_po_customer' => $request->ref_po_customer,
                        'customer_id' => $request->customer_id,
                        'order_date' => $request->order_date,
                        'delivery_date' => $request->delivery_date,
                        'tax_type' => $request->tax_type,
                        'status' => $request->status,
                        'assign_to' => $request->assign_to,
                        'shipping_address' => $request->shipping_address,
                        'remarks' => $request->remarks,
                        'updated_at' => date('Y-m-d H:i:s'),
                        'updated_by' => Auth::user()->name,
                    ]);

        return redirect()->back();
    }

    public function confirmOrder(Request $request) {

        DB::table('transaction.t_sales_order')
                    ->where('id', $request->id)
                    ->update([
                        'status' => 1,
                        'updated_at' => date('Y-m-d H:i:s'),
                        'updated_by' => Auth::user()->name,
                    ]);

        return redirect()->route('sales.index');
    }

    public function createDetail($id) {
        $substances = DB::table('master.m_substance')->get();
        return view('transaction.sales-order.detail.create', compact('substances', 'id', 'data'));
    }

    public function saveDetail(Request $request){

        DB::table('transaction.t_detail_sales_order')->insert([
            "sales_order_id" => $request->sales_order_id,
            "goods_id" => $request->goods_id,
            "quantity" => $request->quantity,
            "price" => $request->price,
            "flag_print" => $request->flag_print,
            "remarks" => $request->remarks,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => Auth::user()->name,
        ]);

        return redirect()->route('sales.edit', ['id' => $request->sales_order_id]);
    }

    public function editDetail(Request $request){

        $data = DB::table('transaction.t_detail_sales_order')->where('id', $request->id)->first();

        return response()->json([
            "data" => $data
        ], 200);
    }

    public function updateDetail(Request $request){

        DB::table('transaction.t_detail_sales_order')->where('id', $request->id)->update([
            "goods_id" => $request->goods_id,
            "quantity" => $request->quantity,
            "price" => $request->price,
            "flag_print" => $request->flag_print,
            "remarks" => $request->remarks,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => Auth::user()->name,
        ]);

        return redirect()->back();
    }

    public function deleteDetail($id){
        DB::table('transaction.t_detail_sales_order')->where('id', $id)->delete();
        return redirect()->back();
    }

    public function monitoring($id) {
        // dd($request->all());
        $salesOrder = DB::table('transaction.t_sales_order as sales_order')
                        ->select(
                            'sales_order.*',
                            'customer.name as cust_name',
                            DB::raw("CASE
                                        WHEN sales_order.status = '1' THEN 'DRAFT'
                                        WHEN sales_order.status = '2' THEN 'Claimed By PIC'
                                        ELSE 'V2 (Include Tax)'
                            END AS str_status"),
                            DB::raw("CASE
                                        WHEN sales_order.tax_type = '0' THEN 'V0 (Kawasan Berikat)'
                                        WHEN sales_order.tax_type = '1' THEN 'V1 (Exlude Pajak)'
                                        ELSE 'V2 (Include Pajak)'
                            END AS str_tax_type"),
                        )
                        ->join('master.m_customer as customer', 'customer.id', '=', 'sales_order.customer_id')
                        ->where('sales_order.id', $id)
                        ->first();

        $detailSalesOrders = DB::table('transaction.t_detail_sales_order AS detail_sales_order')
                        ->join('master.goods AS goods', 'goods.id', '=', 'detail_sales_order.goods_id')
                        ->leftJoin('transaction.t_detail_delivery_order AS detail_delivery_order', 'detail_delivery_order.detail_sales_order_id', '=', 'detail_sales_order.id')
                        ->select(
                            'detail_sales_order.id',
                            'goods.name AS goods_name',
                            'detail_sales_order.price',
                            'goods.spec_str as specification',
                            'goods.meas_str as measure',
                            'detail_sales_order.quantity',
                            DB::raw('SUM(detail_sales_order.quantity) as total_quantity'), // Aggregate function for total quantity
                            DB::raw('SUM(COALESCE(detail_delivery_order.quantity, 0)) as delivered_quantity'), // Aggregate function for total delivered quantity
                            DB::raw('SUM(detail_sales_order.quantity) - SUM(COALESCE(detail_delivery_order.quantity, 0)) as remaining_amount') // Aggregate function for remaining amount
                        )
                        ->where('detail_sales_order.sales_order_id', $id)
                        ->groupBy('detail_sales_order.id', 'goods.name', 'detail_sales_order.price', 'goods.type', 'goods.spec_str', 'goods.meas_str') // Group by all selected columns
                        ->get();

        // dd($detailSalesOrders);
        return view('transaction.sales-order.monitoring.index', compact('salesOrder', 'detailSalesOrders'));
    }

    public function detailMonitoring(Request $request) {

        $data = DB::table('transaction.t_detail_delivery_order as detail_delivery_order')
                ->select('delivery_order.travel_permit_no', 'delivery_order.delivery_date', 'goods.name as goods_name', 'goods.spec_str' ,'goods.meas_str', 'detail_delivery_order.quantity')
                ->join('transaction.t_delivery_order as delivery_order', 'delivery_order.id', '=', 'detail_delivery_order.delivery_order_id')
                ->join('transaction.t_detail_sales_order AS detail_sales_order', 'detail_sales_order.id', '=', 'detail_delivery_order.detail_sales_order_id')
                ->join('master.goods AS goods', 'goods.id', '=', 'detail_sales_order.goods_id')
                ->where('detail_delivery_order.detail_sales_order_id', $request->id)
                ->get();

        return response()->json([
            "data" => $data
        ], 200);
    }

    public function preview($id) {

        $salesOrder = DB::table('transaction.t_sales_order')->where('id', $id)->first();

        $fileAtt = base64_decode($salesOrder->attachment);

        $extention = '';

        switch ($salesOrder->attach_mime_type) {
            case 'application/pdf':
                $extension = 'pdf';
                break;
            case 'image/jpeg':
                $extension = 'jpg';
                break;
            case 'image/png':
                $extension = 'png';
                break;
            case 'image/gif':
                $extension = 'gif';
                break;
            default:
                return response('Unsupported file type', 400);
        }

        return response($fileAtt)
            ->header('Content-Type', $salesOrder->attach_mime_type)
            ->header('Content-Disposition', 'inline; filename=\"preview.$extension\"');

    }

    public function getDataCustomer(Request $request) {

        $data = DB::table('master.m_customer')->select('pic', 'tax_type')->where('id', $request->id)->first();
        return response()->json([
            "data" => $data
        ], 200);
    }
}
