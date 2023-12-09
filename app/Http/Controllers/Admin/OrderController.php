<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ApproveOrderDataTable;
use App\DataTables\CompleteOrderDataTable;
use App\DataTables\DealerOrderDataTable;
use App\DataTables\IntransitOrderDataTable;
use App\DataTables\OrderDataTable;
use App\DataTables\PendingOrderDataTable;
use App\DataTables\ProcessingOrderDataTable;
use App\DataTables\RejectedOrderDataTable;
use App\DataTables\ReturnOrderDataTable;
use App\DataTables\UserOrderDataTable;
use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Inventory;
use App\Models\Order;
use App\Models\OrderList;
use App\Models\StockOut;
use App\Notifications\OrderConfirmation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function index(OrderDataTable $dataTable)
    {
        return $dataTable->render('admin.order.index');
    }

    public function dealerOrder(DealerOrderDataTable $dOdataTable)
    {
        return $dOdataTable->render('admin.order.dealer');
    }

    public function userOrder(UserOrderDataTable $uOdataTable)
    {
        return $uOdataTable->render('admin.order.user');
    }

    public function pendingOrder(PendingOrderDataTable $pOdataTable)
    {
        return $pOdataTable->render('admin.order.pending');
    }

    public function processingOrder(ProcessingOrderDataTable $ppdataTable)
    {
        return $ppdataTable->render('admin.order.processing');
    }

    public function approveOrder(ApproveOrderDataTable $aPdataTable)
    {
        return $aPdataTable->render('admin.order.approve');
    }

    public function intransitOrder(IntransitOrderDataTable $iTdataTable)
    {
        return $iTdataTable->render('admin.order.intransit');
    }

    public function returnOrder(ReturnOrderDataTable $iTdataTable)
    {
        return $iTdataTable->render('admin.order.return');
    }

    public function rejectedOrder(RejectedOrderDataTable $rOdataTable)
    {
        return $rOdataTable->render('admin.order.rejected');
    }

    public function completeOrder(CompleteOrderDataTable $cOdataTable)
    {
        return $cOdataTable->render('admin.order.complete');
    }

    public function show($id)
    {
        $order = Order::find($id);
        $orderList = OrderList::where('status', StatusEnum::Active->value)->where('order_id', $order->id)->get();
        return view('admin.order.show', compact('orderList', 'order'));
    }

    public function destroy($id)
    {
        $item = Order::find($id);
        $item->delete();
        $item->save();
        return response()->json(['Order Deleted successfully!']);
    }

    public function approved($id)
    {
        $item = Order::select('id', 'status', 'email')->find($id);
        if ($item->status == StatusEnum::Pending->value) {
            $item->status = StatusEnum::Approved->value;
        }

        $orderLists = OrderList::select('id', 'product_id', 'size_id', 'color_id', 'quantity', 'product_price')
                    ->where('order_id', $item->id);
        $orderItems = $orderLists->get();
        // $orderList = $orderLists->first();

        // foreach ($orderItems as $out) {
        //     StockOut::insert([
        //         'product_id' => $out->product_id,
        //         'size_id' => $out->size_id,
        //         'color_id' => $out->color_id,
        //         'quantity' => $out->quantity,
        //         'product_price' => $out->product_price,
        //         'created_at' => Carbon::now(),
        //     ]);
        // }
        foreach ($orderItems as $orderList) {
            $inventory = Inventory::where('product_id', $orderList->product_id)->first();
            if($inventory->quantity > 5) {
                StockOut::insert([
                    'product_id' => $orderList->product_id,
                    'size_id' => $orderList->size_id,
                    'color_id' => $orderList->color_id,
                    'quantity' => $orderList->quantity,
                    'product_price' => $orderList->product_price,
                    'created_at' => Carbon::now(),
                ]);
                // According to size and color quantiy decrement
                if ($orderList->color_id != null && $orderList->size_id != null) {
                    Inventory::where(['product_id' => $orderList->product_id, 'color_id' => $orderList->color_id, 'size_id' => $orderList->size_id])->decrement('quantity', $orderList->quantity);
                }

                // According to only size and quantiy decrement
                if ($orderList->color_id == null && $orderList->size_id != null) {
                    Inventory::where(['product_id' => $orderList->product_id, 'color_id' => null, 'size_id' => $orderList->size_id])->decrement('quantity', $orderList->quantity);
                }

                // According to only color and quantiy decrement
                if ($orderList->color_id != null && $orderList->size_id == null) {
                    Inventory::where(['product_id' => $orderList->product_id, 'color_id' => $orderList->color_id, 'size_id' => null])->decrement('quantity', $orderList->quantity);
                }

                // According to size and color both empty only quantiy decrement
                if ($orderList->color_id == null && $orderList->size_id == null) {
                    Inventory::where(['product_id' => $orderList->product_id, 'color_id' => null, 'size_id' => null])->decrement('quantity', $orderList->quantity);
                }
            } else {
                return response()->json(['Stock not available!']);
            }
        }
        $item->save();

        $notifyMessage = [
            'title' => 'Your order has been approved!',
            'name' => 'Thank You'.' '.$item->customer_name,
        ];  
        Notification::route('mail', $item->email)
           ->notify(new OrderConfirmation($notifyMessage));
        return response()->json(['Status changed successfully!']);
    }

    public function processed($id)
    {
        $order = Order::find($id);
        if ($order->status == StatusEnum::Approved->value) {
            $order->status = StatusEnum::Processing->value;
        }
        $order->save();

        // $notifyMessage = [
        //     'title' => 'Your order is processing!',
        //     'name' => 'Thank You'.' '.$order->customer_name,
        // ];  
        // Notification::route('mail', $order->email)
        //    ->notify(new OrderConfirmation($notifyMessage));

        return response()->json(['Status changed successfully!']);
    }

    public function dispatch($id)
    {
        $order = Order::find($id);
        if ($order->status == StatusEnum::Processing->value) {
            $order->status = StatusEnum::OnWay->value;
        }
        $order->save();

        // $nitifyOrder = [
        //     'title' => 'Your Order On The Way!',
        //     'name' => 'Thank You'.' '.$order->user->name,
        // ];
        // auth()->user()->notify(new OrderConfirmation($nitifyOrder));

        return response()->json(['Status changed successfully!']);
    }

    public function complete($id)
    {
        $order = Order::find($id);
        if ($order->status == StatusEnum::Processing->value || $order->status == StatusEnum::OnWay->value || $order->status == StatusEnum::Approved->value) {
            $order->status = StatusEnum::Complete->value;
        }
        $order->save();

        // $nitifyOrder = [
        //     'title' => 'Your Order Completed Successfully!',
        //     'name' => 'Thank You'.' '.$order->user->name,
        // ];
        // auth()->user()->notify(new OrderConfirmation($nitifyOrder));

        $notifyMessage = [
            'title' => 'Congratulations, Product successfully deliveried!',
            'name' => 'Thank You'.' '.$order->customer_name,
        ];  
        Notification::route('mail', $order->email)
           ->notify(new OrderConfirmation($notifyMessage));

        return response()->json(['Status changed successfully!']);
    }

    public function rejected($id)
    {
        $order = Order::find($id);
        if ($order->status == StatusEnum::Pending->value) {
            $order->status = StatusEnum::Rejected->value;
        }
        $order->save();
        return response()->json(['Status changed successfully!']);
    }

    public function addReturn($id)
    {
        $order = Order::find($id);
        if ($order->status == StatusEnum::OnWay->value) {
            $order->status = StatusEnum::Return->value;
        }
        $order->save();
        return response()->json(['Status changed successfully!']);
    }
    public function amountStatus($id)
    {
        $order = Order::find($id);
        $order->payable_amount = $order->grand_total;
        $order->due_amount = 00;
        $order->save();
        return response()->json(['Amount status changed successfully!']);
    }

    public function acceptReturn($id)
    {
        $item = Order::select('id', 'status')->find($id);
        $orderList = OrderList::select('id', 'product_id', 'size_id', 'color_id', 'quantity')
                    ->where('order_id', $item->id)
                    ->first();

        Inventory::where('product_id', $orderList->product_id)->increment('quantity', $orderList->quantity);
        if ($item->status == StatusEnum::Return->value) {
            $item->status = StatusEnum::Rejected->value;
        }
        $item->save();
        return response()->json(['Status changed successfully!']);
    }
}
