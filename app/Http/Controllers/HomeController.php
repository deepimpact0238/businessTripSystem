<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\storePost;
use App\Models\ShinseiForm;

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

        $contact = ShinseiForm::find();

        return view('contact.rireki', compact('contact','prefectures'));
    }
}
