<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SupplierController extends Controller
{
    public function page(Request $request) {
        
        $query = DB::table('master.m_supplier')
                ->select('code', 'name', 'address', 'phone_number', 'pic', 'tax_type');
        $totalRecords = $query->count();
    
        if ($request->has('search')) {

            $search = $request->search;
            $query->where('name', 'ILIKE', "%$search%");
        }
        
        $data = $query->paginate($request->input('length', 10));
    
        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $data->total(),
            'data' => $data->items(),
        ]);
    }
}
