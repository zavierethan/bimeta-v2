<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class SalesOrderDetailController extends Controller
{
    public function save(Request $request){

        DB::table('transaction.t_detail_sales_order')->insert([
            "sales_order_id" => $request->sales_order_id,
            "goods_id" => $request->goods_id,
            "quantity" => $request->quantity,
            "price" => $request->price,
            "flag_print" => $request->flag_print,
            "remarks" => $request->remarks,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => Auth::user()->name,
        ]);

        return redirect()->route('sales.edit', ['id' => $request->sales_order_id]);
    }

    public function edit(){

    }

    public function update(Request $request){
        
    }

    public function delete($id){
        DB::table('transaction.t_detail_sales_order')->where('id', $id)->delete();
        return redirect()->back();
    }
}
