<?php

namespace App\Http\Controllers\Admin;

use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Models\OfflineOrder;
use App\Models\OfflineOrderList;
use App\Models\Order;
use App\Models\OrderList;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Sum;

class ReportController extends Controller
{
    public function sales(Request $request)
    {
        if ($request->ajax()) {
            $order = Order::where('status', StatusEnum::Complete->value)->get();
            return DataTables::of($order)
                ->addIndexColumn()
                ->addColumn('customer_name', function($row) {
                    return $row->customer_name ?? 'not found';
                })
                ->addColumn('action', function ($row) {
                    $html = '<div class="dropdown">';
                    $html .= '<button class="btn btn-secondary dropdown-toggle bg-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>';
                    $html .= '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
                    $html .= '<a class="dropdown-item border show-btn"  href="' . route('report.show', $row->id) . '">View Report</a>';
                    
                    $html .= '</div>';
                    $html .= '</div>';
    
                    return $html;
                })
                ->rawColumns(['action', 'product', 'userAmount', 'dealerAmount'])
                ->make(true);
        }

        $orders = Order::where('status', StatusEnum::Complete->value)->get();
        $totalShippingCharge = $orders->sum('shipping_charge');
        $totalDiscount = $orders->sum('discount_amount');
        // dd($totalShippingCharge);
        return view('admin.report.sales.index', compact('totalShippingCharge', 'totalDiscount'));
    }

    public function offlineReport(Request $request)
    {
        $orders = OfflineOrder::select('id', 'due_amount', 'sub_total', 'grand_total', 'invoice_number', 'payable_amount', 'shipping_charge', 'created_at')->get();
        if ($request->ajax()) {
            return DataTables::of($orders)
                ->addIndexColumn()
                ->addColumn('customer_name', function($row) {
                    return $row->customer_name ?? 'not found';
                })
                ->addColumn('action', function ($row) {
                    $html = '<div class="dropdown">';
                    $html .= '<button class="btn btn-secondary dropdown-toggle bg-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>';
                    $html .= '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
                    $html .= '<a class="dropdown-item border show-btn"  href="' . route('offline.report.show', $row->id) . '">View Report</a>';
                    $html .= '</div>';
                    $html .= '</div>';
                    return $html;
                })
                ->rawColumns(['action', 'product', 'userAmount', 'dealerAmount'])
                ->make(true);
        }
        return view('admin.report.sales.offline-index');
    }

    public function show($id)
    {
        $order = Order::find($id);
        $orderList = OrderList::where('status', StatusEnum::Active->value)->where('order_id', $order->id)->get();
        return view('admin.report.sales.show', compact('orderList'));
    }

    public function offlineShow($id)
    {
        $order = OfflineOrder::find($id);
        $orderList = OfflineOrderList::where('status', StatusEnum::Active->value)->where('offline_order_id', $order->id)->get();
        return view('admin.report.sales.offline-show', compact('orderList'));
    }

    public function filter(Request $request)
    {
        $filter = $request->input('filter');
        // $filteredData = Order::where('role', $filter);

        // if ($filter == '7') {
        //     $startDate = Carbon::now()->subDays(7)->startOfDay();
        //     $endDate = Carbon::now()->endOfDay();

        //     $filteredData->whereBetween('created_at', [$startDate, $endDate]);
        // }

        // Retrieve orders from the last 7 days
        $startDate = Carbon::now()->subDays(7)->startOfDay();
        $startFifteen = Carbon::now()->subDays(15)->startOfDay();
        $startMonth = Carbon::now()->subDays(30)->startOfDay();
        $endDate = Carbon::now()->endOfDay();

        if ($filter == '7') {
            $filteredData = Order::whereBetween('created_at', [$startDate, $endDate])->get();
        } elseif ($filter == '15') {
            $filteredData = Order::whereBetween('created_at', [$startFifteen, $endDate])->get();
        } elseif ($filter == '30') {
            $filteredData = Order::whereBetween('created_at', [$startMonth, $endDate])->get();
        }
        else {
            $filteredData = Order::where('role', $filter)->get();
        }
        return response()->json($filteredData);
    }

}
