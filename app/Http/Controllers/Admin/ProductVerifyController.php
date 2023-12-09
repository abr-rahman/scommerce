<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\VerifiedProductDataTable;
use App\Http\Controllers\Controller;
use App\Models\Barcode;
use App\Models\ProductVerify;
use Illuminate\Http\Request;

class ProductVerifyController extends Controller
{
    public function index(VerifiedProductDataTable $dataTable)
    {
        return $dataTable->render('admin.verified.index');
    }
    public function show($id)
    {
        $verified = ProductVerify::find($id);
        return view('admin.verified.show', compact('verified'));
    }

    public function downloadInvoice($id)
    {
        $verified = ProductVerify::find($id);
        $fileName = public_path('uploads/verified/'.$verified->invoice_attachment);
        return response()->download($fileName);
    }
}
