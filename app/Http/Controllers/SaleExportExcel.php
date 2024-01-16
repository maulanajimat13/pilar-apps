<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SaleExportExcel extends Controller
{
    //
    public function export_excel()
    {
        return Excel::download(new SaleExport, 'sale.xlsx');
    }
}

