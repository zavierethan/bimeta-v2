<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use PDF;

class FinishGoodsController extends Controller
{
    public function index(){
        $data = DB::table('transaction.t_stock_finish_goods AS fg')
                ->join('master.goods AS goods', 'goods.id', '=', 'fg.goods_id')
                ->select([
                    'fg.id',
                    'goods.name',
                    'fg.source_from',
                    DB::raw("CASE
                        WHEN goods.type = 'A' THEN 'A'
                        WHEN goods.type = 'B' THEN 'B'
                        WHEN goods.type = 'AB' THEN 'AB'
                        ELSE 'BB'
                    END AS goods_type_name"),
                    'fg.quantity',
                    'fg.created_at',
                    'goods.spec_str as specification',
                    'goods.meas_str as measure',
                ])
                ->get();

        $goods = DB::table('master.goods AS goods')
                ->select(
                    'goods.id as goods_id',
                    'goods.code',
                    'goods.name AS goods_name',
                    'goods.type AS goods_type',
                    'goods.spec_str as specification',
                    'goods.meas_str as measure',
                )
                ->get();

        $stocks = DB::table('transaction.t_stock_finish_goods as stock_finish_goods')
                    ->join('master.goods AS goods', 'goods.id', '=', 'stock_finish_goods.goods_id')
                    ->select(
                        'stock_finish_goods.id as stock_id',
                        'goods.code',
                        'goods.name AS goods_name',
                        'goods.type AS goods_type',
                        'goods.spec_str as specification',
                        'goods.meas_str as measure',
                    )
                    ->get();

        return view('transaction.warehouse.finish-goods.index', compact('data', 'goods', 'stocks'));
    }

    public function saveStockOpname(Request $request) {

        DB::table('transaction.t_stock_finish_goods')->insert([
            "goods_id" => $request->goods_id,
            "quantity" => $request->quantity,
            "source_from" => $request->reference,
            "created_at" => date('Y-m-d H:i:s'),
            "created_by" => Auth::user()->name,
        ]);

        return redirect()->back();
    }

    public function saveStockAdjustment(Request $request) {

        $stock = DB::table('transaction.t_stock_finish_goods')->where('id', $request->stock_id)->first();

        $totalStock = (int)$stock->quantity + (int)$request->quantity;
        DB::table('transaction.t_stock_finish_goods')->where('id', $request->stock_id)->update([
            "quantity" => $totalStock,
            "updated_at" => date('Y-m-d H:i:s'),
            "updated_by" => Auth::user()->name,
        ]);

        return redirect()->back();
    }

    public function printLabel($id) {
        $stock = DB::table('transaction.t_stock_finish_goods as stock_finish_goods')
                    ->join('master.goods AS goods', 'goods.id', '=', 'stock_finish_goods.goods_id')
                    ->select(
                        'stock_finish_goods.id',
                        'goods.name AS goods_name',
                        DB::raw("CASE
                                    WHEN goods.type = '1' THEN 'A'
                                    WHEN goods.type = '2' THEN 'B'
                                    WHEN goods.type = '3' THEN 'AB'
                                    ELSE 'BB'
                                END AS goods_type"),
                        DB::raw("CASE
                                    WHEN goods.type IN ('1', '2') THEN CONCAT(goods.ply_type, ' ', goods.flute_type, ' ', goods.substance)
                                    WHEN goods.type IN ('3', '4') THEN CONCAT(goods.bottom_ply_type, ' ', goods.bottom_flute_type, ' ', goods.bottom_substance, ' / ', goods.top_ply_type, ' ', goods.top_flute_type, ' ', goods.top_substance)
                                END AS specification"),
                        DB::raw("CASE
                                    WHEN goods.type = '1' THEN CONCAT(goods.length, ' X ', goods.width, ' ', goods.meas_unit)
                                    WHEN goods.type = '2' THEN CONCAT(goods.length, ' X ', goods.width, ' X ', goods.height, ' ', goods.meas_unit, ' (', goods.meas_type, ')')
                                    WHEN goods.type IN ('3', '4') THEN CONCAT(goods.bottom_length, ' X ', goods.bottom_width, ' X ', goods.bottom_height, ' ', goods.bottom_meas_unit, ' / ', goods.top_length, ' X ', goods.top_width, ' ', goods.top_meas_unit)
                                END AS measure")
                    )
                    ->where('stock_finish_goods.id', $id)
                    ->first();

        $pdf = PDF::loadView('transaction.warehouse.finish-goods.print', [
            'data' => $stock,
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
        return $pdf->stream($stock->id.'.pdf');
    }
}
