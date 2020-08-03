<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\storePost;
use App\Models\ShinseiForm;
use Auth;

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

        return view('rireki');
    }

    public function show()
    {
        //
        $prefectures = DB::table('prefectures')
        ->select('name')
        ->get();

        $rirekiLists = DB::table('shinsei_forms')
        ->select('id','ikisaki','From','To','kariharai','checkFlg')
        ->where('name', Auth::user()->name )
        ->get();

        return view('contact.rireki', compact('rirekiLists','prefectures'));
    }
}
