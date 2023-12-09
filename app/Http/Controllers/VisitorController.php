<?php

namespace App\Http\Controllers;

use App\DataTables\VisitorsDataTable;
use App\Models\Visitor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function index(Request $request, VisitorsDataTable $dataTable)
    {
        return $dataTable->render('admin.visitor.index');
    }

}
