<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class MaterialUsedController extends Controller
{
    public function index() {
        $data = DB::table('transaction.t_material_used AS material_used')
                ->select('material_used.id', 'material_used.date')
                ->selectRaw("SUM(detail_material_used.quantity_used) AS total_quantity")
                ->leftJoin('transaction.t_detail_material_used AS detail_material_used', 'detail_material_used.material_used_id', '=', 'material_used.id')
                ->leftJoin('transaction.t_stock_raw_material AS stock_raw_material', 'stock_raw_material.id', '=', 'detail_material_used.material_id')
                ->leftJoin('master.m_material AS material', 'material.id', '=', 'stock_raw_material.material_id')
                ->groupBy('material_used.id', 'material_used.date')
                ->get();

        return view('transaction.production.material-used.index', compact('data'));
    }

    public function save(Request $request) {

        $materialUsedId = DB::table('transaction.t_material_used')->insertGetId([
            'incharge' => $request->incharge,
            "date" => $request->date,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => Auth::user()->name
        ]);

        return redirect()->route('production.material-used.detail', ['id' => $materialUsedId]);
    }

    public function detail($id) {

        $materials = DB::table('transaction.t_stock_raw_material as raw_material')
                    ->select('material.name','material.width as material_width', 'raw_material.*')
                    ->join('master.m_material as material', 'material.id', '=', 'raw_material.material_id')
                    ->get();

        $materialUsed = DB::table('transaction.t_material_used')->where('id', $id)->first();

        $detailMateialUsed = DB::table('transaction.t_detail_material_used as detail_material_used')
                            ->select(
                                'detail_material_used.id',
                                'stock_raw_material.no_roll',
                                'detail_material_used.machine_no',
                                'material.name as material_name',
                                'material.type as material_type_name',
                                'material.gramature',
                                'material.supplier_code',
                                'material.width',
                                'detail_material_used.initial_quantity',
                                'detail_material_used.quantity_used',
                                'detail_material_used.remaining_quantity'
                            )
                            ->join('transaction.t_stock_raw_material as stock_raw_material', 'stock_raw_material.id', '=', 'detail_material_used.material_id')
                            ->join('master.m_material as material', 'material.id', '=', 'stock_raw_material.material_id')
                            ->where('material_used_id', $id)
                            ->get();

        $detailMateialSummary = DB::table('transaction.t_detail_material_used as detail_material_used')
                            ->select(
                                'material.name as material_name',
                                'material.width',
                                DB::raw('SUM(detail_material_used.quantity_used) as total_pemakaian')
                            )
                            ->join('transaction.t_stock_raw_material as stock_raw_material', 'stock_raw_material.id', '=', 'detail_material_used.material_id')
                            ->join('master.m_material as material', 'material.id', '=', 'stock_raw_material.material_id')
                            ->where('detail_material_used.material_used_id', $id)
                            ->groupBy(
                                'material.name',
                                'material.width'
                            )
                            ->orderBy('material.width', 'asc')
                            ->get();
        return view('transaction.production.material-used.detail', compact('materials', 'materialUsed', 'detailMateialUsed', 'detailMateialSummary'));
    }

    public function detailSave(Request $request) {

        try {
            DB::beginTransaction();

            $remainingQuantity = $request->initial_quantity - $request->quantity_used;

            DB::table('transaction.t_detail_material_used')->insert([
                "material_used_id" => $request->material_used_id,
                "material_id" => $request->material_id,
                "initial_quantity" => $request->initial_quantity,
                "quantity_used" => $request->quantity_used,
                "remaining_quantity" => $remainingQuantity,
                "machine_no" => $request->machine_no,
                "created_at" => date('Y-m-d H:i:s'),
                "created_by" => Auth::user()->name
            ]);

            // $remainingWeight = DB::table('transaction.t_stock_raw_material')->where('id', $request->material_id)->first();

            // dd($remainingQuantity);

            DB::table('transaction.t_stock_raw_material')->where('id', $request->material_id)
            ->update([
                'weight' => $remainingQuantity
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Material updated successfully.');

        } catch (\Exception $e) {

            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());

        }

        return redirect()->back();
    }

    public function editDetail(Request $request) {

        $data = DB::table('transaction.t_detail_material_used')->where('id', $request->id)->first();

        return response()->json([
            "data" => $data
        ], 200);
    }

    public function updateDetail(Request $request) {

        DB::table('transaction.t_detail_material_used')->where('id', $request->id)->update([
            "machine_no" => $request->machine_no,
            "material_id" => $request->material_id,
            "initial_quantity" => $request->initial_quantity,
            "quantity_used" => $request->quantity_used,
            "updated_at" => date('Y-m-d H:i:s'),
            "updated_by" => Auth::user()->name
        ]);

        return redirect()->back();
    }

    public function detailDelete($id) {

        DB::table('transaction.t_detail_material_used')->where('id', $id)->delete();

        return redirect()->back();
    }
}
