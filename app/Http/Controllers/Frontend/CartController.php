<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Inventory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function addCart(Request $request, $product_id)
    {
        $exist = Cart::where(['product_id' => $product_id, 'user_id' => auth()->id()])->exists();
        $inventory = Inventory::select('id', 'quantity')->where('product_id', $product_id)->first();
        $inventoryExists = Inventory::select('id')->where('product_id', $product_id)->exists();
        if (auth()->check()) {
            if($inventoryExists == true) {
                if ($inventory->quantity > 5) {
                    if ($exist) {
                        // Cart::where(['product_id' => $product_id, 'user_id' => auth()->id()])->increment('quantity', $request->quantity);
                        
                        $cart = Cart::where(['product_id' => $product_id, 'user_id' => auth()->id()])->first();
                        if ($inventory->quantity <= $cart->quantity) {
                            return response()->json(['Stock not available!']);
                        }
                        $cart->increment('quantity', $request->quantity);
                        $cart->save();

                        return response()->json(['It has already added & Increment quantity!']);
                    } else {
                        $cart = new Cart();
                        $cart->product_id = $product_id;
                        $cart->quantity = $request->quantity;
                        $cart->color_id = $request->color_id ?? null;
                        $cart->size_id = $request->size_id ?? null;
                        $cart->price = $request->price;
                        $cart->user_id = auth()->id();
                        $cart->save();
                        return response()->json(['Item has been added to cart!']);
                    }
                } elseif (isset($inventory) == null) {
                    return response()->json(['error' => 'Stock not available!'], 401);
                }
                 else {
                    return response()->json(['error' => 'Stock not available!'], 401);
                }
            }
            return response()->json(['error' => 'Stock not available!'], 401);
        } else {
            return response()->json(['error' => 'Please first login!'], 401);
        }
    }

    public function cartDetails()
    {
        if (auth()->check()) {
            $carts = Cart::where('user_id', auth()->user()->id)->get();
            return view('frontend.cart.index', compact('carts'));
        } else {
            return redirect()->route('login');
        }
    }

    public function removeCart(Request $request)
    {
        $cart = Cart::find($request->cart_id);
        $cart->forceDelete();
        // return back()->with(['success' => 'Item remove successfully!'], 201);
        return response()->json(['Item remove successfully!']);
    }

    public function increment(Request $request)
    {
        $inventory = Inventory::select('id', 'quantity')->where('product_id', $request->product_id)->first();

        $cart = Cart::where(['product_id' =>  $request->product_id, 'user_id' => auth()->id()])->first();
        if ($inventory->quantity <= $cart->quantity) {
            return response()->json(['Stock not available!']);
        }
        $cart->increment('quantity', 1);
        $cart->save();
        return response()->json(['Item increment successfully!']);
    }

    public function decrement(Request $request)
    {
        $cart = Cart::where(['product_id' =>  $request->product_id, 'user_id' => auth()->id()])->first();
        $cart->decrement('quantity', 1);
        $cart->save();
        return response()->json(['Item decrement successfully!']);
    }
}
