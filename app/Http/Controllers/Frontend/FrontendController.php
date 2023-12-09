<?php

namespace App\Http\Controllers\Frontend;

use App\Enums\ProductStatus;
use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\DealerPrice;
use App\Models\Inventory;
use App\Models\News;
use App\Models\Order;
use App\Models\OrderList;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\RegularPrice;
use App\Models\Review;
use App\Models\Slider;
use App\Models\Utils;
use Illuminate\Http\Request;

class FrontendController extends Controller
{

    public function index(Request $request)
    {
        $product = Product::select('id', 'slug', 'product_image', 'sku', 'product_name', 'category_id', 'status', 'long_description', 'a_status')
                        ->with('dealerPrice')
                        ->with('userPrice');
        $items = clone $product;
        $products = $items->whereIn('status', [ProductStatus::Active->value, ProductStatus::Comming->value])
                        ->where('a_status', ProductStatus::Featured->value)
                        ->limit(8)->orderBy('numbering', 'asc')->get();
        $arrivals = clone $product;
        $arrivals = $arrivals->where('status' , ProductStatus::Arrival->value)->get();
        $sliders = Slider::select('id','heading','paragraph', 'url','button_type','image', 'numbering')
                            ->where('status', StatusEnum::Active->value)->orderBy('numbering', 'asc')->get();
        return view('welcome', compact('products', 'sliders', 'arrivals'));
    }

    public function productDetails($slug, $id)
    {
        $product = Product::select('id','category_id','product_image','slug', 'sku', 'tag', 'short_description', 'long_description', 'warranty_day', 'product_name','status','thumbnail_image')
                            ->with('userPrice')->find($id);
        $days = $product->warranty_day;
        $days_per_month = 30.44;

        $months = $days / $days_per_month;

        $inventory = Inventory::select('id','product_id', 'quantity')
                            ->with('product')->where('product_id', $id)->first();

        $relatedProducts = $product->where('category_id', $product->category_id)->where('id', '!=', $id)->limit(4)->with('dealerPrice')->with('userPrice')->get();
        $reviews = Review::select('id','name', 'rating', 'comment')->where('product_id', $id)->where('status', StatusEnum::Active)
                    ->get();

        $averageRating = $reviews->isEmpty() ? 0 : $reviews->average('rating');
        $orderList = null;
        if (auth()->check()) {
            $order = Order::select('id', 'user_id', 'status')
            ->where('user_id', auth()->user()->id)->where('status', StatusEnum::Complete->value)->first();
            if(isset($order->id)) {
                $orderList = OrderList::select('id')->where('order_id', $order->id)->where('product_id', $product->id)->first();
            }
            $cart = Cart::select('id', 'quantity')->where(['product_id' => $product->id, 'user_id' => auth()->user()->id])->first();
        } else {
            $cart = 1;
        }
        // if(isset($inventory->quantity) > 30) {
        //     $inventory->quantity = 30;
        // }
        if(isset($inventory->quantity) && $inventory->quantity > 30) {
            $inventory->quantity = 30;
        }
        
        return view('frontend.product.details', compact('months','product', 'inventory', 'averageRating', 'orderList', 'reviews', 'relatedProducts', 'cart'));
    }

    public function categoryWisePage($id)
    {
        $categories = Category::select('id', 'name')->where('status', StatusEnum::Active->value)->orderBy('created_at', 'desc')->get();

        // $products = Product::select('id', 'slug', 'product_image', 'sku', 'product_name', 'category_id', 'status', 'long_description')
        //         ->with('dealerPrice')
        //         ->with('userPrice')
        //         ->leftJoin('inventories', 'products.id', '=', 'inventories.product_id')
        //         ->where('category_id', $id)
        //         ->whereIn('status', [ProductStatus::Active->value, ProductStatus::Comming->value])
        //         ->orderBy('inventories.quantity', 'desc')
        //         ->get();

        $products = Product::select(
            'products.id',
            'products.slug',
            'products.product_image',
            'products.sku',
            'products.product_name',
            'products.category_id',
            'products.status',
            'products.long_description'
        )
        ->with('dealerPrice')
        ->with('userPrice')
        ->leftJoin('inventories', function ($join) {
            $join->on('products.id', '=', 'inventories.product_id');
        })
        ->where('products.category_id', $id)
        ->whereIn('products.status', [ProductStatus::Active->value, ProductStatus::Comming->value])
        ->orderByRaw('IFNULL(inventories.quantity, 0) DESC')
        ->get();                
        return view('frontend.product.category', compact('products', 'categories'));
    }

    public function aboutSalamat()
    {
        return view('frontend.about.salamat');
    }

    public function aboutVolt()
    {
        return view('frontend.about.volt-me');
    }

    public function newsIndex()
    {
        $newses = News::where('status', StatusEnum::Active->value)->get();
        return view('frontend.news.index', compact('newses'));
    }

    public function newsDetails(News $news)
    {
        return view('frontend.news.details', compact('news'));
    }

    public function warrantyPrivacy()
    {
        $policy = Utils::where('status', StatusEnum::Active->value)->first();;
        return view('frontend.utils.warranty-policy', compact('policy'));
    }

    public function privacy()
    {
        $policy = Utils::where('status', StatusEnum::Active->value)->first();;
        return view('frontend.utils.privacy', compact('policy'));
    }

    public function terms()
    {
        $policy = Utils::where('status', StatusEnum::Active->value)->first();;
        return view('frontend.utils.terms', compact('policy'));
    }

    public function refundPolicy()
    {
        $policy = Utils::where('status', StatusEnum::Active->value)->first();;
        return view('frontend.utils.refund-policy', compact('policy'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $results = Product::select('id', 'slug', 'product_image', 'product_name', 'category_id', 'status')
                            ->with('dealerPrice')->with('userPrice')
                            ->where('product_name', 'LIKE', '%' . $query . '%')->get();

        return view('frontend.search-results.index', ['results' => $results]);
    }

    public function searchIndex()
    {
        $products = Product::select('product_name')->get();
        $data = [];

        foreach ($products as $product) {
            $data[] = $product['product_name'];
        }
        return $data;
    }

}
