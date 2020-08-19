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

    public function index($id){

        //下記以外のものを$idを条件として取得
        $contact = ShinseiForm::find($id);

        $spreadsheet = IOFactory::load(public_path() . '/excel/shinsei_template.xlsx');
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('H4', 'システム開発部');
        $sheet->setCellValue('B6', 'システム開発部');
        $sheet->setCellValue('B8', '米村郁也');
        $sheet->setCellValue('B12', '東京都');
        $sheet->setCellValue('B13', '2020/08/01');
        $sheet->setCellValue('D13', '2020/08/02');
        $sheet->setCellValue('B14', 'TEST');
        $sheet->setCellValue('B15', '2020/08/01');
        $sheet->setCellValue('B16', 'TEST');
        $sheet->setCellValue('B18', '地下鉄');
        $sheet->setCellValue('D18', '三宮');
        $sheet->setCellValue('G18', '新神戸');
        $sheet->setCellValue('H18', '200');
        $sheet->setCellValue('B19', '新幹線');
        $sheet->setCellValue('D19', '新神戸');
        $sheet->setCellValue('G19', '東京');
        $sheet->setCellValue('H19', '14000');
        $sheet->setCellValue('B25', '1500');
        $sheet->setCellValue('G25', '15000');
        $sheet->setCellValue('B26', '20000');

        File::setUseUploadTempDirectory(public_path());

        //PDFの作成
        $writer = IOFactory::createWriter($spreadsheet, 'Dompdf');
        //$writer->setFont('ipaexm');
        //public/excelの階層にダウンロード
        $writer->save(public_path() . '/excel/shinsei_test.pdf');


        //excelの保存
        $writer = new Xlsx($spreadsheet);
        $writer->save(public_path() . '/excel/shinsei_test.xlsx');


        $homeLists = DB::table('shinsei_forms')
        ->select('id','ikisaki','From','To','kariharai','checkFlg')
        ->where('name', Auth::user()->name )
        ->get();

        return view('.contact/businessTripHome',compact('homeLists'));
    }


}
