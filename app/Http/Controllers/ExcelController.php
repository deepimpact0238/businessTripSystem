<?php

namespace App\Http\Controllers;

use App\Exports\Export;
use Illuminate\Http\Request;
use App\Models\ShinseiForm;
use Illuminate\Support\Facades\DB;
use Auth;

class PDFController extends Controller
{
    //

    public function index(){

        $users = ShinseiForm::with('company.companyType', 'role')->get();
        return view('users.index', compact($users));
    }

    /**
     * 帳票のエクスポート
     */
    public function export()
    {
        $users = User::with('company.companyType', 'role')->get();
        $view = \view('users.export', compact($users));
        return \Excel::download(new Export($view), 'users.xlsx');
    }
}
