<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\RegularPrice;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductFrontendController extends Controller
{
    public function shortProduct(Request $request)
    {
        $filter = $request->input('filter');
        $commonProducts = Product::select('products.id', 'products.created_at', 'products.product_name', 'products.category_id', 'products.slug','products.status','products.product_image')
                ->with('category');

        if ($filter == 'ave_rating') {
            $products = Product::select('products.id', 'products.product_name', 'products.status', 'products.category_id', 'products.slug', 'products.product_image', DB::raw('AVG(reviews.rating) as average_rating'))
                ->leftJoin('reviews', 'products.id', '=', 'reviews.product_id')
                ->groupBy('products.id', 'products.product_name')
                ->with('category')
                ->orderBy('average_rating', 'desc')
                ->get();
        }
        elseif ($filter == 'low_to_high') {
            $products = $commonProducts->leftJoin('regular_prices', 'products.id', '=', 'regular_prices.product_id')
                ->orderBy('regular_prices.discount_fixed', 'asc')
                ->get();
        }
        elseif ($filter == 'high_to_low') {
            $products = $commonProducts->leftJoin('regular_prices', 'products.id', '=', 'regular_prices.product_id')
            ->orderBy('regular_prices.discount_fixed', 'desc')
            ->get();
        } 
        elseif ($filter == 'new_first') {
            $products = $commonProducts->orderBy('created_at', 'desc')
            ->get();
        } 
        elseif ($filter == 'old_first') {
            $products = $commonProducts->orderBy('created_at', 'asc')
            ->get();
        } 
        elseif ($filter == 'name_a_to_z') {
            $products = $commonProducts->orderBy('product_name', 'asc')->get();
        } 
        elseif ($filter == 'name_z_to_a') {
            $products = $commonProducts->orderBy('product_name', 'desc')->get();
        } 
        else {
            // Handle other filters or default case
            $products = $commonProducts->get();
        }
        // dd($products);
        return view('frontend.product.ajax_view.shorting', compact('products'));
        // return response()->json($filteredData);
    }
}
