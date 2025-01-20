<?php

namespace App\Http\Controllers\transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use PDF;

class DeliveryController extends Controller
{
    public function index(Request $request) {
        // dd($request->tax_type);
        $salesOrders = DB::table('transaction.t_sales_order')
                    ->select('t_sales_order.*', 'm_customer.name')
                    ->join('master.m_customer', 'm_customer.id', 't_sales_order.customer_id')
                    ->where('t_sales_order.status', 2)
                    ->orWhere('t_sales_order.flag_bypass', 1)
                    ->get();

        $query = DB::table('transaction.t_delivery_order AS delivery_order')
                ->select(
                    'delivery_order.*',
                    'customer.name AS customer_name',
                    'sales_order.id AS sales_order_id',
                    'sales_order.ref_po_customer',
                    'sales_order.transaction_no',
                    'delivery_order.delivery_date AS actual_delivery_date',
                    DB::raw("CASE
                                WHEN delivery_order.status = '1' THEN 'DRAFT'
                                WHEN delivery_order.status = '2' THEN 'DALAM PENGIRIMAN'
                                WHEN delivery_order.status = '3' THEN 'SUDAH DI TERIMA CUSTOMER'
                                ELSE 'REJECT'
                            END AS status_str"
                    )
                )
                ->join('transaction.t_sales_order AS sales_order', 'sales_order.id', '=', 'delivery_order.sales_order_id')
                ->join('master.m_customer AS customer', 'customer.id', '=', 'sales_order.customer_id')
                ->orderBy('delivery_order.id', 'desc');

                if ($request->has('tax_type')) {
                    if($request->tax_type == 'sjb') {
                        $query->where('sales_order.tax_type', 0)
                            ->orWhere('sales_order.tax_type', 1);
                    }

                    if($request->tax_type == 'sjk') {
                        $query->where('sales_order.tax_type', 2);
                    }

                    if($request->tax_type == 'sjs') {
                        $query->where('sales_order.tax_type', 3);
                    }
                }

        $data = $query->get();
        // dd($data);

        return view('transaction.warehouse.delivery.index', compact('data', 'salesOrders'));
    }

    public function create() {
        $salesOrders = DB::table('transaction.t_sales_order')->get();
        return view('transaction.warehouse.delivery.create', compact('salesOrders'));
    }

    public function save(Request $request) {

        $use_attachments = 0;

        if($request->exists('flag_use_attachments')){
            $use_attachments = 1;
        }

        $tax_type = DB::table('transaction.t_sales_order')->where('id', $request->sales_order_id)->first();

        $deliveryOrder = DB::table('transaction.t_delivery_order')->insertGetId([
            "sales_order_id" => $request->sales_order_id,
            "travel_permit_no" => DB::select("SELECT transaction.generate_travel_permit_number('$tax_type->tax_type') as travel_permit_no")[0]->travel_permit_no,
            "delivery_date" => $request->delivery_date,
            "licence_plate" => $request->licence_plate,
            "driver_name" => $request->driver_name,
            "status" => 1, // 1 = Draft, 2 = On Delivery, 3 = Recieved  by customer, 4 = Rejecte by customer
            "flag_use_attachments" => $use_attachments,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => Auth::user()->name,
        ]);

        return redirect()->route('warehouse.delivery.edit', ['id' => $deliveryOrder]);
    }

    public function edit($id) {
        $deliveryOrder = DB::table('transaction.t_delivery_order AS delivery_order')
                    ->select('sales_order.id AS sales_order_id', 'sales_order.transaction_no', 'sales_order.shipping_address','delivery_order.id','delivery_order.status','delivery_order.travel_permit_no', 'customer.name AS customer_name', 'customer.address', 'customer.phone_number', 'sales_order.transaction_no', 'sales_order.ref_po_customer', 'sales_order.delivery_date AS plan_delivery_date', 'delivery_order.delivery_date AS actual_delivery_date', 'delivery_order.licence_plate', 'delivery_order.driver_name', 'delivery_order.flag_use_attachments')
                    ->join('transaction.t_sales_order AS sales_order', 'sales_order.id', '=', 'delivery_order.sales_order_id')
                    ->join('master.m_customer AS customer', 'customer.id', '=', 'sales_order.customer_id')
                    ->where('delivery_order.id', $id)
                    ->first();

        $listSPK = DB::table('transaction.t_detail_delivery_order AS detail_delivery_order')
                    ->select('spk.spk_no','spk.status', 'spk.quantity')
                    ->join('transaction.t_spk AS spk', 'spk.detail_sales_order_id', '=', 'detail_delivery_order.detail_sales_order_id')
                    ->get();

        $goodsList = DB::table('transaction.t_detail_sales_order AS detail_sales_order')
                    ->join('master.goods AS goods', 'goods.id', '=', 'detail_sales_order.goods_id')
                    ->leftJoin('transaction.t_detail_delivery_order as detail_delivery_order', 'detail_sales_order.id', '=', 'detail_delivery_order.detail_sales_order_id')
                    ->select(
                        'detail_sales_order.id',
                        'goods.code',
                        'goods.name AS goods_name',
                        'goods.type AS goods_type',
                        'detail_sales_order.price',
                        'goods.spec_str as specification',
                        'goods.meas_str as measure',
                        DB::raw('CASE
                                    WHEN detail_delivery_order.quantity IS NULL THEN detail_sales_order.quantity
                                    ELSE (detail_sales_order.quantity - detail_delivery_order.quantity)
                                END AS quantity')
                    )
                    ->where('detail_sales_order.sales_order_id', $deliveryOrder->sales_order_id)
                    ->get();

        $detailDeliveryOrder = DB::table('transaction.t_detail_delivery_order as detail_delivery_order')
                    ->select(
                        'detail_delivery_order.id',
                        'goods.name as goods_name',
                        'goods.spec_str as specification',
                        'goods.meas_str as measure',
                        'detail_delivery_order.quantity',
                        'detail_delivery_order.remarks'
                    )
                    ->join('transaction.t_delivery_order as delivery_order', 'delivery_order.id', '=', 'detail_delivery_order.delivery_order_id')
                    ->join('transaction.t_detail_sales_order as detail_sales_order', 'detail_sales_order.id', '=', 'detail_delivery_order.detail_sales_order_id')
                    ->join('master.goods as goods', 'goods.id', '=', 'detail_sales_order.goods_id')
                    ->where('detail_delivery_order.delivery_order_id', $id)
                    ->get();

        $deliveryAttachments = DB::table('transaction.t_delivery_attachments')->where('delivery_order_id',$id)->get();

        return view('transaction.warehouse.delivery.edit', compact('deliveryOrder', 'goodsList', 'detailDeliveryOrder', 'listSPK', 'deliveryAttachments'));
    }

    public function update(Request $request) {

        $deliveryOrder = DB::table('transaction.t_delivery_order')->where('id', $request->id)->update([
            "delivery_date" => $request->delivery_date,
            "status" => $request->status, // 1 = Draft, 2 = On Delivery, 3 = Recieved  by customer, 4 = Rejected by customer
            "flag_use_attachments" => $request->flag_use_attachments,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => Auth::user()->name,
        ]);

        return redirect()->back();
    }

    public function saveDetail(Request $request) {

        $goods = DB::table('transaction.t_detail_sales_order as detail_sales_order')
                ->join('master.goods as goods', 'goods.id', '=', 'detail_sales_order.goods_id')
                ->where('detail_sales_order.id', $request->detail_sales_order_id)
                ->first();


        $stocks = DB::table('transaction.t_stock_finish_goods as stock')->where('stock.goods_id', $goods->id)->orderBy('created_at', 'DESC')->get();

        $sumQty = DB::table('transaction.t_stock_finish_goods as stock')->where('stock.goods_id', $goods->id)->sum('quantity');

        $sales_order = DB::table('transaction.t_sales_order')->select('flag_bypass')->where('t_sales_order.id', $request->sales_order_id)->first();

        if($sales_order->flag_bypass != 1 || $sales_order->flag_bypass != "1") {

            if($stocks == NULL || $sumQty <= 0 ) {
                return redirect()->back()->with('error', 'Barang tidak tersedia, data tidak bisa di tambahkan jika stok <= 0 atau stok tidak terdaftar di Stock finish goods !!!');
            }

            if($sumQty < $request->quantity) {
                return redirect()->back()->with('error', 'Quantity lebih dari stock yang tersedia, data tidak bisa di tambahkan jika stok kurang dari quantitas yang di inputkan !!!');
            }

            // Asumsi jumlah stok tidak kurang dari quantity yang di butuhkan untuk pengiriman
            $tempQty = $request->quantity;

            foreach($stocks as $stock) {

                if($stock->quantity > 0 || $tempQty > 0 ) {

                    if($stock->quantity >= $tempQty) {
                        DB::table('transaction.t_stock_finish_goods as stock')->where('stock.id', $stock->id)->update([
                            "quantity" => DB::raw('quantity - ' . $tempQty),
                        ]);

                        $tempQty = $tempQty - $stock->quantity;
                    } else {
                        DB::table('transaction.t_stock_finish_goods as stock')->where('stock.id', $stock->id)->update([
                            "quantity" => DB::raw('quantity - ' . $stock->quantity),
                        ]);

                        $tempQty = $tempQty - $stock->quantity;
                    }

                } else {
                    break;
                }
            }
        }

        DB::table('transaction.t_detail_delivery_order')->insert([
            "delivery_order_id" => $request->delivery_order_id,
            "detail_sales_order_id" => $request->detail_sales_order_id,
            "quantity" => $request->quantity,
            "remarks" => $request->remarks,
            "created_at"=> date('Y-m-d H:i:s'),
            "created_by" => Auth::user()->name,
        ]);

        return redirect()->route('warehouse.delivery.edit', ['id' => $request->delivery_order_id]);
    }

    public function editDetail(Request $request) {
        $data = DB::table('transaction.t_detail_delivery_order')->where('id', $request->id)->first();

        return response()->json([
            "data" => $data
        ], 200);
    }

    public function updateDetail(Request $request) {

        DB::table('transaction.t_detail_delivery_order')->where('id', $request->id)->update([
            "detail_sales_order_id" => $request->detail_sales_order_id,
            "quantity" => $request->quantity,
            "remarks" => $request->remarks,
            "updated_at" => date('Y-m-d H:i:s'),
            "updated_by" => Auth::user()->name,
        ]);

        return redirect()->back();
    }

    public function deleteDetail($id){
        DB::table('transaction.t_detail_delivery_order')->where('id', $id)->delete();

        return redirect()->back();
    }

    public function print($id) {
        $deliveryOrder = DB::table('transaction.t_delivery_order AS delivery_order')
                    ->select(
                        'sales_order.id AS sales_order_id',
                        'sales_order.shipping_address',
                        'delivery_order.id',
                        'delivery_order.travel_permit_no',
                        'delivery_order.delivery_date',
                        'customer.name AS customer_name',
                        'sales_order.transaction_no',
                        'sales_order.ref_po_customer',
                        'sales_order.tax_type',
                        'delivery_order.licence_plate',
                        'delivery_order.driver_name',
                        'delivery_order.flag_use_attachments'
                    )
                    ->join('transaction.t_sales_order AS sales_order', 'sales_order.id', '=', 'delivery_order.sales_order_id')
                    ->join('master.m_customer AS customer', 'customer.id', '=', 'sales_order.customer_id')
                    ->where('delivery_order.id', $id)
                    ->first();

        $detailDeliveryOrder = DB::table('transaction.t_detail_delivery_order as detail_delivery_order')
                    ->select(
                        'detail_delivery_order.id',
                        'goods.name as goods_name',
                        'goods.spec_str as specification',
                        'goods.meas_str as measure',
                        'detail_delivery_order.quantity',
                        'detail_delivery_order.remarks'
                    )
                    ->join('transaction.t_delivery_order as delivery_order', 'delivery_order.id', '=', 'detail_delivery_order.delivery_order_id')
                    ->join('transaction.t_detail_sales_order as detail_sales_order', 'detail_sales_order.id', '=', 'detail_delivery_order.detail_sales_order_id')
                    ->join('master.goods as goods', 'goods.id', '=', 'detail_sales_order.goods_id')
                    ->where('detail_delivery_order.delivery_order_id', $id)
                    ->get();

        $deliveryAttachments = DB::table('transaction.t_delivery_attachments')->where('delivery_order_id', $id)->get();

        if($deliveryOrder->tax_type == 0 || $deliveryOrder->tax_type == 1){
            $pdf = PDF::loadView('transaction.warehouse.delivery.print.print-b', [
                'deliveryOrder' => $deliveryOrder,
                'detailDeliveryOrder' => $detailDeliveryOrder,
                'deliveryAttachments' => $deliveryAttachments,
            ]);
        }

        if($deliveryOrder->tax_type == 2 ){
            $pdf = PDF::loadView('transaction.warehouse.delivery.print.print-k', [
                'deliveryOrder' => $deliveryOrder,
                'detailDeliveryOrder' => $detailDeliveryOrder,
                'deliveryAttachments' => $deliveryAttachments,
            ]);
        }

        if($deliveryOrder->tax_type == 3 ){
            $pdf = PDF::loadView('transaction.warehouse.delivery.print.print-s', [
                'deliveryOrder' => $deliveryOrder,
                'detailDeliveryOrder' => $detailDeliveryOrder,
                'deliveryAttachments' => $deliveryAttachments,
            ]);
        }

        // Set paper size and orientation
        $pdf->setPaper('letter', 'portrait'); // Adjust the paper size and orientation as needed

        // Set options for domPDF
        $pdf->setOptions([
            'isHtml5ParserEnabled' => true,
            'isPhpEnabled' => true,
            'isHtmlParsingEnabled' => true,
            'isCssEnabled' => true,
            'isPhpEnabled' => true,
        ]);

        // Download the PDF
        return $pdf->stream($deliveryOrder->travel_permit_no.'.pdf');
    }

    public function saveAttachmentsDetail(Request $request) {

        try {
            DB::beginTransaction();

            $formData = $request->all();

            // dd($formData);

            foreach($formData as $item) {
                DB::table('transaction.t_delivery_attachments')->insert([
                    "delivery_order_id" => $item["delivery_order_id"],
                    "col_1" => $item["col_1"],
                    "col_2" => $item["col_2"],
                    "col_3" => $item["col_3"],
                    "col_4" => $item["col_4"],
                    "col_5" => $item["col_5"],
                    "col_6" => $item["col_6"],
                ]);
            }

            DB::commit();

            return response()->json([
                "message" => "Data successfully saved."
            ], 200);

        } catch (\Exception $e) {

            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);

        }
    }

    public function deleteAttachmentsDetail($id) {
        DB::table('transaction.t_delivery_attachments')->where('id', $id)->delete();
        return redirect()->back();
    }
}
