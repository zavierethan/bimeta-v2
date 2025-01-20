<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ProductionReportController extends Controller
{
    public function index() {
        return view('transaction.production.report.index');
    }
}
