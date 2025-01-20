<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SalesOrderReportController extends Controller
{
    public function index() {

        $totalSalesOrder = DB::table('transaction.t_sales_order')->count();

        $totalSalesOrderonProcess = DB::table('transaction.t_sales_order')->where('status', '>=', 2 )->count();
        $totalSalesOrderAmount = number_format(DB::table('transaction.t_detail_sales_order')->sum('price'));

        $totalSalesOrderCompleted = DB::table('transaction.t_sales_order')->where('status', 3 )->count();

        return view('transaction.sales-order.report.index', compact('totalSalesOrder', 'totalSalesOrderonProcess','totalSalesOrderAmount', 'totalSalesOrderCompleted'));
    }
}
