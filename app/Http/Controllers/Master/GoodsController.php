<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class GoodsController extends Controller
{
    public function index() {
        return view('master.goods.index');
    }

    public function getLists(Request $request) {
        $params = $request->all();

        $query = DB::table('master.goods as goods');

        // Apply global search if provided
        $searchValue = $request->input('search.value'); // This is where DataTables sends the search input
        if (!empty($searchValue)) {
            $query->where(function ($q) use ($searchValue) {
                $q->where('goods.code', 'like', '%' . strtoupper($searchValue) . '%');
            });
        }

        $start = $request->input('start', 0);
        $length = $request->input('length', 10);

        $totalRecords = $query->count();
        $filteredRecords = $query->count();
        $data = $query->orderBy('id', 'desc')->skip($start)->take($length)->get();

        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $filteredRecords,
            'data' => $data
        ]);
    }

    public function create() {
        $substances = DB::table('master.m_substance')->orderBy('id', 'ASC')->get();
        return view('master.goods.create', compact('substances'));
    }

    public function save(Request $request) {

        try {
            DB::beginTransaction();

            $formData = $request["header"];

            // Check if the code already exists
            $exists = DB::table('master.goods')->where('code', $formData["code"])->exists();

            if ($exists) {
                return response()->json([
                    "error" => "Kode barang sudah pernah digunakan"
                ], 400); // 400 Bad Request
            }

            DB::table('master.goods')->insertGetId([
                "code" => $formData["code"],
                "name" => $formData["name"],
                "type" => $formData["type"],
                "spec_str" => $formData["spec_str"],
                "meas_str" => $formData["meas_str"],
            ]);

            DB::commit();

            return response()->json([
                "message" => "Data successfully saved."
            ], 200);

        } catch (\Exception $e) {

            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);

        }
    }

    public function edit($id) {
        $goods = DB::table('master.goods')->where('id', $id)->first();
        return view('master.goods.edit', compact('goods'));
    }

    public function update(Request $request) {

        try {
            DB::beginTransaction();

            $formData = $request["header"];

            // Check if the code already exists
            $exists = DB::table('master.goods')->where('code', $formData["code"])->exists();

            if ($exists) {
                return response()->json([
                    "error" => "Kode barang sudah pernah digunakan"
                ], 400); // 400 Bad Request
            }

            DB::table('master.goods')->where('id', $formData["id"])->update([
                "code" => $formData["code"],
                "name" => $formData["name"],
                "type" => $formData["type"],
                "spec_str" => $formData["spec_str"],
                "meas_str" => $formData["meas_str"],
            ]);

            DB::commit();

            return response()->json([
                "message" => "Data successfully updated."
            ], 200);

        } catch (\Exception $e) {

            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);

        }
    }
}
