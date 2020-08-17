<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    //

    public function index(){

        $pdf = PDF::loadHTML('<h1>Hello World</h1>');

        //PDFを表示
        return $pdf->stream();

        //PDFをダウンロード
        //return $pdf->download('hello.pdf');
    }
}
