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
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\File;
use PhpOffice\PhpSpreadsheet\Reader\Xls as XlsReader;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as Reader;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class ExcelController extends Controller
{
    //

    public function index(){

        $spreadsheet = IOFactory::load(public_path() . '/excel/shinsei_template.xlsx');
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A4', 'サンプル株式会社');

        File::setUseUploadTempDirectory(public_path());

        //PDFの作成
        $writer = IOFactory::createWriter($spreadsheet, 'Dompdf');
        //$writer->setFont('ipaexm');
        //public/excelの階層にダウンロード
        $writer->save(public_path() . '/excel/output.pdf');


        //excelの保存
        //$writer = new Xlsx($spreadsheet);
        //$writer->save(public_path() . '/excel/output.xlsx');


        $homeLists = DB::table('shinsei_forms')
        ->select('id','ikisaki','From','To','kariharai','checkFlg')
        ->where('name', Auth::user()->name )
        ->get();

        return view('.contact/businessTripHome',compact('homeLists'));
    }


}
