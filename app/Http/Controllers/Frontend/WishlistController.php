<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function addWishlist(Request $request, $product_id)
    {
        $exist = Wishlist::where(['product_id' => $product_id, 'user_id' => auth()->id()])->exists();
        if (auth()->check()) {
        
            if ($exist) {
                return response()->json(['It has already added!']);
            } else {
                $wishList = new Wishlist();
                $wishList->product_id = $product_id;
                $wishList->user_id = auth()->id();
                $wishList->save();
                return response()->json(['Item has been added to wishlist!']);
            }
        } else {
            return response()->json(['error' => 'Please first login!'], 401);
        }
    }

    public function removeWishlist($wishlist_id)
    {
        $exist = Wishlist::where(['id' => $wishlist_id, 'user_id' => auth()->id()])->get();
        $exist->each->forceDelete();
        return back()->with('success', 'Wishlist remove successfully!');
    }

    public function index()
    {
        $wishLists = Wishlist::where('user_id', auth()->id())->with('product')->get();
        return view('frontend.wishlist.index', compact('wishLists'));
    }
}
