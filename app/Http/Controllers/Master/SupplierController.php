<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class SupplierController extends Controller
{
    public function index() {
        $data = DB::table('master.m_supplier')->orderBy('id')->get();
        return view('master.supplier.index', compact('data'));
    }

    public function getData() {
        $data = DB::table('master.m_supplier')->orderBy('id');
        return DataTables::of($data)->make(true);
    }

    public function save(Request $request) {
        $data = DB::table('master.m_supplier')->insert([
            "code" => $request->code,
            "name" => $request->name,
            "email" => $request->email,
            "phone_number" => $request->phone_number,
            "fax" => $request->fax,
            "pic" => $request->pic,
            "bank_account_number" => $request->bank_account_no,
            "bank_account_name" => $request->bank_account_name,
            "bank_name" => $request->bank_name,
            "npwp" => $request->npwp,
            "tax_type" => $request->tax_type,
            "address" => $request->address,
            "created_at" => date('Y-m-d H:i:s'),
            "created_by" => Auth::user()->name,
        ]);
        return redirect()->route('master.supplier.index');
    }

    public function edit($id) {
        $data = DB::table('master.m_supplier')->where('id', $id)->first();
        return view('master.supplier.edit', compact('data'));
    }

    public function update(Request $request) {
        $data = DB::table('master.m_supplier')->where('id', $request->id)->update([
            "code" => $request->code,
            "name" => $request->name,
            "email" => $request->email,
            "phone_number" => $request->phone_number,
            "fax" => $request->fax,
            "pic" => $request->pic,
            "bank_account_number" => $request->bank_account_no,
            "bank_account_name" => $request->bank_account_name,
            "bank_name" => $request->bank_name,
            "npwp" => $request->npwp,
            "tax_type" => $request->tax_type,
            "address" => $request->address,
            "updated_at" => date('Y-m-d H:i:s'),
            "updated_by" => Auth::user()->name,
        ]);

        return redirect()->route('master.supplier.index');
    }

    public function delete($id) {
        $data = DB::table('master.m_supplier')->where('id', $id)->delete();
        return redirect()->route('master.supplier.index');
    }
}
