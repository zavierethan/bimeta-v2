<?php

namespace App\Http\Controllers\Transaction;

use Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    public function index() {
        $roles = DB::table('public.roles')->get();
        $data = DB::table('public.users as user')
                ->select(
                    'user.id as user_id',
                    'user.username',
                    'user.display_name',
                    'user.email',
                    'user.last_login',
                    'role.name as role_name',
                    // DB::raw("CASE WHEN user.status = '1' THEN 'Aktif' ELSE 'Non Aktif' END AS status"),
                    'user.status'
                )
                ->leftJoin('public.roles as role', 'role.id', '=', 'user.role_id')
                ->orderBy('user.id', 'ASC')
                ->get();

        return view('transaction.user-management.users.index', compact('data', 'roles'));
    }

    public function save(Request $request) {

        DB::table('public.users')->insert([
            "username" => $request->username,
            "display_name" => $request->display_name,
            "email" => $request->email,
            "password" => Hash::make('BimetaKarnusa'),
            "role_id" => $request->role_id,
            "status" => 1,
            "created_at" => date('Y-m-d H:i:s')
        ]);

        return redirect()->route('user-management.user.index');
    }

    public function privilege($id) {
        $func = sprintf('public._generate_menus(%s)', implode(',', array($id)));
        $menus = DB::select('SELECT * FROM '.$func);

        $privilege = DB::table('public.users_privilege')->where('users_privilege.user_id', $id)->get();
        $user = DB::table('public.users')->where('users.id', $id)->first();
        $role = DB::table('public.roles')->where('roles.id', $user->role_id)->first();

        return view('transaction.user-management.users.privilege', compact('menus', 'privilege', 'user','role'));
    }

    public function store(Request $request)
    {
        DB::table('public.users_privilege')->where('user_id',$request->user_id)->delete();
        // print_r($request->menus);exit;
        $data = array();
        $menus = explode(",", $request->menus);
        foreach($menus as $menu) {
            array_push($data,array(
                'user_id'=> $request->user_id,
                'app_menu_id'=> $menu,
                'status'=> 1,
                'created_at'=>date('Y-m-d H:i:s')
            ));
        }
        // print_r($data);exit;

        DB::table('public.users_privilege')->insert($data); // does not call mutators

        return Response::json([
            'message' => 'success',
            'data' => null
        ], 200);
    }


}
