<?php

namespace App\Http\Controllers\Frontend;

use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderStoreRequest;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\CustomShipping;
use App\Models\Division;
use App\Models\Order;
use App\Models\OrderList;
use App\Models\Shipping;
use App\Notifications\OrderConfirmation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function checkout()
    {
        $currentTotal = Session::get('sub_total');
        if(Session::get('coupon_code') != "") {
            $coupon = Coupon::where('code', Session::get('coupon_code'))->first();
            $coupon->decrement('use_limit', 1);

            $newId = auth()->user()->id;
            $existingUserIds = $coupon['user_id'];
            $existingUserIds = empty($existingUserIds) ? [] : explode(',', $existingUserIds);
            $existingUserIds[] = $newId;
            $coupon['user_id'] = implode(',', $existingUserIds);
            $coupon->save();
        }
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        $shippings = CustomShipping::where('status', StatusEnum::Active->value)->get();
        $divisions = Division::all();
        Session::put('sub_total', $currentTotal);

        return view('frontend.checkout.index', compact('carts', 'currentTotal', 'shippings', 'divisions'));
    }
    public function disTiShipping(Request $request)
    {
        $shipping = Shipping::where('status', StatusEnum::Active->value)->where('district_id', $request->district_id)->first();
        $charge = $shipping->charge;

        return response()->json([
            'shippingCharge' => $charge,
        ]);
    }

    public function orderConfirm(OrderStoreRequest $request)
    {
        $after_link = explode('/', url()->previous());
        if(end($after_link) != "checkout"){
            return abort(404);
        }
        $sub_total = $request->grand_total - $request->shipping_charge;
        $discount = 0;
        if (Session::get('coupon_code') != '') {
            $coupon = Coupon::where('code', Session::get('coupon_code'))->first();
            if ($coupon->fixed_amount != 00){
                $discount = $coupon->fixed_amount;
            }else{
                $discount =  ($sub_total * ($coupon->percent_amount/100));
            }
        }
        $randomInvoice = mt_rand(1000000000, 9999999999);
        $order_id = Order::insertGetId([
            'user_id' => auth()->id(),
            'customer_name' => $request->customer_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'upazila_id' => $request->upazila_id,
            'thana' => $request->thana,
            'payment_method' => $request->payment_method,
            'landmark' => $request->landmark,
            'shipping_charge' => $request->shipping_charge,
            'grand_total' => $request->grand_total,
            'sub_total' => $sub_total,
            'payable_amount' => 00,
            'due_amount' => $request->grand_total,
            'coupon_code' => Session::get('coupon_code'),
            'discount_amount' => $discount,
            'invoice_number' => $randomInvoice,
            'created_at' => Carbon::now(),
            'role' => auth()->user()->role,
        ]);

        $carts = Cart::where('user_id', auth()->id())->get();

        foreach ($carts as $cart) {
            OrderList::insert([
                'order_id' => $order_id,
                'product_id' => $cart->product_id,
                'quantity' => $cart->quantity,
                'color_id' => $cart->color_id,
                'size_id' => $cart->size_id,
                'product_price' => $cart->price,
                'created_at' => Carbon::now(),
            ]);
            $cart->forceDelete();
        }
        Session::forget('coupon_code');

        $order = [
            'title' => 'Your Order has been placed successfully!',
            'name' => 'Thank You'.' '.auth()->user()->name,
        ];
        // foreach ($carts as $product) {
        //     $order = [
        //         'product' => $product->product->product_name,
        //         'quantity' => $product->quantity,
        //         'sub_total' => $product->price * $product->quantity,
        //     ];
        // }

        auth()->user()->notify(new OrderConfirmation($order));


        if( $request->payment_method == 'online'){
            Session::put('s_order_id', $order_id);
            return redirect('pay');
        }else{
            return redirect()->route('user.dashboard')->with('success', 'Order created successfully!');
        }
        return back();
    }
}
