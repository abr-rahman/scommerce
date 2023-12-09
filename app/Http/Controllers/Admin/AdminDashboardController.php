<?php

namespace App\Http\Controllers\Admin;

use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Models\OfflineCustomer;
use App\Models\Order;
use App\Models\ProductVerify;
use App\Models\User;
use App\Models\Visitor;
use App\Models\Warranty;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $orderStatus = Order::select('status', 'shipping_charge', 'sub_total', 'grand_total', 'created_at');

        $todayPendingOrders = clone $orderStatus;
        $todayPendingOrders = $todayPendingOrders->where('status', StatusEnum::Pending->value)
            ->whereDate('created_at', now()->toDateString())
            ->count();

        $todayApproveOrders = clone $orderStatus;
        $todayApproveOrders = $todayApproveOrders->where('status', StatusEnum::Approved->value)
            ->whereDate('created_at', now()->toDateString())
            ->count();

        $todayCompleteOrders = clone $orderStatus;
        $todayCompleteOrders = $todayCompleteOrders->where('status', StatusEnum::Complete->value)
            ->whereDate('created_at', now()->toDateString())
            ->count();

        $users = User::select('role');
        $userCount = $users->where('role','user')->count();
        $userDealer = $users->where('role','dealer')->count();
        $dealerCount = OfflineCustomer::select('id')->count();

        $orders = Order::select('status', 'shipping_charge', 'sub_total', 'grand_total', 'created_at')->get();

        $countAppOrder = count($orders->where('status', StatusEnum::Approved->value));

        $allPendingOrder = count($orders->where('status', StatusEnum::Pending->value));

        $compOrder = count($orders->where('status', StatusEnum::Complete->value));

        $subTotal = $orders->where('status', StatusEnum::Complete->value)->sum('sub_total');
        $grandTotal = $orders->where('status', StatusEnum::Complete->value)->sum('grand_total');

        $shippingCharge = $orders->where('status', StatusEnum::Complete->value)->sum('shipping_charge');

        $todayShippingCharge = $orders
                            ->filter(function ($order) {
                                return $order->status === StatusEnum::Complete->value && $order->created_at->isToday();
                            })->sum('shipping_charge');

        $todaySubTotal = $orders
                            ->filter(function ($order) {
                                return $order->status === StatusEnum::Complete->value && $order->created_at->isToday();
                            })->sum('sub_total');

        $todayGrandTotal = $orders
                            ->filter(function ($order) {
                                return $order->status === StatusEnum::Complete->value && $order->created_at->isToday();
                            })->sum('grand_total');

        $visitor = Visitor::select('visit_date');
        $totalVisitor = $visitor->count();
        $todayVisitor = $visitor->whereDate('visit_date', now()->toDateString())->count();
        // Calculate the start date 7 days ago
        $startDate = now()->subDays(7); 
        $endDate = now();
        $visitor7days =  $visitor->whereBetween('visit_date', [$startDate, $endDate])->count();

        $productVerify = ProductVerify::select('id', 'status');
        $warranty = Warranty::select('id', 'status');
        $countWarrantyProduct = $warranty->count();
        $countVerifyProduct = $productVerify->count();
        
        // dd($todayGrandTotal);

        return view('admin.dashboard', compact(
            'shippingCharge',
            'userDealer',
            'countVerifyProduct',
            'countWarrantyProduct',
            'grandTotal',
            'subTotal',
            'allPendingOrder',
            'todayPendingOrders',
            'countAppOrder',
            'compOrder',
            'userCount',
            'dealerCount',
            'todayVisitor',
            'visitor7days',
            'totalVisitor',
            'todayShippingCharge',
            'todayGrandTotal',
            'todaySubTotal',
            'todayApproveOrders',
            'todayCompleteOrders',
        ));
    }
}
