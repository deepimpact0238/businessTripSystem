<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\storePost;
use App\Models\ShinseiForm;
use Auth;

class ContactFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        //
        $homeLists = DB::table('shinsei_forms')
        ->select('id','ikisaki','From','To','kariharai','checkFlg')
        ->where('name', Auth::user()->name )
        ->get();

        return view('.contact/businessTripHome',compact('homeLists'));
     
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $prefectures = DB::table('prefectures')->select('name')->get();
        //dd($todofuken);

        return view('contact.shinsei',compact('prefectures'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $shinseiForm = new ShinseiForm;  

        //implode→explode 保存するときと出力するとき
        //json_encode→json_decode
        //ユニークIDを入れる ex.PSS20200626-Y01 PSH20200627-Y01


        $shinseiForm->busyo = $request->input('busyo');
        $shinseiForm->name = $request->input('name');
        $shinseiForm->ikisaki = $request->input('ikisaki');
        $shinseiForm->From = $request->input('kikan1');
        $shinseiForm->To = $request->input('kikan2');
        $shinseiForm->purchase = $request->input('mokuteki');
        $shinseiForm->seisan = $request->input('seisan');
        $shinseiForm->bikou = $request->input('biko');
        $shinseiForm->kotukikan = $request->input('kotukikan');
        $shinseiForm->kukan_from = $request->input('kukan_from');
        $shinseiForm->kukan_to = $request->input('kukan_to');
        $shinseiForm->kukan_money = $request->input('kukan_money');  
        //配列を1つの文字列にして格納する
        $shinseiForm->kotukikan = implode(',', $shinseiForm->kotukikan);
        $shinseiForm->kukan_from = implode(',', $shinseiForm->kukan_from);
        $shinseiForm->kukan_to = implode(',', $shinseiForm->kukan_to);
        $shinseiForm->kukan_money = implode(',', $shinseiForm->kukan_money); 

        $shinseiForm->nitto = $request->input('nitto');
        $shinseiForm->syukuhakuhi = $request->input('syukuhaku');
        $shinseiForm->kariharai = $request->input('karibarai');
        

        //未報告の場合は0を入れておいて報告済の場合は1にするフラグ
        //$shinseiForm->checkFlg = $request->"0";



        $shinseiForm->save();

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
        $prefectures = DB::table('prefectures')
        ->select('name')
        ->get();

        $contact = ShinseiForm::find($id);

        return view('contact.show', compact('contact','prefectures'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //DBから値を取得する処理
        //都道府県マスタ
        $prefectures = DB::table('prefectures')
        ->select('name')
        ->get();

        //下記以外のものを$idを条件として取得
        $contact = ShinseiForm::find($id);

        //交通機関を$idを条件として取得
        $kotukikan = DB::table('shinsei_forms')
        ->select('kotukikan')
        ->where('id', $id)
        ->get();

        //区間fromを$idを条件として取得
        $kukan_from = DB::table('shinsei_forms')
        ->select('kukan_from')
        ->where('id', $id)
        ->get();

        //区間toを$idを条件として取得
        $kukan_to = DB::table('shinsei_forms')
        ->select('kukan_to')
        ->where('id', $id)
        ->get();

        //区間moneyを$idを条件として取得
        $kukan_money = DB::table('shinsei_forms')
        ->select('kukan_money')
        ->where('id', $id)
        ->get();


        //explodeした情報をforeachで回す
        //連想配列のvalueから値を取得するようにする

         $test = $kukan_from["0"];
         $test = $test->kukan_from;

        //上でDBから取得した文字列を使える状態の配列に成形していく
        $kotukikanList = $kotukikan["0"];
        //連想配列のkeyでvalueを取ってくる
        $kotukikanListArray = $kotukikanList->kotukikan;
        //,区切りで配列にする
        $kotukikanLists = explode(',',$kotukikanListArray);

        //上でDBから取得した文字列を使える状態の配列に成形していく
        $kukan_fromList = $kukan_from["0"];
        //連想配列のkeyでvalueを取ってくる
        $kukan_fromListArray = $kukan_fromList->kukan_from;
        //,区切りで配列にする
        $kukan_fromLists = explode(',',$kukan_fromListArray);

        //上でDBから取得した文字列を使える状態の配列に成形していく
        $kukan_toList = $kukan_to["0"];
        //連想配列のkeyでvalueを取ってくる
        $kukan_toListArray = $kukan_toList->kukan_to;
        //,区切りで配列にする
        $kukan_toLists = explode(',',$kukan_toListArray);

        //上でDBから取得した文字列を使える状態の配列に成形していく
        $kukan_moneyList = $kukan_money["0"];
        //連想配列のkeyでvalueを取ってくる
        $kukan_moneyListArray = $kukan_moneyList->kukan_money;
        //,区切りで配列にする
        $kukan_moneyLists = explode(',',$kukan_moneyListArray);

        //dd($kukan_moneyLists);
        //var_dump($test);

        return view('contact.edit', compact('contact','prefectures','kotukikanLists','kukan_fromLists','kukan_toLists','kukan_moneyLists'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //$shinseiForm = new ShinseiForm; 
        $shinseiForm = ShinseiForm::find($id); 

        //implode→explode 保存するときと出力するとき
        //json_encode→json_decode
        //ユニークIDを入れる ex.PSS20200626-Y01 PSH20200627-Y01


        $shinseiForm->busyo = $request->input('busyo');
        $shinseiForm->name = $request->input('name');
        $shinseiForm->ikisaki = $request->input('ikisaki');
        $shinseiForm->From = $request->input('kikan1');
        $shinseiForm->To = $request->input('kikan2');
        $shinseiForm->purchase = $request->input('mokuteki');
        $shinseiForm->seisan = $request->input('seisan');
        $shinseiForm->bikou = $request->input('biko');
        $shinseiForm->kotukikan = $request->input('kotukikan');
        $shinseiForm->kukan_from = $request->input('kukan_from');
        $shinseiForm->kukan_to = $request->input('kukan_to');
        $shinseiForm->kukan_money = $request->input('kukan_money');  
        //配列を1つの文字列にして格納する
        $shinseiForm->kotukikan = implode(',', $shinseiForm->kotukikan);
        $shinseiForm->kukan_from = implode(',', $shinseiForm->kukan_from);
        $shinseiForm->kukan_to = implode(',', $shinseiForm->kukan_to);
        $shinseiForm->kukan_money = implode(',', $shinseiForm->kukan_money); 

        $shinseiForm->nitto = $request->input('nitto');
        $shinseiForm->syukuhakuhi = $request->input('syukuhaku');
        $shinseiForm->kariharai = $request->input('karibarai');

        //未報告の場合は0を入れておいて報告済の場合は1にするフラグ
        //$shinseiForm->checkFlg = $request->"0";


        $shinseiForm->save();

        //送信後にホーム画面にリダイレクト
        return redirect('contact/home');

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
        $shinseiForm = ShinseiForm::find($id); 
        $shinseiForm->delete();

        //送信後にホーム画面にリダイレクト
        return redirect('contact/home');
    }

}
