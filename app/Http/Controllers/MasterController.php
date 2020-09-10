<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\storePost;
use App\Models\ShinseiForm;
use App\Models\UserMaster;
use Auth;

class MasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        //
        $userLists = DB::table('users')
        ->select('syainID','busyo','name','nitto','syukuhakuhi')
        ->get();

        $adminCheck = DB::table('users')
        ->select('adminFlg')
        ->where('syainID',Auth::user()->syainID)
        ->get();

        $homeLists = DB::table('shinsei_forms')
        ->select('id','ikisaki','From','To','kariharai','checkFlg')
        ->where('name', Auth::user()->name )
        ->get();


        //管理者権限があるユーザーにはページを表示する
        if($adminCheck == false){
            return view('.contact/businesstripsystem',compact('homeLists'));
        }else{
            return view('.contact/master',compact('userLists'));
        }
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $userLists = new UserMaster;

        $userLists->nitto = $request->input('nitto');
        $userLists->syukuhakuhi = $request->input('syukuhakuhi');

        $userLists->save();

        //送信後にホーム画面にリダイレクト
        return redirect('contact/home');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
