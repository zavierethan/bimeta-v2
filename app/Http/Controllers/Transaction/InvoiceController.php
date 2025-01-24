<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use PDF;

class InvoiceController extends Controller
{
    public function index() {

        $customers = DB::table('master.m_customer')->get();

        $data = DB::table('transaction.t_invoice as invoice')
                ->select(
                    'invoice.id',
                    'invoice.invoice_no',
                    'invoice.date',
                    'invoice.due_date',
                    'customer.name as customer_name',
                    DB::raw("to_char(total_price.total_price_sum, 'FM999,999,999,999,999.00') as total_price_sum")
                )
                ->join('master.m_customer AS customer', 'customer.id', '=', 'invoice.customer_id')
                ->leftJoin(DB::raw('(
                    SELECT
                        detail_invoice.invoice_id,
                        SUM(detail_delivery_order.quantity * detail_sales_order.price) as total_price_sum
                    FROM
                        transaction.t_detail_invoice as detail_invoice
                    JOIN transaction.t_delivery_order as delivery_order ON detail_invoice.delivery_order_id = delivery_order.id
                    JOIN transaction.t_detail_delivery_order as detail_delivery_order ON detail_delivery_order.delivery_order_id = delivery_order.id
                    JOIN transaction.t_detail_sales_order as detail_sales_order ON detail_sales_order.id = detail_delivery_order.detail_sales_order_id
                    GROUP BY detail_invoice.invoice_id
                ) as total_price'), 'total_price.invoice_id', '=', 'invoice.id')
                ->groupBy('invoice.id', 'invoice.invoice_no', 'invoice.date', 'invoice.due_date', 'customer.name', 'total_price.total_price_sum')
                ->orderBy('invoice.created_at', 'DESC')
                ->get();

        // dd($data);

        return view('transaction.finance.invoices.index', compact('data','customers'));
    }

    public function save(Request $request) {

        $customer = DB::table('master.m_customer')->select('m_customer.tax_type')->where('id', $request->customer_id)->first();

        if($customer->tax_type == 2 || $customer->tax_type == '2') {
            $invoice = DB::table('transaction.t_invoice')->insertGetId([
                "invoice_no" => DB::select("SELECT transaction.generate_invoice_number('$customer->tax_type') AS invoice_number")[0]->invoice_number,
                "customer_id" => $request->customer_id,
                "date" => $request->date,
                "alt_invoice_no" => DB::select("SELECT transaction.generate_invoice_number() AS invoice_number")[0]->invoice_number,
                "created_at" => date('Y-m-d H:i:s'),
                "created_by" => Auth::user()->name
            ]);

        } else {
            $invoice = DB::table('transaction.t_invoice')->insertGetId([
                "invoice_no" => DB::select("SELECT transaction.generate_invoice_number('$customer->tax_type') AS invoice_number")[0]->invoice_number,
                "customer_id" => $request->customer_id,
                "date" => $request->date,
                "created_at" => date('Y-m-d H:i:s'),
                "created_by" => Auth::user()->name
            ]);

        }


        return redirect()->route('finance.invoice.edit', ['id' => $invoice]);
    }

    public function edit($id) {

        $invoice = DB::table('transaction.t_invoice as invoice')
                ->select('invoice.id', 'invoice.invoice_no', 'invoice.date','invoice.due_date','invoice.spelled_out', 'invoice.customer_id','customer.name as cust_name', 'customer.tax_type')
                ->join('master.m_customer AS customer', 'customer.id', '=', 'invoice.customer_id')
                ->where('invoice.id', $id)
                ->first();

        $customers = DB::table('master.m_customer')->get();

        $shipmentQuery = DB::table('transaction.t_delivery_order AS delivery_order')
                ->select('delivery_order.id','delivery_order.travel_permit_no')
                ->join('transaction.t_sales_order AS sales_order', 'sales_order.id', '=', 'delivery_order.sales_order_id')
                ->join('master.m_customer AS customer', 'customer.id', '=', 'sales_order.customer_id');

        if($invoice->tax_type == 2 || $invoice->tax_type == "2") {
            $shipmentQuery->where('sales_order.tax_type', 2);
        } else {
            $shipmentQuery->whereIn('sales_order.tax_type', [0, 1]);
        }

        $shipmentList = $shipmentQuery->get();

        $detailInvoice = DB::table('transaction.t_detail_invoice as detail_invoice')
                ->select(
                    'detail_invoice.id',
                    'delivery_order.travel_permit_no',
                    'sales_order.ref_po_customer',
                    'goods.name as goods_name',
                    'goods.spec_str as specification',
                    'goods.meas_str as measure',
                    'goods.type',
                    'detail_delivery_order.quantity',
                    'detail_sales_order.price',
                    'detail_sales_order.id as detail_sales_order_id'
                )
                ->join('transaction.t_delivery_order as delivery_order', 'delivery_order.id', '=', 'detail_invoice.delivery_order_id')
                ->join('transaction.t_detail_delivery_order as detail_delivery_order', 'detail_delivery_order.delivery_order_id', '=', 'delivery_order.id')
                ->join('transaction.t_detail_sales_order as detail_sales_order', 'detail_sales_order.id', '=', 'detail_delivery_order.detail_sales_order_id')
                ->join('transaction.t_sales_order as sales_order', 'sales_order.id', '=', 'detail_sales_order.sales_order_id')
                ->join('master.goods as goods', 'goods.id', '=', 'detail_sales_order.goods_id')
                ->where('detail_invoice.invoice_id', $id)
                ->get();

        $travelPermitNos = $detailInvoice->pluck('travel_permit_no')->unique()->toArray();
        $travelPermitNosString = implode(', ', $travelPermitNos);

        $poNos = $detailInvoice->pluck('ref_po_customer')->unique()->toArray();
        $poNosString = implode(', ', $poNos);

        return view('transaction.finance.invoices.edit', compact('invoice', 'customers', 'shipmentList', 'detailInvoice', 'travelPermitNosString', 'poNosString'));
    }

    public function update(Request $request) {

        $invoice = DB::table('transaction.t_invoice')->where('id', $request->id)->update([
            "customer_id" => $request->customer_id,
            "date" => $request->date,
            "due_date" => $request->due_date
        ]);

        return redirect()->back();
    }

    public function updateSpelledOut(Request $request) {

        $invoice = DB::table('transaction.t_invoice')->where('id', $request->id)->update([
            "spelled_out" => $request->spelled_out,
        ]);

        return response()->json([
            "data" => $invoice
        ], 200);
    }

    public function saveDetail(Request $request) {

        $delivery_order_arr = $request->delivery_order_id;

        $deliveryOrderHasUsed = "";

        foreach ($delivery_order_arr as $key => $value) {
            $cekDeliveryQuery = DB::table('transaction.t_detail_invoice')->where('delivery_order_id', $value)->first();
            if($cekDeliveryQuery == null) {

                DB::table('transaction.t_detail_invoice')->insert([
                    "delivery_order_id" => $value,
                    "invoice_id" => $request->invoice_id,
                    "created_at" => date('Y-m-d H:i:s'),
                    "created_by" => Auth::user()->name
                ]);

            } else {
                $deliveryOrder = DB::table('transaction.t_delivery_order')->where('id', $value)->pluck('travel_permit_no')->first();
                $deliveryOrderHasUsed .= $deliveryOrder.", ";
            }
        }

        if(empty($deliveryOrderHasUsed)) {
            return redirect()->back();
        }

        return redirect()->back()->with('message', 'No Surat Jalan '.$deliveryOrderHasUsed.' Sudah pernah digunakan');
    }

    public function deleteDetail($id) {
        DB::table('transaction.t_detail_invoice as detail_invoice')->where('id', $id)->delete();
        return redirect()->back();
    }

    public function print($id) {

        $invoice = DB::table('transaction.t_invoice as invoice')
                ->select('invoice.id', 'invoice.invoice_no', 'invoice.date','invoice.due_date','invoice.alt_invoice_no','invoice.spelled_out', 'invoice.customer_id','customer.name as customer_name','customer.address', 'customer.tax_type')
                ->join('master.m_customer AS customer', 'customer.id', '=', 'invoice.customer_id')
                ->where('invoice.id', $id)
                ->first();

        $detailInvoice = DB::table('transaction.t_detail_invoice as detail_invoice')
                ->select(
                    'detail_invoice.id',
                    'delivery_order.travel_permit_no',
                    'sales_order.ref_po_customer',
                    'goods.name as goods_name',
                    'goods.type',
                    'goods.spec_str as specification',
                    'goods.meas_str as measure',
                    'detail_delivery_order.quantity',
                    'detail_sales_order.price',
                    DB::raw("detail_sales_order.price * detail_delivery_order.quantity as total_price")
                )
                ->join('transaction.t_delivery_order as delivery_order', 'delivery_order.id', '=', 'detail_invoice.delivery_order_id')
                ->join('transaction.t_detail_delivery_order as detail_delivery_order', 'detail_delivery_order.delivery_order_id', '=', 'delivery_order.id')
                ->join('transaction.t_detail_sales_order as detail_sales_order', 'detail_sales_order.id', '=', 'detail_delivery_order.detail_sales_order_id')
                ->join('transaction.t_sales_order as sales_order', 'sales_order.id', '=', 'detail_sales_order.sales_order_id')
                ->join('master.goods as goods', 'goods.id', '=', 'detail_sales_order.goods_id')
                ->where('detail_invoice.invoice_id', $id)
                ->get();

        $travelPermitNos = $detailInvoice->pluck('travel_permit_no')->unique()->toArray();
        $travelPermitNosString = implode(', ', $travelPermitNos);

        $poNos = $detailInvoice->pluck('ref_po_customer')->unique()->toArray();
        $poNosString = implode(', ', $poNos);

        $subtotal = $detailInvoice->sum('total_price');

        if($invoice->tax_type == 2 || $invoice->tax_type == 0) {
            $tax = 0;
        } else {
            $tax = $detailInvoice->sum('total_price') * 0.11;
        }

        $total_amount = $detailInvoice->sum('total_price') + $tax;

        if($invoice->tax_type == 2) {
            $pdf = PDF::loadView('transaction.finance.invoices.print.invoice-v2', [
                'invoice' => $invoice,
                'detailInvoice' => $detailInvoice,
                'travel_permit_no' => $travelPermitNosString,
                'po_number' => $poNosString,
                'sub_total' => $subtotal,
                'tax' => $tax,
                'total_amount' => $total_amount
            ]);
        } else {
            $pdf = PDF::loadView('transaction.finance.invoices.print.invoice-v1', [
                'invoice' => $invoice,
                'detailInvoice' => $detailInvoice,
                'travel_permit_no' => $travelPermitNosString,
                'po_number' => $poNosString,
                'sub_total' => $subtotal,
                'tax' => $tax,
                'total_amount' => $total_amount
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
        return $pdf->stream($invoice->invoice_no.'.pdf');
    }

    public function printKuitansi(Request $request) {

        $data = $request->all();

        $pdf = PDF::loadView('transaction.finance.invoices.print.kuitansi', [
            'data' => $data,
        ]);

        // Set paper size and orientation
        $pdf->setPaper('a4', 'portrait'); // Adjust the paper size and orientation as needed

        // Set options for domPDF
        $pdf->setOptions([
            'isHtml5ParserEnabled' => true,
            'isPhpEnabled' => true,
            'isHtmlParsingEnabled' => true,
            'isCssEnabled' => true,
            'isPhpEnabled' => true,
        ]);

        // Download the PDF
        return $pdf->stream('Kuitansi.pdf');
    }
}
