<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DealerPrice;
use App\Models\Product;
use App\Models\RegularPrice;
use Illuminate\Http\Request;

class ProductPriceController extends Controller
{
    
    public function changePrice($id)
    {
        $product = Product::find($id);
        // $dealerPrice = DealerPrice::select('id','dealer_price', 'dealer_dis_fixed', 'dealer_dis_percentage', 'product_id')->where('product_id', $product->id)->first();
        $userPrice = RegularPrice::select('id','regular_price', 'discount_fixed', 'discount_percentage', 'product_id')->where('product_id', $product->id)->first();
        return view('admin.product.change-price', compact('userPrice', 'product'));
    }

    public function priceUpdateRegular(Request $request, $id) 
    {
        $customerPrice = $request->regular_price;

        $customerDiscountAmount = $request->discount_fixed;
        $customerCurrentPrice = $customerPrice - $customerDiscountAmount;

        if ($customerPrice < $customerDiscountAmount) {
            return back()->with('error', 'Discounted price too long!');
        }
        $regularPrice = RegularPrice::find($id);
        $regularPrice->product_id = $request->product_id;
        $regularPrice->regular_price = $customerPrice;
        $regularPrice->discount_fixed = $customerCurrentPrice ?? $customerPrice;
        $regularPrice->discount_percentage = $request->discount_percentage ?? 00;
        $regularPrice->save();
        return back()->with('success','Updated successfully!');
    }

    public function priceUpdateDealer(Request $request, $id) 
    {
        $dealerDiscountAmount = $request->dealer_dis_fixed;
        $dealerCurrentPrice = $request->dealer_price - $dealerDiscountAmount;
        
        $delPriceUpdate = DealerPrice::find($id);
        $delPriceUpdate->product_id = $request->product_id;
        $delPriceUpdate->dealer_dis_fixed = $dealerCurrentPrice ?? $request->dealer_price;
        $delPriceUpdate->dealer_price = $request->dealer_price;
        $delPriceUpdate->dealer_dis_percentage = $request->dealer_dis_percentage ?? 00;
        $delPriceUpdate->save();
        return back()->with('success','Updated successfully!');

    }
}
