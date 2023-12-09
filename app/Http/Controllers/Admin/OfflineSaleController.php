<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\OfflineOrderDataTable;
use App\Enums\ProductStatus;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Inventory;
use App\Models\OfflineCustomer;
use App\Models\OfflineOrder;
use App\Models\OfflineOrderList;
use App\Models\Product;
use App\Models\StockOut;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OfflineSaleController extends Controller
{
    public function customerSale($id)
    {
        $customer = OfflineCustomer::find($id);
        $cartCount = Cart::where('user_id', $customer->id);
        $cart = $cartCount->get();
        $totalPrice = $cartCount->sum('price');
        $totalQuantity = $cartCount->sum('quantity');
        $products = Product::select('id', 'product_name')->where('status', ProductStatus::Active->value)->get();
        return view('admin.offline.customer.sale-create', compact('cart', 'products', 'customer', 'totalPrice', 'totalQuantity'));
    }

    public function selectProduct(Request $request)
    {
        $inventory = Inventory::select('id', 'product_id', 'quantity')->where('product_id', $request->product_id)->first();
        $quantity = $inventory->quantity;
        return response()->json([
            'inventory' => $quantity,
        ]);
    }

    public function saleAddCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'customer_id' => 'required',
            'quantity' => 'required',
            'price' => 'required',
        ]);

        $product_id = $request->product_id;
        $customer_id = $request->customer_id;
        $inventory = Inventory::select('id', 'quantity', 'product_id')->where('product_id', $product_id)->first();
        if ($inventory->quantity < $request->quantity) {
            return back()->with('error', 'Stock Not Available!');
        }
        
        $addCart = Cart::select('id', 'user_id', 'product_id', 'quantity')
                    ->where('product_id', $product_id )
                    ->where('user_id', $customer_id);
        $exist = $addCart->exists();
        if ($exist == true) {
            $cart = $addCart->first();
            if ($inventory->quantity <= $cart->quantity) {
                return back()->with('error', 'Stock Not Available!');
            }
            $cart->increment('quantity', $request->quantity);
            $cart->save();
            return back()->with('success', 'It has already added & Increment quantity!');
            return response()->json(['']);
        }

        $cart = new Cart();
        $cart->user_id = $customer_id;
        $cart->product_id = $product_id;
        $cart->quantity = $request->quantity;
        $cart->price = $request->price;
        $cart->color_id = $request->color_id ?? null;
        $cart->size_id = $request->size_id ?? null;
        $cart->save();
        return back()->with('success', 'Added successfully!');
    }
    public function removeEnty($id)
    {
        $cart = Cart::find($id);
        $cart->forceDelete();
        return back()->with('error', 'Remove successfully!');
    }
    public function saleStore(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'grand_total' => 'required',
            'invoice_number' => 'nullable',
            'sub_total' => 'required',
        ]);
        $randomInvoice = mt_rand(1000000000, 9999999999);
        $subTotal = intval($request->sub_total);
        $order_id = OfflineOrder::insertGetId([
            'offline_customer_id' => $request->customer_id,
            'grand_total' => $request->grand_total,
            'due_amount' => $request->due_amount,
            'payable_amount' => $request->payable_amount,
            'sub_total' => $subTotal,
            'invoice_number' => $randomInvoice,
            'shipping_charge' => $request->shipping_charge ?? null,
            'created_at' => Carbon::now(),
        ]);

        $carts = Cart::where('user_id', $request->customer_id)->get();

        foreach ($carts as $cart) {
            $inventory = Inventory::where('product_id', $cart->product_id)->exists();
            if($inventory == true) {
                // According to size and color quantiy decrement
                if ($cart->color_id != null && $cart->size_id != null) {
                    Inventory::where(['product_id' => $cart->product_id, 'color_id' => $cart->color_id, 'size_id' => $cart->size_id])->decrement('quantity', $cart->quantity);
                }

                // According to only size and quantiy decrement
                if ($cart->color_id == null && $cart->size_id != null) {
                    Inventory::where(['product_id' => $cart->product_id, 'color_id' => null, 'size_id' => $cart->size_id])->decrement('quantity', $cart->quantity);
                }

                // According to only color and quantiy decrement
                if ($cart->color_id != null && $cart->size_id == null) {
                    Inventory::where(['product_id' => $cart->product_id, 'color_id' => $cart->color_id, 'size_id' => null])->decrement('quantity', $cart->quantity);
                }

                // According to size and color both empty only quantiy decrement
                if ($cart->color_id == null && $cart->size_id == null) {
                    Inventory::where(['product_id' => $cart->product_id, 'color_id' => null, 'size_id' => null])->decrement('quantity', $cart->quantity);
                }
            } else {
                return response()->json(['Stock not available!']);
            }
            OfflineOrderList::insert([
                'offline_order_id' => $order_id,
                'product_id' => $cart->product_id,
                'quantity' => $cart->quantity,
                'color_id' => $cart->color_id,
                'size_id' => $cart->size_id,
                'product_price' => $cart->price,
                'created_at' => Carbon::now(),
            ]);
            StockOut::insert([
                'product_id' => $cart->product_id,
                'size_id' => $cart->size_id,
                'color_id' => $cart->color_id,
                'quantity' => $cart->quantity,
                'product_price' => $cart->price,
                'created_at' => Carbon::now(),
            ]);
            $cart->forceDelete();
        }
        return back()->with('success', 'Sale created successfully!');
    }

    public function orderIndex(OfflineOrderDataTable $dataTable)
    {
        return $dataTable->render('admin.offline.order-index');
    }

    public function orderShow($id)
    {
        $order = OfflineOrder::find($id);
        $orderList = OfflineOrderList::where('offline_order_id', $order->id)->get();
        return view('admin.offline.order-show', compact('orderList', 'order'));
    }

    public function amountStatus($id)
    {
        $order = OfflineOrder::find($id);
        $order->payable_amount = $order->grand_total;
        $order->due_amount = 00;
        $order->save();
        return response()->json(['Amount status changed successfully!']);
    }
}
