<?php

namespace App\Http\Controllers\Frontend;

use App\Models\ProductVerify;
use App\Http\Controllers\Controller;
use App\Http\Requests\VerifyStoreRequest;
use App\Models\Barcode;
use App\Notifications\OrderConfirmation;
use App\Utils\FileUploader;
// use Illuminate\Http\Request;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Request as RequestFacade;

class ProductVerifyController extends Controller
{
   public function index()
   {
        $currentURL = RequestFacade::fullUrl();
        $parseURL = parse_url($currentURL);
        $queryString = isset($parseURL['query']) ? str_replace('=', '', $parseURL['query']) : '';

        $qrCode = Barcode::select('id','barcode_number', 'product_id', 'serial_number')->with('product')->where('barcode_number', $queryString)->first();
        return view('frontend.verify.index', compact('queryString', 'qrCode'));
   }
   public function store(VerifyStoreRequest $request, FileUploader $uploader)
   {
        $numberExists = Barcode::select('id','barcode_number')->where('barcode_number', $request->barcode_number)->exists();
        if($numberExists == true) {
            $existsNumber = ProductVerify::where('barcode_number', $request->barcode_number)->exists();
            if ($existsNumber == true) {
                return redirect('/')->with('error', 'Product Already Verified!');
            } else {
                if ($request->hasFile('invoice_attachment')) {
                    $attachment = $uploader->upload($request->file('invoice_attachment'), 'uploads/verified/');
                    $product['invoice_attachment'] = $attachment;
                }
                $data = new ProductVerify();
                $data->product_id = $request->product_id;
                $data->name = $request->name;
                $data->phone = $request->phone;
                $data->address = $request->address; // this address is also email
                $data->barcode_number = $request->barcode_number;
                $data->shope_name = $request->shope_name;
                $data->invoice_attachment = $attachment;
                $data->district = $request->district; // this district is also address
                $data->save();
                $notifyMessage = [
                    'title' => 'Product Verified Successfully!',
                    'name' => 'Thank You'.' '.$request->name,
                ];  
                Notification::route('mail', $request->address)
                   ->notify(new OrderConfirmation($notifyMessage));
                   
                return redirect('/')->with('success', 'Product Verification successfully!');
            }
        } else {
            return back()->with('error', 'Code Number Not Found!');
        }
   }

}
