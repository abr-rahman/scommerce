<?php

namespace App\Http\Controllers\Frontend;

use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Dealership;
use App\Models\Order;
use App\Models\OrderList;
use App\Models\Support;
use App\Models\User;
use App\Models\Wishlist;
use App\Utils\FileUploader;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class UserDashboardController extends Controller
{
    public function index()
    {
        $user = User::where('id', auth()->user()->id)->first();
        $cart = Cart::where('user_id', $user->id)->count();
        $wishlist = Wishlist::where('user_id', $user->id)->count();
        $order = Order::where('user_id', $user->id)->get();

        $dealer = Dealership::where('user_id', $user->id)->first();
        $supports = Support::where('user_id', auth()->user()->id)->get();
        
        return view('frontend.dashboard.index', compact('user', 'cart', 'wishlist', 'order', 'dealer', 'supports'));
    }

    public function downloadInvoice($id)
    {
        $order = Order::find($id);
        $orderlist = OrderList::where('order_id', $order->id)->with('order');
                $orderDetails = $orderlist->get();

        $pdf = Pdf::loadView('frontend.dashboard.invoice', [
            'orderDetails' => $orderDetails,
            'order' => $order,
        ]);
        return $pdf->download();
    }
    
    public function updateUser(Request $request, $id, FileUploader $uploader)
    {
        $user = User::find($id);

        if (!$request['profile_photo']) {
            $user->profile_photo = $user->profile_photo;
            $user->save();
        } else {
            if (isset($request['profile_photo'])) {
                $oldFile = \public_path('uploads/profile/' . $user->profile_photo);
                if (isset($user->profile_photo)) {
                    if (file_exists($oldFile)) {
                        if($user->profile_photo != 'default-profile-image.png') {
                            unlink($oldFile);
                        }
                    }
                }
                $profile_photo = $uploader->upload($request->file('profile_photo'), 'uploads/profile/');
                $request['profile_photo'] = $profile_photo;
                $user->profile_photo = $profile_photo;
                $user->save();
            }
        }

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email_verified_at = null;
        $user->save();
        

        // $this->dealerService->update($request->validated(), $dealership->id);
        return back()->with('success', 'Updated successfully!');
    }
}
