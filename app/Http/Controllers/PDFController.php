<?php

namespace App\Http\Controllers;

use App\Exports\Export;
use Illuminate\Http\Request;
use App\Models\ShinseiForm;
use Illuminate\Support\Facades\DB;
use Auth;
use PDF;

class PDFController extends Controller
{
    //

    public function index(){

        $pdf = PDF::loadView('contact/shinseiPDF');
        //$pdf = PDF::loadHTML('<h1>Hello World</h1>');

        return $pdf->stream();

        //return $pdf->download('hello.pdf');
    }


}
