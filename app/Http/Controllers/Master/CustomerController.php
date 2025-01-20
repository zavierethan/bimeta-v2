<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class CustomerController extends Controller
{
    public function index() {
        $pic = DB::table('public.users')->get();
        $data = DB::table('master.m_customer')->orderBy('id')->get();
        return view('master.customer.index', compact('data', 'pic'));
    }

    public function save(Request $request) {
        $data = DB::table('master.m_customer')->insert([
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
            "customer_type" => $request->customer_type,
            "created_at" => date('Y-m-d H:i:s'),
            "created_by" => Auth::user()->name,
        ]);
        return redirect()->route('master.customer.index');
    }

    public function edit($id) {
        $pic = DB::table('public.users')->get();
        $data = DB::table('master.m_customer')->where('id', $id)->first();
        return view('master.customer.edit', compact('data', 'pic'));
    }

    public function update(Request $request) {
        $data = DB::table('master.m_customer')->where('id', $request->id)->update([
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
            "customer_type" => $request->customer_type,
            "updated_at" => date('Y-m-d H:i:s'),
            "updated_by" => Auth::user()->name,
        ]);

        return redirect()->route('master.customer.index');
    }

    public function delete($id) {
        $data = DB::table('master.m_customer')->where('id', $id)->delete();
        return redirect()->route('master.customer.index');
    }
}
