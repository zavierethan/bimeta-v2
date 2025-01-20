<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTable;

class IndexPriceController extends Controller
{
    public function index() {
        $substances = DB::table('master.m_substance')->orderBy('id', 'ASC')->get();
        $data = DB::table('transaction.t_mapping_index_price as index_price')
                ->select('index_price.*', 'substance.substance')
                ->join('master.m_substance as substance', 'substance.id', '=', 'index_price.substance_id')
                ->orderBy('index_price.id', 'ASC')
                ->get();
                
        $tags = DB::table('transaction.t_mapping_index_price as index_price')
                ->select('index_price.tag')
                ->distinct()
                ->orderBy('index_price.tag', 'DESC')
                ->get();

        return view('transaction.sales-order.index-price.index', compact('data', 'substances', 'tags'));
    }

    public function getData() {
        $data = DB::table('transaction.t_mapping_index_price as index_price')
                ->select('index_price.*', 'substance.substance')
                ->join('master.m_substance as substance', 'substance.id', '=', 'index_price.substance_id')
                ->orderBy('index_price.id', 'ASC');

        return DataTables::of($data)->make(true);
    }

    public function getIndexPrice($substance){
        $price = DB::table('transaction.t_mapping_index_price')->select('price')
                ->where('id', $substance)
                ->first();

        return response()->json($price);
    }

    public function getIndexSubstance($tag){
        $data = DB::table('transaction.t_mapping_index_price as index_price')
                ->select('index_price.*', 'substance.substance as substance_name')
                ->join('master.m_substance as substance', 'substance.id', '=', 'index_price.substance_id')
                ->where('index_price.tag', $tag)
                ->orderBy('index_price.id', 'ASC')
                ->get();

        return response()->json($data);
    }

    public function save(Request $request){
        DB::table('transaction.t_mapping_index_price')->insert([
            'ply_type' => $request->ply_type,
            'flute_type' => $request->flute_type,
            'substance_id' => $request->substance,
            'price' => $request->index_price,
            'tag' => $request->index_tag
        ]);        
        return redirect()->back();
    }

    public function edit($id){
        $substances = DB::table('master.m_substance')->get();
        $indexPrice = DB::table('transaction.t_mapping_index_price')->where('id', $id)->first();
        return view('transaction.sales-order.index-price.edit', compact('substances', 'indexPrice'));
    }

    public function update(Request $request){
        DB::table('transaction.t_mapping_index_price')->where('id', $request->id)->update([
            'ply_type' => $request->ply_type,
            'flute_type' => $request->flute_type,
            'substance_id' => $request->substance,
            'price' => $request->index_price,
            'tag' => $request->index_tag
        ]);

        return redirect()->route('index-price.index');
    }

    public function delete($id){
        DB::table('transaction.t_mapping_index_price')->where('id', $id)->delete();
        return redirect()->route('index-price.index');
    }

    public function getList() {
        return view('transaction.sales-order.index-price.index');
    }
}
