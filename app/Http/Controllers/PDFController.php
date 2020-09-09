<?php

namespace App\Http\Controllers;

use App\Exports\Export;
use Illuminate\Http\Request;
use App\Models\ShinseiForm;
use Illuminate\Support\Facades\DB;
use Auth;
use PDF;


// Spreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xls as XlsReader;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as Reader;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class PDFController extends Controller
{
    //

    public function index(){

        //$pdf = PDF::loadView('contact/shinseiPDF');
        $pdf = PDF::loadHTML('<h1>米村テスト</h1>');

        return $pdf->stream();

        //return $pdf->download('hello.pdf');
    }


}
