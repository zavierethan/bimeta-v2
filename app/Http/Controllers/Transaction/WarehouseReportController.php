<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class WarehouseReportController extends Controller
{
    public function index() {

        $data = DB::table('transaction.t_detail_sales_order AS detail_sales_order')
                        ->join('transaction.t_sales_order AS sales_order', 'sales_order.id', '=', 'detail_sales_order.sales_order_id')
                        ->join('master.m_customer AS customer', 'customer.id', '=', 'sales_order.customer_id')
                        ->join('master.goods AS goods', 'goods.id', '=', 'detail_sales_order.goods_id')
                        ->leftJoin('transaction.t_detail_delivery_order AS detail_delivery_order', 'detail_delivery_order.detail_sales_order_id', '=', 'detail_sales_order.id')
                        ->leftJoin('transaction.t_delivery_order AS delivery_order', 'delivery_order.id', '=', 'detail_delivery_order.delivery_order_id')
                        ->select(
                            'detail_sales_order.id',
                            'sales_order.transaction_no as sales_order',
                            'sales_order.ref_po_customer',
                            'customer.name as customer_name',
                            'goods.name AS goods_name',
                            'goods.spec_str as specification',
                            'goods.meas_str as measure',
                            'delivery_order.travel_permit_no',
                            'delivery_order.delivery_date',
                            'detail_sales_order.quantity',
                            DB::raw('SUM(detail_sales_order.quantity) as total_quantity'), // Aggregate function for total quantity
                            DB::raw('SUM(COALESCE(detail_delivery_order.quantity, 0)) as delivered_quantity'), // Aggregate function for total delivered quantity
                            DB::raw('SUM(detail_sales_order.quantity) - SUM(COALESCE(detail_delivery_order.quantity, 0)) as remaining_amount') // Aggregate function for remaining amount
                        )
                        ->groupBy('detail_sales_order.id', 'sales_order.transaction_no','customer.name', 'sales_order.ref_po_customer','delivery_order.delivery_date','delivery_order.travel_permit_no', 'goods.name', 'detail_sales_order.price', 'goods.type', 'goods.spec_str', 'goods.meas_str') // Group by all selected columns
                        ->get();

        // dd($data);

        return view('transaction.warehouse.report.index', compact('data'));
    }
}
