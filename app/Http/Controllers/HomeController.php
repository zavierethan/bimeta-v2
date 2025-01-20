<?php

namespace App\Http\Controllers;

use Auth;
use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function loadMenus(){
        $func = sprintf('public._generate_menus(%s)', implode(',', array(Auth::user()->id)));
        $menus = DB::select('SELECT * FROM '.$func);
        
        return Response::json([
            'message' => 'success',
            'data' => $menus
        ], 200);
    }
}
