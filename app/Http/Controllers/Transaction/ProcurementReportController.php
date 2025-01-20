<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use PDF;

class ProcurementReportController extends Controller
{
    public function index() {

        $purchase = DB::select("
                SELECT
                    purchase.date,
                    material.name,
                    CONCAT (material.paper_type, ' ', material.gramature,' ', material.supplier_code) AS specification,
                    material.width,
                    SUM(detail_goods_receive.weight) AS total_purchase
                FROM
                    transaction.t_detail_purchase AS detail_purchase
                    JOIN transaction.t_purchase AS purchase ON purchase.id = detail_purchase.purchase_id
                    JOIN TRANSACTION.t_detail_goods_receive AS detail_goods_receive ON detail_goods_receive.detail_purchase_id = detail_purchase.ID
                    JOIN master.m_material as material on material.id = detail_purchase.material_id
                    GROUP BY material.id, purchase.date, material.name, material.paper_type, material.gramature, material.supplier_code, material.width;
        ");

        $stockList = DB::table('transaction.t_stock_raw_material AS stock')
                ->join('master.m_material AS material', 'material.id', '=', 'stock.material_id')
                ->select(
                    'material.name',
                    'material.width',
                    DB::raw('SUM(stock.weight) AS total_weight'),
                    DB::raw('COUNT(stock.material_id) AS total_roll')
                )
                ->groupBy('material.name', 'material.width')
                ->orderBy('material.width', 'ASC')
                ->get();

        $materialUsed = DB::select("
                    SELECT
                        material_used.date,
                        material.name,
                        material.width,
                        SUM(detail_material_used.quantity_used ) AS total_material_used
                    FROM
                        TRANSACTION.t_detail_material_used AS detail_material_used
                        JOIN TRANSACTION.t_material_used AS material_used ON material_used.id = detail_material_used.material_used_id
                        JOIN TRANSACTION.t_stock_raw_material AS stock_raw_material ON stock_raw_material.id = detail_material_used.material_id
                        JOIN master.m_material as material ON material.id = stock_raw_material.material_id
                        GROUP BY material.id, material.name, material.width, material_used.date;
        ");

        $suppliers = DB::table('master.m_supplier')->get();

        $materials = DB::table('master.m_material')->get();

        $totalPurchaseQuery = DB::select("
                            SELECT SUM
                                ( detail_goods_receive.weight ) as total_purchase
                            FROM
                                transaction.t_detail_purchase as detail_purchase
                                JOIN transaction.t_detail_goods_receive as detail_goods_receive
                                ON detail_goods_receive.detail_purchase_id = detail_purchase.id;
                        ");

        $totalPurchase = number_format($totalPurchaseQuery[0]->total_purchase);

        $totalMaterialUsedQuery = DB::select("
                                SELECT SUM
                                    ( detail_material_used.quantity_used ) as total_material_used
                                FROM
                                    transaction.t_detail_material_used as detail_material_used
                            ");

        $totalMaterialUsed = number_format($totalMaterialUsedQuery[0]->total_material_used);

        $totalStockMaterialQuery = DB::select("
                                SELECT SUM(stock_raw_material.weight) AS total_stock FROM transaction.t_stock_raw_material as stock_raw_material"
                            );

        $totalStockMaterial = number_format($totalStockMaterialQuery[0]->total_stock);


        return view('transaction.procurement.report.index', compact('purchase', 'stockList', 'materialUsed', 'materials', 'suppliers', 'totalPurchase', 'totalMaterialUsed', 'totalStockMaterial'));
    }

    public function reportExport(Request $request) {

        $materials = DB::select("
                    SELECT
                        material.NAME,
                        material.width,
                        material.supplier_code,
                        COALESCE (SUM ( stock_raw_material.weight ), 0 ) AS initial_stock,
                        COALESCE ( SUM ( detail_goods_receive.weight ), 0 ) AS quantity_order,
                        COALESCE ( SUM ( detail_material_used.quantity_used ), 0 ) AS quantity_used,
                        (COALESCE (SUM ( stock_raw_material.weight ), 0 ) + COALESCE ( SUM ( detail_goods_receive.weight ), 0 ) - COALESCE ( SUM ( detail_material_used.quantity_used ), 0 )) AS remaining_qty
                    FROM
                        master.m_material AS material
                        LEFT JOIN TRANSACTION.t_stock_raw_material AS stock_raw_material ON stock_raw_material.material_id = material.id
                        LEFT JOIN TRANSACTION.t_detail_material_used AS detail_material_used ON detail_material_used.material_id = stock_raw_material.id
                        LEFT JOIN TRANSACTION.t_detail_purchase AS detail_purchase ON detail_purchase.material_id = material.id
                        LEFT JOIN TRANSACTION.t_detail_goods_receive AS detail_goods_receive ON detail_goods_receive.detail_purchase_id = detail_purchase.ID
                    WHERE
                        material.NAME LIKE '$request->material%'
                    GROUP BY
                        material.NAME,
                        material.width,
                        material.supplier_code
                    ORDER BY
                        material.width ASC;
        ");

        $supplier = DB::table('master.m_supplier')->where('code', $materials[0]->supplier_code)->first();

        $total_initial_stock = 0;
        $total_quantity_order = 0;
        $total_quantity_used = 0;
        $total_remaining_qty =0;

        foreach ($materials as $material) {
            $total_initial_stock += (int) $material->initial_stock;
            $total_quantity_order += (int) $material->quantity_order;
            $total_quantity_used += (int) $material->quantity_used;
            $total_remaining_qty += (int) $material->remaining_qty;
        }

        foreach ($materials as $material) {
            $material->initial_stock = number_format($material->initial_stock);
            $material->quantity_used = number_format($material->quantity_used);
            $material->quantity_order = number_format($material->quantity_order);
            $material->remaining_qty = number_format($material->remaining_qty);
        }

        $pdf = PDF::loadView('transaction.procurement.report.print', [
            "materials" => $materials,
            "startDate" => $request->start_date,
            "endDate" => $request->end_date,
            "supplier" => $supplier->name,
            "specification" => $request->material,
            "total_initial_stock" => number_format($total_initial_stock),
            "total_quantity_order" => number_format($total_quantity_order),
            "total_quantity_used" => number_format($total_quantity_used),
            "total_remaining_qty" => number_format($total_remaining_qty)
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
        return $pdf->stream('Laporan Persediaan Bahan Baku.pdf');
    }
}
