<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class MaterialController extends Controller
{
    public function index() {
        $data = DB::table('master.m_material')->orderBy('id')->get();
        $suppliers = DB::table('master.m_supplier')->orderBy('id')->get();
        return view('master.material.index', compact('data', 'suppliers'));
    }

    public function save(Request $request) {
        $data = DB::table('master.m_material')->insert([
            "code" => $request->code,
            "name" => $request->name,
            "type" => $request->type,
            "paper_type" => $request->paper_type,
            "gramature" => $request->gramature,
            "width" => $request->width,
            "unit" => $request->unit,
            "price" => $request->price,
            "supplier_code" => $request->supplier_code,
            "created_at" => date('Y-m-d H:i:s'),
            "created_by" => Auth::user()->name,
        ]);
        return redirect()->route('master.material.index');
    }

    public function edit($id) {
        $data = DB::table('master.m_material')->where('id', $id)->first();
        $suppliers = DB::table('master.m_supplier')->orderBy('id')->get();
        return view('master.material.edit', compact('data', 'suppliers'));
    }

    public function update(Request $request) {
        $data = DB::table('master.m_material')->where('id', $request->id)->update([
            "code" => $request->code,
            "name" => $request->name,
            "type" => $request->type,
            "paper_type" => $request->paper_type,
            "gramature" => $request->gramature,
            "width" => $request->width,
            "supplier_code" => $request->supplier_code,
            "unit" => $request->unit,
            "price" => $request->price,
            "updated_at" => date('Y-m-d H:i:s'),
            "updated_by" => Auth::user()->name,
        ]);

        return redirect()->route('master.material.index');
    }

    public function delete($id) {
        $data = DB::table('master.m_material')->where('id', $id)->delete();
        return redirect()->route('master.material.index');
    }
}
