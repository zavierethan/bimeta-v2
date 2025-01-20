<?php

namespace App\Http\Controllers\Transaction;

use Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class RoleController extends Controller
{
    public function index() {
        $data = DB::table('public.roles')->orderBy('id', 'ASC')->paginate(10);
        return view('transaction.user-management.roles.index', compact('data'));
    }

    public function save(Request $request) {
        DB::table('public.roles')->insert([
            "name" => $request->name,
            "created_at" => date('Y-m-d H:i:s'),
            "created_by" => Auth::user()->name,
        ]);

        return redirect()->back();
    }

    public function privilege($id) {
        $func = sprintf('public._generate_role_menus(%s)', implode(',', array('')));
        $menus = DB::select('SELECT * FROM '.$func);
        $role = DB::table('public.roles')->where('roles.id', $id)->first();

        return view('transaction.user-management.roles.privilege', compact('menus','role'));
    }

    public function store(Request $request)
    {
        // print_r($request->menus);exit;
        DB::table('public.roles')
            ->where('id', $request->id)
            ->update([
                'default_menus'=> $request->menus,
                'updated_by'=> Auth::user()->name,
                'updated_at'=>date('Y-m-d H:i:s')
            ]);

        return Response::json([
            'message' => 'success',
            'data' => null
        ], 200);
    }
       
}
