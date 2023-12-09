<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\WarrantyDataTable;
use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Notifications\OrderConfirmation;
use Illuminate\Support\Facades\Notification;
use App\Models\ProductVerify;
use App\Models\Warranty;

use function Termwind\render;

class WarrantyController extends Controller
{
    public function index(WarrantyDataTable $dataTable)
    {
        return $dataTable->render('admin.warranty.index');
    }

    public function show($id)
    {
        $warranty = Warranty::find($id);
        return view('admin.warranty.show', compact('warranty'));
    }

    public function warrantyReject($id)
    {
        $verifyProduct = ProductVerify::find($id);
        $verifyProduct->status = StatusEnum::Rejected->value;
        $verifyProduct->save();
        $notifyMessage = [
            'title' => 'Warranty Activation is Rejected!',
            'name' => 'Thank You'.' '.$verifyProduct->name,
        ];  
        Notification::route('mail', $verifyProduct->address)
           ->notify(new OrderConfirmation($notifyMessage));
        return back()->with('success', 'Rejected successfully!');
    }

    public function download($id)
    {
        $warranty = Warranty::find($id);
        $fileName = public_path('uploads/warranty/'.$warranty->attachments);
        return response()->download($fileName);
    }
}
