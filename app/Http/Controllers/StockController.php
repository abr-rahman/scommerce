<?php

namespace App\Http\Controllers;

use App\DataTables\StockDataTable;
use App\Http\Controllers\Controller;
use App\Models\Inventory;
use App\Models\OrderList;
use App\Models\Purchase;
use App\Models\StockOut;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Barryvdh\DomPDF\Facade\Pdf;

class StockController extends Controller
{
    public function stockList(Request $request)
    {
        $purchases = Inventory::select('id', 'quantity', 'product_id')->with('product')->get();
        if ($request->ajax()) {
            return DataTables::of($purchases)
            ->addIndexColumn()
            ->addColumn('product_name', function($row) {
                return $row->product->product_name ?? 'not found';
            })
            ->rawColumns(['product'])
            ->make(true);
        }
        $totalQuantity = $purchases->sum('quantity');
        return view('admin.stock.list', compact('purchases', 'totalQuantity'));  
    }

    public function productLedger(Request $request)
    {
        $purchases = Purchase::select('id', 'quantity as purchase_quantity', 'product_id', 'created_at');
        $stockOuts = StockOut::select('id', 'quantity as out_quantity', 'product_id', 'created_at');

        if ($request->ajax()) {
            $data = $stockOuts->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('product_name', function($row) {
                    return $row->product->product_name ?? 'not found';
                })
                // ->addColumn('purchase_quantity', function($row) {
                //     return $row->purchase_quantity ?? 0;
                // })
                ->addColumn('out_quantity', function($row) {
                    return $row->out_quantity ?? 0;
                })
                ->addColumn('created_at', function($row) {
                    return $row->created_at ? $row->created_at->format('Y-m-d') : 'N/A';
                })                
                ->rawColumns(['product'])
                ->make(true);
        }
        $stocks = Inventory::select('id', 'quantity', 'product_id')->with('product')->get();
        $totalQuantity = $stocks->sum('quantity');
        $totalPurchaseQuantity = $purchases->sum('quantity');
        return view('admin.stock.product-ledger', compact('stocks', 'totalQuantity', 'totalPurchaseQuantity'));  
    }
}
