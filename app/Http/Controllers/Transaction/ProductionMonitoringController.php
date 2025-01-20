<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use DataTables;

class ProductionMonitoringController extends Controller
{
    public function index() {

    }

    public function getDataTable() {

        $data = DB::table('transaction.t_detail_sales_order as detail_sales_order')
                ->join('transaction.t_spk as spk', 'spk.detail_sales_order_id', '=', 'detail_sales_order.id')
                ->join('transaction.t_sales_order as sales_order', 'sales_order.id', '=', 'detail_sales_order.sales_order_id')
                ->join('public.users as user', 'user.id', '=', 'sales_order.assign_to')
                ->join('master.m_goods as goods', 'goods.id', '=', 'detail_sales_order.goods_id')
                ->join('master.m_customer as customer', 'customer.id', '=', 'sales_order.customer_id')
                ->select(
                    'spk.id',
                    'spk.*',
                    'goods.name AS goods_name',
                    'customer.name as customer_name',
                    'sales_order.ref_po_customer',
                    'user.display_name as pic',
                    DB::raw("CASE
                                WHEN goods.type = '1' THEN 'A'
                                WHEN goods.type = '2' THEN 'B'
                                WHEN goods.type = '3' THEN 'AB'
                                ELSE 'BB'
                            END AS goods_type"),
                    'spk.specification',
                    'spk.sheet_quantity',
                    'spk.quantity',
                    DB::raw("COgetDataSpkCAT(spk.netto_width, ' X ', spk.netto_length) AS netto"),
                    DB::raw("CONCAT(spk.bruto_width, ' X ', spk.bruto_length) AS bruto"),
                    'spk.current_process',
                    'spk.status',
                    DB::raw("CASE
                            WHEN spk.status = '2' THEN 'SCHEDULED'
                            WHEN spk.status = '3' THEN 'WORK IN PROGRESS'
                            ELSE 'COMPLETED'
                        END AS str_status")
                )
                ->whereIn('spk.status', [2, 3, 4])
                ->orderByDesc('spk.created_at');

        return DataTables::of($data)->make(true);
    }

    public function getDataSpk(Request $request) {

        $data = DB::table('transaction.t_spk as spk')
            ->select('spk.id', 'spk.spk_no', 'sales_order.ref_po_customer')
            ->join('transaction.t_detail_sales_order AS detail_sales_order', 'detail_sales_order.id', '=', 'spk.detail_sales_order_id')
            ->join('transaction.t_sales_order AS sales_order', 'sales_order.id', '=', 'detail_sales_order.sales_order_id')
            ->whereIn('spk.status', [2, 3])
            ->get();

        return response()->json([
            "data" => $data
        ], 200);
    }
}
