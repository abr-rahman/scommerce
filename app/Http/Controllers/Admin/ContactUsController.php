<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ContactDataTable;
use App\Models\ContactUs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use function Termwind\render;

class ContactUsController extends Controller
{
   public function index(ContactDataTable $dataTable)
   {
      return $dataTable->render('admin.contact.index');
   }
}
