<?php

namespace App\Http\Controllers\transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\CorReportExport;
use App\Exports\productionReportExport;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use Auth;
use PDF;

class ProductionController extends Controller
{
    public function todoList(){
        $data = DB::table('transaction.t_sales_order as sales_order')
                ->select('sales_order.*', 'customer.name as customer_name', 'users.username as assigned_to')
                ->join('master.m_customer as customer', 'customer.id', '=', 'sales_order.customer_id')
                ->join('public.users', 'users.id', '=', 'sales_order.assign_to')
                ->where('sales_order.assign_to', Auth::user()->id)
                ->where('sales_order.status', '>' , 0)
                // ->where('sales_order.flag_bypass', '=', 1)
                ->orderBy('sales_order.created_at', 'DESC')
                ->get();

        return view('transaction.production.todo-list.index', compact('data'));
    }

    public function todoListDetail($id){

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
                            ->leftJoin('transaction.t_spk AS spk', 'spk.detail_sales_order_id', '=', 'detail_sales_order.id')
                            ->select(
                                'detail_sales_order.id',
                                'goods.name AS goods_name',
                                'goods.type',
                                'goods.spec_str',
                                'goods.meas_str',
                                'detail_sales_order.quantity',
                                DB::raw('COALESCE(SUM(spk.quantity), 0) AS spk_used'), // Menghitung jumlah total SPK yang telah digunakan
                                DB::raw('detail_sales_order.quantity - COALESCE(SUM(spk.quantity), 0) AS remaining_amount') // Menghitung sisa jumlah
                            )
                            ->where('detail_sales_order.sales_order_id', $id)
                            ->groupBy('detail_sales_order.id', 'goods.name', 'goods.type','goods.spec_str','goods.meas_str', 'detail_sales_order.quantity')
                            ->get();

        return view('transaction.production.todo-list.detail', compact('salesOrder', 'detailSalesOrders'));
    }

    public function claimOrder($id){
        DB::table('transaction.t_sales_order as sales_order')->where('id', $id)->update([
            'status' => 2, // Update status SO to 3 (Claimed by PIC)
        ]);

        return redirect()->back();
    }

    public function spk(){
        $data = DB::table('transaction.t_detail_sales_order AS detail_sales_order')
                ->join('master.goods AS goods', 'goods.id', '=', 'detail_sales_order.goods_id')
                ->join('transaction.t_spk AS spk', 'spk.detail_sales_order_id', '=', 'detail_sales_order.id')
                ->join('transaction.t_sales_order AS sales_order', 'sales_order.id', '=', 'detail_sales_order.sales_order_id')
                ->select(
                    'spk.id',
                    'spk.spk_no',
                    'goods.name AS goods_name',
                    'goods.type AS goods_type',
                    'sales_order.ref_po_customer',
                    'spk.specification',
                    'spk.sheet_quantity',
                    'spk.quantity',
                    'spk.spk_type',
                    DB::raw("CASE WHEN spk.spk_type != 'ROLL' THEN CONCAT(spk.netto_width, ' X ', spk.netto_length) ELSE '-' END AS netto"),
                    DB::raw("CASE WHEN spk.spk_type != 'ROLL' THEN CONCAT(spk.bruto_width, ' X ', spk.bruto_length) ELSE '-' END AS bruto"),
                    'spk.status'
                )
                ->whereIn('sales_order.assign_to', [Auth::user()->id,12, 2])
                ->orderByDesc('spk.created_at')
                ->get();

        $spkSchedule = DB::table('transaction.t_detail_sales_order AS detail_sales_order')
                ->join('master.goods AS goods', 'goods.id', '=', 'detail_sales_order.goods_id')
                ->join('transaction.t_spk AS spk', 'spk.detail_sales_order_id', '=', 'detail_sales_order.id')
                ->select(
                    'spk.id',
                    'spk.spk_no',
                    'goods.name AS goods_name',
                    'goods.type',
                    'spk.specification',
                    'spk.sheet_quantity',
                    'spk.quantity',
                    'spk.flute_type',
                    DB::raw("CASE WHEN spk.spk_type != 'ROLL' THEN CONCAT(spk.netto_width, ' X ', spk.netto_length) ELSE '-' END AS netto"),
                    DB::raw("CASE WHEN spk.spk_type != 'ROLL' THEN CONCAT(spk.bruto_width, ' X ', spk.bruto_length) ELSE '-' END AS bruto"),
                    'spk.status'
                )
                ->orderBy('spk.created_at', 'DESC')
                ->where('spk.status', 1)
                ->get();

        return view('transaction.production.spk.index', compact('data', 'spkSchedule'));
    }

    public function createSPK($id){
        $goodsInformations = DB::table('transaction.t_detail_sales_order AS detail_sales_order')
                        ->select(
                            'detail_sales_order.id AS detail_sales_order_id',
                            'detail_sales_order.quantity',
                            'goods.*',
                        )
                        ->join('master.goods AS goods', 'goods.id', '=', 'detail_sales_order.goods_id')
                        ->where('detail_sales_order.id', $id)
                        ->first();

        $spec_details = DB::table('master.goods_spec_details')->where('goods_id', $goodsInformations->id)->get();

        $productionProcesses = DB::table('master.m_production_process')->get();

        $totalSPKCreated = DB::table('transaction.t_spk AS spk')
                        ->where('spk.detail_sales_order_id', $id)
                        ->sum('spk.quantity');

        // dd($spec_details);

        return view('transaction.production.spk.create', compact('goodsInformations', 'totalSPKCreated', 'productionProcesses', 'spec_details'));
    }

    public function populateFromTemplate(Request $request) {
        $param = $request->param;

        $templateIsExists = DB::table('transaction.t_spk_templates')->where('goods_id', $param)->first();

        if(empty($templateIsExists)) {
            return response()->json([
                'message' => 'Data Tidak ditemukan',
            ], 404);
        }


        $data = DB::table('transaction.t_spk_templates as template')
            ->select('spk.*')
            ->leftJoin('transaction.t_spk as spk', 'spk.id', '=', 'template.spk_id')
            ->where('template.goods_id', $param)
            ->get();

        return response()->json([
            'message' => 'success',
            'data' => $data,
        ], 200);
    }

    public function createManualSPK($id){
        $goodsInformations = DB::table('transaction.t_detail_sales_order AS detail_sales_order')
                        ->select(
                            'detail_sales_order.id AS detail_sales_order_id',
                            'detail_sales_order.quantity',
                            'goods.*',
                        )
                        ->join('master.goods AS goods', 'goods.id', '=', 'detail_sales_order.goods_id')
                        ->where('detail_sales_order.id', $id)
                        ->first();

        $spec_details = DB::table('master.goods_spec_details')->where('goods_id', $goodsInformations->id)->get();

        $productionProcesses = DB::table('master.m_production_process')->get();

        $totalSPKCreated = DB::table('transaction.t_spk AS spk')
                        ->where('spk.detail_sales_order_id', $id)
                        ->sum('spk.quantity');

        // dd($spec_details);

        return view('transaction.production.spk.create-manual-spk', compact('goodsInformations', 'totalSPKCreated', 'productionProcesses', 'spec_details'));
    }

    public function saveSPK(Request $request){

        if ($request->goods_type == 'A') {
            $spk = DB::table('transaction.t_spk')->insertGetid([
                "spk_no" => DB::select("SELECT transaction.generate_spk_number() as spk_no")[0]->spk_no,
                "detail_sales_order_id" => $request->detail_sales_order_id,
                "quantity" => $request->spk_quantity,
                "specification" => $request->spec,
                "spk_type" => "A",
                "flute_type" => $request->flute_type,
                "length" => $request->length,
                "width" => $request->width,
                "height" => $request->height,
                "l2" => $request->l2,
                "p1" => $request->p1,
                "l1" => $request->l1,
                "p2" => $request->p2,
                "t" => $request->t,
                "plape" => $request->plape,
                "k" => $request->k,
                "netto_width" => $request->netto_width,
                "netto_length" => $request->netto_length,
                "bruto_width" => $request->bruto_width,
                "bruto_length" => $request->bruto_length,
                "sheet_quantity" => $request->sheet_quantity,
                "flag_stitching" => $request->flag_stitching,
                "flag_glue" => $request->flag_glue,
                "flag_pounch" => $request->flag_pounch,
                "status" => 1,
                "created_at" => date('Y-m-d H:i:s'),
                "created_by" => Auth::user()->name,
            ]);
        }

        if($request->goods_type == 'B') {
            $spk = DB::table('transaction.t_spk')->insertGetid([
                "spk_no" => DB::select("SELECT transaction.generate_spk_number() as spk_no")[0]->spk_no,
                "detail_sales_order_id" => $request->detail_sales_order_id,
                "quantity" => $request->spk_quantity,
                "specification" => $request->spec,
                "spk_type" => "B",
                "flute_type" => $request->flute_type,
                "length" => $request->length,
                "width" => $request->width,
                "netto_width" => $request->netto_width,
                "netto_length" => $request->netto_length,
                "bruto_width" => $request->bruto_width,
                "bruto_length" => $request->bruto_length,
                "sheet_quantity" => $request->sheet_quantity,
                "flag_stitching" => $request->flag_stitching,
                "flag_glue" => $request->flag_glue,
                "flag_pounch" => $request->flag_pounch,
                "status" => 1,
                "created_at" => date('Y-m-d H:i:s'),
                "created_by" => Auth::user()->name,
            ]);
        }

        if ($request->goods_type == 'AB') {

            $spk = DB::table('transaction.t_spk')->insertGetid([
                "spk_no" => DB::select("SELECT transaction.generate_spk_number() as spk_no")[0]->spk_no,
                "detail_sales_order_id" => $request->detail_sales_order_id,
                "spk_type" => "A",
                "quantity" => $request->bottom_spk_quantity,
                "specification" => $request->bottom_spec,
                "flute_type" => $request->bottom_flute_type,
                "length" => $request->bottom_length,
                "width" => $request->bottom_width,
                "height" => $request->bottom_height,
                "l2" => $request->bottom_l2,
                "p1" => $request->bottom_p1,
                "l1" => $request->bottom_l1,
                "p2" => $request->bottom_p2,
                "t" => $request->bottom_t,
                "plape" => $request->bottom_plape,
                "k" => $request->bottom_k,
                "netto_width" => $request->bottom_netto_width,
                "netto_length" => $request->bottom_netto_length,
                "bruto_width" => $request->bottom_bruto_width,
                "bruto_length" => $request->bottom_bruto_length,
                "sheet_quantity" => $request->bottom_sheet_quantity,
                "flag_stitching" => $request->bottom_flag_stitching,
                "flag_glue" => $request->bottom_flag_glue,
                "flag_pounch" => $request->bottom_flag_pounch,

                "status" => 1,
                "created_at" => date('Y-m-d H:i:s'),
                "created_by" => Auth::user()->name,
            ]);

            $spk = DB::table('transaction.t_spk')->insertGetid([
                "spk_no" => DB::select("SELECT transaction.generate_spk_number() as spk_no")[0]->spk_no,
                "detail_sales_order_id" => $request->detail_sales_order_id,
                "spk_type" => "B",
                "quantity" => $request->top_spk_quantity,
                "specification" => $request->top_spec,
                "flute_type" => $request->top_flute_type,
                "width" => $request->top_width,
                "length" => $request->top_length,
                "netto_width" => $request->top_netto_width,
                "netto_length" => $request->top_netto_length,
                "bruto_width" => $request->top_bruto_width,
                "bruto_length" => $request->top_bruto_length,
                "sheet_quantity" => $request->top_sheet_quantity,
                "flag_stitching" => $request->top_flag_stitching,
                "flag_glue" => $request->top_flag_glue,
                "flag_pounch" => $request->top_flag_pounch,

                "status" => 1,
                "created_at" => date('Y-m-d H:i:s'),
                "created_by" => Auth::user()->name,
            ]);

        }

        if ($request->goods_type == 'BB') {

            $spk = DB::table('transaction.t_spk')->insertGetid([
                "spk_no" => DB::select("SELECT transaction.generate_spk_number() as spk_no")[0]->spk_no,
                "detail_sales_order_id" => $request->detail_sales_order_id,
                "quantity" => $request->bottom_spk_quantity,
                "specification" => $request->bottom_spec,
                "spk_type" => "A",
                "flute_type" => $request->bottom_flute_type,
                "width" => $request->bottom_width,
                "length" => $request->bottom_length,
                "height" => $request->bottom_height,
                "netto_width" => $request->bottom_netto_width,
                "netto_length" => $request->bottom_netto_length,
                "bruto_width" => $request->bottom_bruto_width,
                "bruto_length" => $request->bottom_bruto_length,
                "sheet_quantity" => $request->bottom_sheet_quantity,
                "flag_stitching" => $request->bottom_flag_stitching,
                "flag_glue" => $request->bottom_flag_glue,
                "flag_pounch" => $request->bottom_flag_pounch,

                "status" => 1,
                "created_at" => date('Y-m-d H:i:s'),
                "created_by" => Auth::user()->name,

            ]);

            $spk = DB::table('transaction.t_spk')->insertGetid([
                "spk_no" => DB::select("SELECT transaction.generate_spk_number() as spk_no")[0]->spk_no,
                "detail_sales_order_id" => $request->detail_sales_order_id,
                "quantity" => $request->top_spk_quantity,
                "specification" => $request->top_spec,
                "spk_type" => "B",
                "flute_type" => $request->top_flute_type,
                "width" => $request->top_width,
                "length" => $request->top_length,
                "height" => $request->top_height,
                "netto_width" => $request->top_netto_width,
                "netto_length" => $request->top_netto_length,
                "bruto_width" => $request->top_bruto_width,
                "bruto_length" => $request->top_bruto_length,
                "sheet_quantity" => $request->top_sheet_quantity,
                "flag_stitching" => $request->top_flag_stitching,
                "flag_glue" => $request->top_flag_glue,
                "flag_pounch" => $request->top_flag_pounch,

                "status" => 1,
                "created_at" => date('Y-m-d H:i:s'),
                "created_by" => Auth::user()->name,
            ]);
        }

        if($request->goods_type == 'ROLL') {
            $spk = DB::table('transaction.t_spk')->insertGetid([
                "spk_no" => DB::select("SELECT transaction.generate_spk_number() as spk_no")[0]->spk_no,
                "detail_sales_order_id" => $request->detail_sales_order_id,
                "quantity" => $request->spk_quantity,
                "specification" => $request->spec,
                "spk_type" => "ROLL",
                "flute_type" => $request->flute_type,
                "width" => $request->width,
                "netto_width" => $request->netto_width,
                "netto_length" => $request->netto_length,
                "bruto_width" => $request->bruto_width,
                "bruto_length" => $request->bruto_length,
                "sheet_quantity" => $request->sheet_quantity,
                "flag_stitching" => $request->flag_stitching,
                "flag_glue" => $request->flag_glue,
                "flag_pounch" => $request->flag_pounch,
                "status" => 1,
                "created_at" => date('Y-m-d H:i:s'),
                "created_by" => Auth::user()->name,
            ]);
        }

        return redirect()->route('production.spk.index');
    }

    public function saveManualSPK(Request $request) {

        $payloads = $request->all();
        $status = 0;

        try {
            // Start a database transaction
            DB::beginTransaction();

            // Save the transaction details
            foreach ($payloads['data'] as $detail) {
                $spk = DB::table('transaction.t_spk')->insertGetid([
                    "spk_no" => DB::select("SELECT transaction.generate_spk_number() as spk_no")[0]->spk_no,
                    "detail_sales_order_id" => $detail["detail_sales_order_id"],
                    "quantity" => $detail["spk_quantity"],
                    "specification" => $detail["specification"],
                    "flute_type" => $detail["flute_type"],
                    "length" => $detail["length"],
                    "width" => $detail["width"],
                    "height" => $detail["height"],
                    "l2" => $detail["l2"],
                    "p1" => $detail["p1"],
                    "l1" => $detail["l1"],
                    "p2" => $detail["p2"],
                    "t" => $detail["t"],
                    "plape_1" => $detail["plape_1"],
                    "plape_2" => $detail["plape_2"],
                    "k" => $detail["k"],
                    "jp" => $detail["jp"],
                    "jl" => $detail["jl"],
                    "netto_width" => $detail["netto_width"],
                    "netto_length" => $detail["netto_length"],
                    "bruto_width" => $detail["bruto_width"],
                    "bruto_length" => $detail["bruto_length"],
                    "sup_bruto_width" => $detail["sup_bruto_width"],
                    "sup_bruto_length" => $detail["sup_bruto_length"],
                    "sheet_quantity" => $detail["sheet_quantity"],
                    "flag_stitching" => $detail["flag_stitching"],
                    "flag_glue" => $detail["flag_glue"],
                    "flag_pounch" => $detail["flag_pounch"],
                    "spk_type" => $detail["spk_type"],
                    "show_layout" => $detail["show_layout"],
                    "layout_type" => $detail["layout_type"],
                    "status" => 1,
                    "created_at" => date('Y-m-d H:i:s'),
                    "created_by" => Auth::user()->name,
                ]);

                if($payloads['is_save_as_template'] == 1) {

                    // $templateIsExists = DB::table('transaction.t_spk_templates')->where('goods_id', $payloads['goods_id'])->first();

                    // if(empty($templateIsExists)) {
                    //     DB::table('transaction.t_spk_templates')->insert([
                    //         "goods_id" => $payloads['goods_id'],
                    //         "spk_id" => $spk
                    //     ]);
                    // }

                    DB::table('transaction.t_spk_templates')->insert([
                        "goods_id" => $payloads['goods_id'],
                        "spk_id" => $spk
                    ]);
                }
            }

            // Commit the transaction
            DB::commit();

            // Return success response
            return response()->json([
                'message' => 'SPK Berhasil Disimpan'
            ], 201);

        } catch (\Exception $e) {
            // Rollback transaction in case of error
            DB::rollBack();

            // Return error response
            return response()->json([
                'message' => 'Gagal untuk menyimpan SPK',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function editSPK($id) {
        $data = DB::table('transaction.t_detail_sales_order AS detail_sales_order')
                ->join('master.goods AS goods', 'goods.id', '=', 'detail_sales_order.goods_id')
                ->join('transaction.t_spk AS spk', 'spk.detail_sales_order_id', '=', 'detail_sales_order.id')
                ->select(
                    'spk.id AS spk_id',
                    'spk.spk_no',
                    'spk.*',
                    'detail_sales_order.quantity AS order_quantity',
                    'goods.name',
                    'goods.type',
                    'goods.meas_str',
                    'goods.spec_str',
                    DB::raw("CASE WHEN spk.spk_type = 'A' THEN CONCAT(spk.length, ' X ', spk.width, ' X ', spk.height) ELSE CONCAT(spk.length, ' X ', spk.width) END AS measure"),
                    'goods.type',
                    'spk.spk_type',
                    'spk.status'
                )
                ->where('spk.id', $id)
                ->first();

        $productionProcessesItem = DB::table('transaction.t_production_process_item AS item')
                                ->select('item.*', 'process.process_name')
                                ->join('master.m_production_process AS process', 'process.id', '=', 'item.process_id')
                                ->orderBy('item.sequence_order', 'ASC')
                                ->where('item.spk_id', $id)
                                ->orderBy('process.id', 'ASC')
                                ->get();

        $excludedProcessIds = $productionProcessesItem->pluck('process_id');

        $productionProcesses = DB::table('master.m_production_process')
                            ->whereNotIn('id', $excludedProcessIds)
                            ->orderBy('m_production_process.id', 'ASC')
                            ->get();

        return view('transaction.production.spk.edit', compact('data', 'productionProcesses', 'productionProcessesItem'));
    }

    public function updateSPK(Request $request) {
        DB::table('transaction.t_spk')->where('id', $request->id)->update([
            "quantity" => $request->quantity,
            "length" => $request->length,
            "width" => $request->width,
            "height" => $request->height,
            "l2" => $request->l2,
            "p1" => $request->p1,
            "l1" => $request->l1,
            "p2" => $request->p2,
            "t" => $request->t,
            "plape" => $request->plape,
            "k" => $request->k,
            "netto_width" => $request->netto_width,
            "netto_length" => $request->netto_length,
            "bruto_width" => $request->bruto_width,
            "bruto_length" => $request->bruto_length,
            "sheet_quantity" => $request->sheet_quantity,
            "flag_stitching" => $request->flag_stitching,
            "flag_glue" => $request->flag_glue,
            "flag_pounch" => $request->flag_pounch
        ]);

        return redirect()->back();
    }

    public function progressItemSave(Request $request) {

        $params = $request->processes;

        foreach($params as $key => $value) {
            DB::table('transaction.t_production_process_item')->insert([
                "spk_id" => $request->spk_id,
                "process_id" => $value,
                "sequence_order" => 0,
                "status" => 1,
                "created_at" => date('Y-m-d H:i:s'),
                "created_by" => Auth::user()->name,
            ]);
        }

        return redirect()->route('production.spk.edit', ['id' => $request->spk_id]);
    }

    public function progressItemDelete($id) {
        DB::table('transaction.t_production_process_item')->where('id', $id)->delete();
        return redirect()->back();
    }

    public function progressItemEdit(Request $request) {
        $data = DB::table('transaction.t_production_process_item as production_process_item')
                ->select('production_process_item.id','production_process_item.spk_id','production_process_item.process_id', 'production_process_item.status', 'production_process.process_name')
                ->join('master.m_production_process as production_process', 'production_process.id', '=', 'production_process_item.process_id')
                ->where('production_process_item.id', $request->id)->first();

        return response()->json([
            "data" => $data
        ], 200);
    }

    public function progressItemUpdate(Request $request) {

        DB::table('transaction.t_production_process_item')->where('id', $request->id)->update([
            "status" => $request->status,
            "updated_at" => date('Y-m-d H:i:s'),
            "updated_by" => Auth::user()->name,
        ]);

        $spk = DB::table('transaction.t_spk')->where('id', $request->spk_id)->first();

        if($spk->status != 4) {
            DB::table('transaction.t_spk')->where('id', $request->spk_id)->update([
                "current_process" => $request->process_name,
                "status" => 3, // Work in Progress
                "updated_at" => date('Y-m-d H:i:s'),
                "updated_by" => Auth::user()->name,
            ]);
        }

        // if($request->status == 3) {
        //     $percentageResult = DB::table('transaction.t_production_process_item')
        //                     ->selectRaw('(SUM(CASE WHEN spk_id = ? AND status = 3 THEN 1 ELSE 0 END) * 100) / COUNT(*) AS percentage', [$request->spk_id])
        //                     ->where('spk_id', $request->spk_id)
        //                     ->first();

        //     DB::table('transaction.t_spk')->where('id', $request->spk_id)->update([
        //         "persentage" => $percentageResult->percentage,
        //         "updated_at" => date('Y-m-d H:i:s'),
        //         "updated_by" => Auth::user()->name,
        //     ]);
        // }

        return redirect()->route('production.spk.monitoring.detail', ['id' => $request->spk_id]);
    }

    public function schedule($id) {
        $data = DB::table('transaction.t_detail_sales_order AS detail_sales_order')
                ->join('master.goods AS goods', 'goods.id', '=', 'detail_sales_order.goods_id')
                ->join('transaction.t_spk AS spk', 'spk.detail_sales_order_id', '=', 'detail_sales_order.id')
                ->select(
                    'spk.id AS spk_id',
                    'spk.spk_no',
                    'spk.*',
                    'detail_sales_order.quantity AS order_quantity',
                    'goods.name',
                    'goods.type',
                    'spk.spk_type',
                    DB::raw("CASE
                                WHEN goods.type = '1' THEN 'A'
                                WHEN goods.type = '2' THEN 'B'
                                WHEN goods.type = '3' THEN 'AB'
                                ELSE 'BB'
                            END AS goods_type_name"),
                    'spk.status'
                )
                ->where('spk.id', $id)
                ->first();

        $productionProcessesItem = DB::table('transaction.t_production_process_item AS item')
                                ->join('master.m_production_process AS process', 'process.id', '=', 'item.process_id')
                                ->orderBy('item.sequence_order', 'ASC')
                                ->where('item.spk_id', $id)
                                ->get();

        return view('transaction.production.spk.schedule', compact('data', 'productionProcessesItem'));
    }

    public function scheduleSave(Request $request){
        $data = DB::table('transaction.t_spk AS spk')->where('spk.id', $request->id)->update([
            "start_date" => $request->start_date,
            "status" => 2, // SPK Scheduled
            "current_process" => 0,
            "updated_at" => date('Y-m-d H:i:s'),
            "updated_by" => Auth::user()->name,
        ]);

        return redirect()->route('production.spk.index');
    }

    public function filteredScheduleSave(Request $request) {

        try {
            DB::beginTransaction();

            $formData = $request->all();

            foreach($formData as $data) {

                $data = DB::table('transaction.t_spk AS spk')->where('spk.id', $data["spkId"])->update([
                    "start_date" => $data["date"],
                    "status" => 2, // SPK Scheduled
                    "current_process" => 0,
                    "updated_at" => date('Y-m-d H:i:s'),
                    "updated_by" => Auth::user()->name,
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

    public function markAsDone($spk_id){

        DB::table('transaction.t_spk as spk')->where('id', $spk_id)->update([
            "status" => 4, // Update status SPK To completed
            "finish_date" => date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s'),
            "updated_by" => Auth::user()->name,
        ]);

        $spk = DB::table('transaction.t_spk as spk')
                ->select('goods.id as goods_id', 'spk.spk_no', 'spk.quantity')
                ->join('transaction.t_detail_sales_order as detail_sales_order', 'detail_sales_order.id', '=', 'spk.detail_sales_order_id')
                ->join('master.goods as goods', 'goods.id', '=', 'detail_sales_order.goods_id')
                ->where('spk.id', $spk_id)
                ->first();

        // dd($spk);

        DB::table('transaction.t_stock_finish_goods')->insert([
            "goods_id" => $spk->goods_id,
            "quantity" => $spk->quantity,
            "source_from" => $spk->spk_no,
            "created_at" => date('Y-m-d H:i:s'),
            "created_by" => Auth::user()->name,
        ]);

        return redirect()->back();
    }

    public function exportToFinishGoods(Request $request) {

        try {
            DB::beginTransaction();

            $formData = $request->all();

            foreach($formData as $data) {

                DB::table('transaction.t_spk as spk')->where('id',  $data["spkId"])->update([
                    "status" => 4, // Update status SPK To completed
                    "finish_date" => date('Y-m-d H:i:s'),
                    "updated_at" => date('Y-m-d H:i:s'),
                    "updated_by" => Auth::user()->name,
                ]);

                $spk = DB::table('transaction.t_spk as spk')
                        ->select('goods.id as goods_id', 'spk.spk_no', 'spk.quantity')
                        ->join('transaction.t_detail_sales_order as detail_sales_order', 'detail_sales_order.id', '=', 'spk.detail_sales_order_id')
                        ->join('master.goods as goods', 'goods.id', '=', 'detail_sales_order.goods_id')
                        ->where('spk.id',  $data["spkId"])
                        ->first();

                // dd($spk);

                DB::table('transaction.t_stock_finish_goods')->insert([
                    "goods_id" => $spk->goods_id,
                    "quantity" => $spk->quantity,
                    "source_from" => $spk->spk_no,
                    "created_at" => date('Y-m-d H:i:s'),
                    "created_by" => Auth::user()->name,
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

    public function monitoring() {

        $pics = DB::table('users')->where('role_id', 2)->orderBy('display_name', 'ASC')->get();

        $data = DB::table('transaction.t_detail_sales_order as detail_sales_order')
                ->join('transaction.t_spk as spk', 'spk.detail_sales_order_id', '=', 'detail_sales_order.id')
                ->join('transaction.t_sales_order as sales_order', 'sales_order.id', '=', 'detail_sales_order.sales_order_id')
                ->join('public.users as user', 'user.id', '=', 'sales_order.assign_to')
                ->join('master.goods as goods', 'goods.id', '=', 'detail_sales_order.goods_id')
                ->join('master.m_customer as customer', 'customer.id', '=', 'sales_order.customer_id')
                ->select(
                    'spk.id',
                    'spk.*',
                    'goods.name AS goods_name',
                    'customer.name as customer_name',
                    'sales_order.ref_po_customer',
                    'user.display_name as pic',
                    'goods.type as goods_type',
                    'spk.specification',
                    'spk.flute_type',
                    'spk.sheet_quantity',
                    'spk.quantity',
                    DB::raw("CONCAT(spk.netto_width, ' X ', spk.netto_length) AS netto"),
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
                ->orderByDesc('spk.created_at')
                ->get();

        $spkSchedule = DB::table('transaction.t_detail_sales_order AS detail_sales_order')
                ->join('master.goods AS goods', 'goods.id', '=', 'detail_sales_order.goods_id')
                ->join('transaction.t_spk AS spk', 'spk.detail_sales_order_id', '=', 'detail_sales_order.id')
                ->select(
                    'spk.id',
                    'spk.spk_no',
                    'goods.name AS goods_name',
                    'goods.type',
                    'spk.specification',
                    'spk.sheet_quantity',
                    'spk.quantity',
                    'spk.flute_type',
                    DB::raw("CONCAT(spk.netto_width, ' X ', spk.netto_length) AS netto"),
                    DB::raw("CONCAT(spk.bruto_width, ' X ', spk.bruto_length) AS bruto"),
                    'spk.status'
                )
                ->orderBy('spk.created_at', 'DESC')
                ->where('spk.status', 1)
                ->get();

        $spkToFinishgoods = DB::table('transaction.t_detail_sales_order AS detail_sales_order')
                ->join('master.goods AS goods', 'goods.id', '=', 'detail_sales_order.goods_id')
                ->join('transaction.t_spk AS spk', 'spk.detail_sales_order_id', '=', 'detail_sales_order.id')
                ->select(
                    'spk.id',
                    'spk.spk_no',
                    'goods.name AS goods_name',
                    'goods.type',
                    'spk.specification',
                    'spk.sheet_quantity',
                    'spk.quantity',
                    'spk.flute_type',
                    DB::raw("CONCAT(spk.netto_width, ' X ', spk.netto_length) AS netto"),
                    DB::raw("CONCAT(spk.bruto_width, ' X ', spk.bruto_length) AS bruto"),
                    'spk.status'
                )
                ->orderBy('spk.created_at', 'DESC')
                ->whereIn('spk.status', [2, 3])
                ->get();

        $productionProcesses = DB::table('master.m_production_process')->get();

        return view('transaction.production.monitoring.index', compact('data', 'productionProcesses', 'pics', 'spkSchedule', 'spkToFinishgoods'));
    }

    public function monitoringDetail($id) {
        $data = DB::table('transaction.t_detail_sales_order AS detail_sales_order')
                ->join('master.goods AS goods', 'goods.id', '=', 'detail_sales_order.goods_id')
                ->join('transaction.t_spk AS spk', 'spk.detail_sales_order_id', '=', 'detail_sales_order.id')
                ->select(
                    'spk.id AS spk_id',
                    'spk.spk_no',
                    'spk.*',
                    'detail_sales_order.quantity AS order_quantity',
                    'goods.name',
                    'goods.type',
                    'goods.meas_str',
                    'goods.spec_str',
                    DB::raw("CASE WHEN spk.spk_type = 'A' THEN CONCAT(spk.length, ' X ', spk.width, ' X ', spk.height) WHEN spk.spk_type = 'B' THEN CONCAT(spk.length, ' X ', spk.width) ELSE CONCAT(spk.width) END AS measure"),
                    'goods.type',
                    'spk.spk_type',
                    'spk.status'
                )
                ->where('spk.id', $id)
                ->first();

        $productionProcesses = DB::table('master.m_production_process')->get();

        $productionProcessesItem = DB::table('transaction.t_production_process_item as production_process_item')
                ->leftJoin('transaction.t_detail_progress_individu as detail_progress_individu', function($join) {
                    $join->on('detail_progress_individu.process_id', '=', 'production_process_item.process_id')
                            ->on('detail_progress_individu.spk_id', '=', 'production_process_item.spk_id');
                })
                ->join('master.m_production_process AS process', 'process.id', '=', 'production_process_item.process_id')
                ->where('production_process_item.spk_id', $id)
                ->groupBy('production_process_item.id', 'production_process_item.process_id','process.id', 'process.process_name')
                ->orderBy('process.id', 'ASC')
                ->select(
                    'production_process_item.id',
                    'production_process_item.status',
                    'process.process_name',
                    DB::raw('SUM(detail_progress_individu.result) AS total_progress_amount')
                )
                ->get();

        return view('transaction.production.monitoring.monitoring-detail', compact('data', 'productionProcesses', 'productionProcessesItem'));
    }

    public function progressProductionUpdate($id) {
        $processItem = DB::table('transaction.t_production_process_item AS item')
                                ->select('item.id', 'process.process_name', 'item.status', 'item.spk_id')
                                ->join('master.m_production_process AS process', 'process.id', '=', 'item.process_id')
                                ->where('item.id', $id)
                                ->first();

        $processItemDetails = DB::table('transaction.t_detail_production_process_item AS detail_production_process')
                            ->where('detail_production_process.production_process_item_id', $processItem->id)
                            ->get();

        return view('transaction.production.monitoring.prod-progress', compact('processItem', 'processItemDetails'));
    }

    public function progressProductionDetailSave(Request $request) {
        DB::table('transaction.t_detail_production_process_item')->insert([
            'production_process_item_id' => $request->production_process_id,
            'date' => $request->date,
            'operator' => $request->operator,
            'result' => $request->result,
            'remarks' => $request->remarks,
            "created_at" => date('Y-m-d H:i:s'),
            "created_by" => Auth::user()->name,
        ]);

        return redirect()->route('production.spk.monitoring.production-progress', ['id' => $request->production_process_id]);
    }

    public function monitoringPersonalProgress(Request $request) {
        $spk = DB::table('transaction.t_spk as spk')
                ->select('spk.id', 'spk.spk_no', 'sales_order.ref_po_customer')
                ->join('transaction.t_detail_sales_order AS detail_sales_order', 'detail_sales_order.id', '=', 'spk.detail_sales_order_id')
                ->join('transaction.t_sales_order AS sales_order', 'sales_order.id', '=', 'detail_sales_order.sales_order_id')
                ->get();

        $productionProcess = DB::table('master.m_production_process as production_process')
                        ->where('id', $request->process_id)
                        ->first();

        $data = DB::table('transaction.t_detail_production_process_item AS detail_production_process_item')
                ->join('transaction.t_production_process_item AS production_process_item', 'production_process_item.id', '=', 'detail_production_process_item.production_process_item_id')
                ->join('transaction.t_spk AS spk', 'spk.id', '=', 'production_process_item.spk_id')
                ->join('transaction.t_detail_sales_order AS detail_sales_order', 'detail_sales_order.id', '=', 'spk.detail_sales_order_id')
                ->join('transaction.t_sales_order AS sales_order', 'sales_order.id', '=', 'detail_sales_order.sales_order_id')
                ->join('master.m_customer AS customer', 'customer.id', '=', 'sales_order.customer_id')
                ->where('production_process_item.process_id', '=', $request->process_id)
                ->where('detail_production_process_item.date', '=', $request->date)
                ->select(
                    'detail_production_process_item.date',
                    'customer.name',
                    'sales_order.ref_po_customer',
                    'spk.spk_no',
                    'detail_production_process_item.operator',
                    'detail_production_process_item.result',
                    'detail_production_process_item.remarks'
                )
                ->orderBy('detail_production_process_item.created_at', 'DESC')
                ->paginate(20);

        return view('transaction.production.monitoring.personal-prod-progress', compact('productionProcess', 'data', 'spk'));
    }

    public function monitoringPersonalProgressSave(Request $request) {
        $processItem = DB::table('transaction.t_production_process_item')
                    ->where('spk_id', $request->spk_id)
                    ->where('process_id', $request->process_id)
                    ->first();

        DB::table('transaction.t_detail_production_process_item')->insert([
            'production_process_item_id' => $processItem->id,
            'date' => $request->date,
            'operator' => $request->operator,
            'result' => $request->result,
            'remarks' => $request->remarks,
            "created_at" => date('Y-m-d H:i:s'),
            "created_by" => Auth::user()->name,
        ]);

        return redirect()->back();
    }

    public function printSpk($id) {
        $data = DB::table('transaction.t_detail_sales_order AS detail_sales_order')
                ->join('transaction.t_sales_order AS sales_order', 'sales_order.id', '=', 'detail_sales_order.sales_order_id')
                ->join('master.m_customer AS customer', 'customer.id', '=', 'sales_order.customer_id')
                ->join('master.goods AS goods', 'goods.id', '=', 'detail_sales_order.goods_id')
                ->join('transaction.t_spk AS spk', 'spk.detail_sales_order_id', '=', 'detail_sales_order.id')
                ->select(
                    'spk.id AS spk_id',
                    'spk.spk_no',
                    'spk.spk_type',
                    'spk.*',
                    'spk.length',
                    'spk.width',
                    'spk.height',
                    'detail_sales_order.quantity AS order_quantity',
                    'detail_sales_order.flag_print',
                    'goods.name',
                    'goods.type',
                    'goods.meas_str',
                    'sales_order.*',
                    'customer.name AS customer_name',
                    DB::raw("CASE WHEN spk.spk_type != 'ROLL' THEN CONCAT(spk.netto_width, ' X ', spk.netto_length) ELSE '-' END AS netto"),
                    DB::raw("CASE WHEN spk.spk_type != 'ROLL' THEN CONCAT(spk.bruto_width, ' X ', spk.bruto_length) ELSE '-' END AS bruto"),
                    DB::raw("CASE WHEN spk.spk_type = 'A' THEN CONCAT(spk.length, ' X ', spk.width, ' X ', spk.height) WHEN spk.spk_type = 'B' THEN CONCAT(spk.width, ' X ', spk.length) ELSE CONCAT(spk.width) END AS measure"),
                    'spk.status'
                )
                ->where('spk.id', $id)
                ->first();

        $productionProcessesItem = DB::table('transaction.t_production_process_item AS item')
                                ->select('item.*', 'process.process_name')
                                ->join('master.m_production_process AS process', 'process.id', '=', 'item.process_id')
                                ->orderBy('process.id', 'ASC')
                                ->where('item.spk_id', $id)
                                ->get();

        $pdf = PDF::loadView('transaction.production.spk.print', [
                'data' => $data,
                'productionProcessesItem' => $productionProcessesItem,
            ]);

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
        return $pdf->stream($data->spk_no.'.pdf');
    }

    public function printMassSPK(Request $request) {

        $params = array_values($request->all());

        $data = DB::table('transaction.t_detail_sales_order AS detail_sales_order')
                ->join('transaction.t_sales_order AS sales_order', 'sales_order.id', '=', 'detail_sales_order.sales_order_id')
                ->join('master.m_customer AS customer', 'customer.id', '=', 'sales_order.customer_id')
                ->join('master.goods AS goods', 'goods.id', '=', 'detail_sales_order.goods_id')
                ->join('transaction.t_spk AS spk', 'spk.detail_sales_order_id', '=', 'detail_sales_order.id')
                ->select(
                    'spk.id AS spk_id',
                    'spk.spk_no',
                    'spk.spk_type',
                    'spk.*',
                    'spk.length',
                    'spk.width',
                    'spk.height',
                    'detail_sales_order.quantity AS order_quantity',
                    'detail_sales_order.flag_print',
                    'goods.name',
                    'goods.type',
                    'goods.meas_str',
                    'sales_order.*',
                    'customer.name AS customer_name',
                    DB::raw("CASE WHEN spk.spk_type != 'ROLL' THEN CONCAT(spk.netto_width, ' X ', spk.netto_length) ELSE '-' END AS netto"),
                    DB::raw("CASE WHEN spk.spk_type != 'ROLL' THEN CONCAT(spk.bruto_width, ' X ', spk.bruto_length) ELSE '-' END AS bruto"),
                    DB::raw("CASE WHEN spk.spk_type = 'A' THEN CONCAT(spk.length, ' X ', spk.width, ' X ', spk.height) WHEN spk.spk_type = 'B' THEN CONCAT(spk.width, ' X ', spk.length) ELSE CONCAT(spk.width) END AS measure"),
                    'spk.status'
                )
                ->whereIn('spk.id', $params)
                ->get();

        $productionProcessesItem = DB::table('transaction.t_production_process_item AS item')
                ->select('item.*', 'process.process_name')
                ->join('master.m_production_process AS process', 'process.id', '=', 'item.process_id')
                ->orderBy('process.id', 'ASC')
                ->whereIn('item.spk_id', $params)
                ->get();

        $pdf = PDF::loadView('transaction.production.spk.mass-print', [
            'data' => $data,
            'productionProcessesItem' => $productionProcessesItem
        ]);

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

        return $pdf->stream('spk.pdf', ['Attachment' => false]);
    }

    public function corReportExport(Request $request) {
        return Excel::download(new CorReportExport($request->all()), 'Laporan COR Tanggal '.date("d-m-Y", strtotime($request->start_date)).' - '.date("d-m-Y", strtotime($request->end_date)).'.xlsx');
    }

    public function productionReportExport(Request $request) {
        return Excel::download(new productionReportExport($request->start_date, $request->end_date, $request->pic), 'Laporan Produksi Tanggal '.date("d-m-Y", strtotime($request->start_date)).' - '.date("d-m-Y", strtotime($request->end_date)).'.xlsx');
    }
}
