<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class shinseiController extends Controller
{
    //

    public function index(){

        $prefectures = DB::table('prefectures')->select('name')->get();
        //dd($todofuken);

        return view('shinsei',compact('prefectures'));
    }
}
