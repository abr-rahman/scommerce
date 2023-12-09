<?php

namespace App\Http\Controllers\Frontend;

use App\Models\ContactUs;
use App\Http\Controllers\Controller;
use App\Notifications\OrderConfirmation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ContactUsController extends Controller
{
   public function index()
   {
        return view('frontend.contact.index');
   }

   public function store(Request $request)
   {
      ContactUs::create($request->except('_token'));
      $notifyMessage = [
         'title' => 'Thank you for contact us!',
         'name' => 'Thank You'.' '.$request->name,
      ];  
      Notification::route('mail', $request->email)
        ->notify(new OrderConfirmation($notifyMessage));
      return back()->with('success','Message send successfully!');
   }
}
