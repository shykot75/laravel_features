<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\ExportsDataTable;

class ExportController extends Controller
{
    public function index(ExportsDataTable $dataTable){
        return $dataTable->render('admin.yajra.button');
    }
}
