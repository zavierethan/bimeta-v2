<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class ProductionProgressIndividuController extends Controller
{
    public function index() {

        $data = DB::table('transaction.t_progress_individu as progress_individu')
                ->select(
                    'progress_individu.*',
                    'process.process_name',
                    DB::raw('SUM(detail_progress_individu.result) AS total_production_amount')
                )
                ->join('master.m_production_process as process', 'process.id', '=', 'progress_individu.process_id')
                ->join('transaction.t_detail_progress_individu as detail_progress_individu', 'detail_progress_individu.progress_individu_id', '=', 'progress_individu.id')
                ->groupBy('progress_individu.id', 'process.process_name')
                ->get();

        $productionProcesses = DB::table('master.m_production_process')->orderBy('m_production_process.id', 'ASC')->get();

        return view('transaction.production.progress-individu.index', compact('productionProcesses', 'data'));
    }

    public function save(Request $request) {

        $progressId = DB::table('transaction.t_progress_individu')->insertGetid([
            "process_id" => $request->process_id,
            "date" => $request->date,
            "operator" => $request->operator,
            "team_leader" => $request->team_leader,
            "shift_head" => $request->shift_head,
            "created_at" => date('Y-m-d H:i:s'),
            "created_by" => Auth::user()->name,
        ]);

        return redirect()->route('production.pogress-individu.detail', ['id' => $progressId]);
    }

    public function detail($id) {

        $productionProcesses = DB::table('master.m_production_process')->get();

        $data = DB::table('transaction.t_progress_individu')->where('id', $id)->first();

        $spk = DB::table('transaction.t_spk AS spk')->select('id', 'spk_no')->whereIn('status', [2, 3, 4])->get();

        $detail = DB::table('transaction.t_detail_progress_individu as detail_progress_individu')
                ->join('transaction.t_spk AS spk', 'spk.id', '=', 'detail_progress_individu.spk_id')
                ->join('transaction.t_detail_sales_order AS detail_sales_order', 'detail_sales_order.id', '=', 'spk.detail_sales_order_id')
                ->join('transaction.t_sales_order AS sales_order', 'sales_order.id', '=', 'detail_sales_order.sales_order_id')
                ->join('master.m_customer AS customer', 'customer.id', '=', 'sales_order.customer_id')
                ->select(
                    'detail_progress_individu.id',
                    'customer.name',
                    'sales_order.ref_po_customer',
                    'spk.spk_no',
                    'spk.quantity',
                    'detail_progress_individu.result',
                    'detail_progress_individu.remarks',
                    DB::raw("CASE WHEN spk.spk_type = 'A' THEN CONCAT(spk.length, ' X ', spk.width, ' X ', spk.height) ELSE CONCAT(spk.length, ' X ', spk.width) END AS measure"),
                )
                ->where('detail_progress_individu.progress_individu_id', $data->id)
                ->get();

        return view('transaction.production.progress-individu.detail', compact('data', 'productionProcesses', 'detail', 'spk'));
    }

    public function update(Request $request) {

        DB::table('transaction.t_progress_individu')->where('id', $request->id)->update([
            "process_id" => $request->process_id,
            "date" => $request->date,
            "operator" => $request->operator,
            "team_leader" => $request->team_leader,
            "shift_head" => $request->shift_head,
        ]);

        return redirect()->back();
    }

    public function detailSave(Request $request) {

        try {
            DB::beginTransaction();

            $formData = $request->all();

            foreach($formData as $item) {
                DB::table('transaction.t_detail_progress_individu')->insert([
                    "progress_individu_id" => $item["progress_individu_id"],
                    "process_id" => $item["process_id"],
                    "spk_id" => $item["spk_id"],
                    "result" => $item["result"],
                    "remarks" => $item["remarks"],
                ]);
            }

            DB::commit();

            return response()->json([
                "message" => "Data successfully saved.",
                "id" => $formData[0]["progress_individu_id"],
            ], 200);

        } catch (\Exception $e) {

            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);

        }
    }

    public function getDetailById(Request $request) {

        $data = DB::table('transaction.t_detail_progress_individu')->where('id', $request->id)->first();

        return response()->json([
            "data" => $data
        ], 200);
    }

    public function detailUpdate(Request $request) {

        DB::table('transaction.t_detail_progress_individu')->where('id', $request->id)->update([
            "spk_id" => $request->spk_id,
            "result" => $request->result,
            "remarks" => $request->remarks,
        ]);

        return redirect()->back();
    }

    public function detailDelete($id) {
        DB::table('transaction.t_detail_progress_individu')->where('id', $id)->delete();
        return redirect()->back();
    }
}
