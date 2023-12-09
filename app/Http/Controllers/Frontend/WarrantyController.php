<?php

namespace App\Http\Controllers\Frontend;

use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Models\ProductVerify;
use App\Models\Warranty;
use App\Notifications\OrderConfirmation;
use App\Utils\FileUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class WarrantyController extends Controller
{
    public function index()
    {
        return view('frontend.warranty.index');
    }

    public function store(Request $request)
    {
        $verifyProduct = ProductVerify::select('id','phone', 'name', 'barcode_number', 'product_id', 'created_at', 'status')
                        ->with('product')
                        ->where('phone', $request->phone)
                        ->get();

        // $order = Order::select('id','phone','customer_name','invoice_number')->where('phone', $request->phone)
        //         ->where('status', StatusEnum::Complete->value)->get()->toArray();

        // $ids = array_column($order, 'id');

        // $order_list = OrderList::with('product')->whereIn('order_id',$ids)->get()->toArray();
        // $data['order'] = $order;
        // $data['order_list'] = $order_list;
        // dd($data['order_list']);
        return view('frontend.warranty.ajax_area.result', compact('verifyProduct'));
    }

    public function claimWarranty($id)
    {
        $warrantyList = ProductVerify::with('product')->find($id);
        return view('frontend.warranty.claim', compact('warrantyList'));
    }

    public function claimStore(Request $request, FileUploader $uploader)
    {
        $productVerifyId = ProductVerify::find($request->verify_id);
        $warranty = Warranty::where('others', $productVerifyId->barcode_number)->exists();
        if ($warranty == false){
            if ($request->hasFile('attachments')) {
                $attachments = $uploader->upload($request->file('attachments'), 'uploads/warranty/');
                $image['attachments'] = $attachments;
            }
            $data = new Warranty();
            $data->name = $request->name;
            $data->phone = $request->phone;
            $data->product_id = $request->product_id;
            $data->message = $request->message;
            $data->attachments = $attachments ?? null;
            $data->others = $request->others;
            $data->save();
    
            $notifyMessage = [
                'title' => 'Warranty claimed successfully!',
                'name' => 'Thank You'.' '.$request->name,
            ];
            Notification::route('mail', $request->email)
               ->notify(new OrderConfirmation($notifyMessage));
            return redirect()->route('frontend.index')->with('success', 'Warranty claimed successfully!');
        } else {
            return redirect()->route('frontend.index')->with('error', 'Already warranty claimed!');
        }
    }

}
