<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\storePost;
use App\Models\ShinseiForm;
use Auth;

class KanriController extends Controller
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

        $prefectures = DB::table('prefectures')
        ->select('name')
        ->get();

        $kanriLists = DB::table('shinsei_forms')
        ->select('id','busyo','name','ikisaki','From','To','kariharai','checkFlg')
        ->get();

        return view('contact.kanri', compact('kanriLists','prefectures'));
    }

    public function show()
    {
        //
        $prefectures = DB::table('prefectures')
        ->select('name')
        ->get();

    }
}
