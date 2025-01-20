<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class GoodsController extends Controller
{
    public function index() {

        $substances = DB::table('master.m_substance')->orderBy('id', 'desc')->get();
        $data = DB::table('master.goods AS goods')->orderBy('id', 'desc')->get();

        return view('master.goods.index', compact('data', 'substances'));
    }

    public function create() {
        $substances = DB::table('master.m_substance')->orderBy('id', 'ASC')->get();
        return view('master.goods.create', compact('substances'));
    }

    public function save(Request $request) {

        try {
            DB::beginTransaction();

            $formData = $request->all();

            $specifications = $formData["specifications"];

            $inf = DB::table('master.goods')->insertGetId([
                "code" => $formData["code"],
                "name" => $formData["name"],
                "type" => $formData["type"],
                "spec_str" => $formData["spec_str"],
                "meas_str" => $formData["meas_str"],
                // "price" => $formData["price"],
            ]);

            foreach($specifications as $item) {
                DB::table('master.goods_spec_details')->insert([
                    "goods_id" => $inf,
                    "ply_type" => $item["ply_type"],
                    "flute_type" => $item["flute_type"],
                    "substance" => $item["substance"],
                    "length" => $item["length"],
                    "width" => $item["width"],
                    "height" => $item["height"],
                    "measure_unit" => $item["measure_unit"],
                    "measure_type" => $item["measure_type"],
                    "part_code" => $item["part_code"],
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

    public function edit($id) {
        $goods = DB::table('master.goods')->where('id', $id)->first();
        $specifications = DB::table('master.goods_spec_details')->where('goods_id', $id)->get();
        $substances = DB::table('master.m_substance')->orderBy('id', 'ASC')->get();
        return view('master.goods.edit', compact('goods', 'substances', 'specifications'));
    }

    public function update(Request $request) {

        DB::table('master.goods')->where('id', $request->id)->update([
            "code" => $request->code,
            "name" => $request->name,
            "type" => $request->type,
            "spec_str" => $request->spec_str,
            "meas_str" => $request->meas_str,
            // "price" => $request->price,
        ]);

        return redirect()->route('master.goods.index');
    }

    public function detailEdit(Request $request) {

        $data = DB::table('master.goods_spec_details')->where('id', $request->id)->first();

        return response()->json([
            "data" => $data
        ], 200);
    }

    public function detailUpdate(Request $request) {

        DB::table('master.goods_spec_details')->where('id', $request->id)->update([
            "ply_type" => $request->ply_type,
            "flute_type" => $request->flute_type,
            "substance" => $request->substance,
            "length" => $request->length,
            "width" => $request->width,
            "height" => $request->height,
            "measure_unit" => $request->measure_unit,
            "measure_type" => $request->measure_type,
            "part_code" => $request->part_code,
        ]);

        return redirect()->back();
    }

    public function detailDelete($id) {
        DB::table('master.goods_spec_details')->where('id', $id)->delete();
        return redirect()->back();
    }
}
