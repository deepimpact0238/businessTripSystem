<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\storePost;
use App\Models\HokokuForm;
use App\Models\ShinseiForm;

class hokokuController extends Controller
{
    //
    public function index(){

      
        //dd();

        return view('contact.home');

        
    }

    public function create(Request $request, $id){

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

        return view('contact.hokoku', compact('contact','prefectures','kotukikanLists','kukan_fromLists','kukan_toLists','kukan_moneyLists'));

    }

    public function store(Request $request){
         // 
        $hokokuForm = new HokokuForm; 

        //implode→explode 保存するときと出力するとき
        //json_encode→json_decode
        //ユニークIDを入れる ex.PSS20200626-Y01 PSH20200627-Y01


        $hokokuForm->id = $request->input('id');
        $hokokuForm->busyo = $request->input('busyo');
        $hokokuForm->name = $request->input('name');
        $hokokuForm->ikisaki = $request->input('ikisaki');
        $hokokuForm->From = $request->input('kikan1');
        $hokokuForm->To = $request->input('kikan2');
        $hokokuForm->purchase = $request->input('mokuteki');
        $hokokuForm->seisan = $request->input('seisan');
        $hokokuForm->bikou = $request->input('biko');
        $hokokuForm->kotukikan = $request->input('kotukikan');
        $hokokuForm->kukan_from = $request->input('kukan_from');
        $hokokuForm->kukan_to = $request->input('kukan_to');
        $hokokuForm->kukan_money = $request->input('kukan_money');  
        //配列を1つの文字列にして格納する
        $hokokuForm->kotukikan = implode(',', $hokokuForm->kotukikan);
        $hokokuForm->kukan_from = implode(',', $hokokuForm->kukan_from);
        $hokokuForm->kukan_to = implode(',', $hokokuForm->kukan_to);
        $hokokuForm->kukan_money = implode(',', $hokokuForm->kukan_money); 

        $hokokuForm->nitto = $request->input('nitto');
        $hokokuForm->syukuhakuhi = $request->input('syukuhaku');
        $hokokuForm->kariharai = $request->input('karibarai');

        //未報告の場合は0を入れておいて報告済の場合は1にするフラグ
        $flg = DB::table('shinsei_forms')
        ->select('checkFlg')
        ->where('id', $request->input('id'))
        ->update(['checkFlg' => true]);


        $hokokuForm->save();


        //送信後にホーム画面にリダイレクト
        return redirect('contact/home');

    }

}
