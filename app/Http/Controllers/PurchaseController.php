<?php

namespace App\Http\Controllers;

use App\DataTables\PurchaseDataTable;
use App\DataTables\PurchaseProductDataTable;
use App\Enums\ProductStatus;
use App\Http\Controllers\Controller;
use App\Models\Barcode;
use App\Models\Color;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Size;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class PurchaseController extends Controller
{
    public function index(Request $request)
    {
        $purchase = Purchase::select('id', 'quantity', 'product_id', 'invoice_number', 'created_at')->with('product');
        // $qrcodes = Barcode::select('id','barcode_number', 'serial_number', 'product_id', 'created_at');
        if ($request->ajax()) {
            $data = $purchase->get();
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('product_name', function($row) {
                return $row->product->product_name ?? 'not found';
            })
            ->addColumn('qr_code', function($row) {
                $html = '<div class="dropdown">';
                // $html .= '<button class="btn btn-secondary dropdown-toggle bg-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>';
                // $html .= '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
                $html .= '<a class="btn bg-secondary" href="' . route('purchase.qr_code_print', $row->id) . '">Download</a>';
                // $html .= '</div>';
                // $html .= '</div>';
                return $html;
            })
            ->rawColumns(['product', 'qr_code'])
            ->make(true);
        }
        $purchases = $purchase->get();
        return view('admin.purchase.index', compact('purchases'));  
    }

    public function productList(PurchaseProductDataTable $dataTable)
    {
        return $dataTable->render('admin.purchase.product');
    }

    public function purchaseEntry($id)
    {
        $product = Product::select('id', 'product_name')->find($id);
        $colors = Color::select('id')->get();
        $sizes = Size::select('id')->get();
        return view('admin.purchase.create', compact('product','colors','sizes'));
    }

    public function purchaseStore(Request $request)
    {
        $request->validate([
            'quantity' => 'required|integer|max:15000',
        ]);
        $inventoryExists = Inventory::where(['product_id' => $request->product_id, 'color_id' => $request->color_id, 'size_id' => $request->size_id])->with('product');
        $is_exist = $inventoryExists->exists();
        $product = Product::select('id', 'product_name', 'status')->where('id', $request->product_id)->first();
        $getProductName = $product->product_name;
        $productName = substr($getProductName, 0, 4);
        $currentDate = Carbon::now();
        $formattedDate = $currentDate->format('y-m-d');
        $randomInvoice = mt_rand(1000000000, 9999999999);
        
        $getQrCode = Barcode::select('serial_number', 'created_at', 'product_id')
                            ->orderBy('serial_number', 'desc');
        $lastEntryNumber = $getQrCode->first();
        $getProductId = $getQrCode->where('product_id', '!=', $request->product_id)->first();

        // Check if there is a last entry
        if ($lastEntryNumber) {
            // Start a database transaction
            DB::beginTransaction();
            try {
                // Lock the table
                DB::table('barcodes')->lockForUpdate()->get();
                // Check if it's been less than 1 minute since the last entry
                if ($lastEntryNumber->created_at->addMinutes(1)->lt($currentDate)) {
                    $counter = $lastEntryNumber->serial_number;
                    $counter++;
                    $quantity = $request->input('quantity', $request->quantity);
                    for ($i = 0; $i < $quantity; $i++) {
                        $serializedNumber = $counter;
                        $counter++;
                        $randomContent =  str_replace([' ', '/', ',', '.', ':', '-'], '', $productName.'a'.Str::random(4).'b'.Str::random(4).'r'.$formattedDate.$serializedNumber);
                        $barcode = new Barcode();
                        $barcode->barcode_number = $randomContent;
                        $barcode->product_id = $request->product_id;
                        $barcode->serial_number = $serializedNumber;
                        $barcode->save();
                    }
                    $purchase = new Purchase();
                    $purchase->product_id = $request->product_id;
                    $purchase->color_id = $request->color_id ?? null;
                    $purchase->size_id = $request->size_id ?? null;
                    $purchase->quantity = $request->quantity;
                    $purchase->invoice_number = $productName.$randomInvoice;
                    $purchase->save();

                    if ($is_exist) {
                        $inventoryExists->increment('quantity', $request->quantity);
                    } else {
                        $inventory = new Inventory();
                        $inventory->product_id = $request->product_id;
                        $inventory->color_id = $request->color_id;
                        $inventory->size_id = $request->size_id;
                        $inventory->quantity = $request->quantity;
                        $inventory->save();
                    }
                    $product->status = ProductStatus::Active->value;
                    $product->save();
                    DB::commit();
                    return back()->with('success', 'Created successfully!');
                } else {
                    // It's less than 1 minute since the last entry
                    return back()->with('error', 'Cannot insert within 1 minute from the last entrys!');
                }
            } catch (\Exception $e) {
                return back()->with('error', 'Contact a developer team!');
            }
        } else {
            $barcode = new Barcode();
            $barcode->barcode_number = $productName.'a'.Str::random(4).'b'.Str::random(4).'r'.$formattedDate;
            $barcode->product_id = $request->product_id;
            $barcode->serial_number = 10000000;
            $barcode->save();
            return back()->with('error', 'Please try again after 1 min!');
        }
        // $lastEntryNumber = 10000000;

        // $counter = $lastEntryNumber->serial_number;
        // $counter++;

        // $quantity = $request->input('quantity', $request->quantity);

        // for ($i = 0; $i < $quantity; $i++) {
        //     $serializedNumber = $counter;
        //     $counter++;
        //     $randomContent = $productName.'a'.Str::random(4).'b'.Str::random(4).'r'.$formattedDate;
        //     $barcode = new Barcode();
        //     $barcode->barcode_number = $randomContent;
        //     $barcode->product_id = $request->product_id;
        //     $barcode->serial_number = $serializedNumber;
        //     $barcode->save();
        // }
        // $purchase = new Purchase();
        // $purchase->product_id = $request->product_id;
        // $purchase->color_id = $request->color_id ?? null;
        // $purchase->size_id = $request->size_id ?? null;
        // $purchase->quantity = $request->quantity;
        // $purchase->invoice_number = $productName.$randomInvoice;
        // $purchase->save();

        // if ($is_exist) {
        //     $inventoryExists->increment('quantity', $request->quantity);
        // } else {
        //     $inventory = new Inventory();
        //     $inventory->product_id = $request->product_id;
        //     $inventory->color_id = $request->color_id;
        //     $inventory->size_id = $request->size_id;
        //     $inventory->quantity = $request->quantity;
        //     $inventory->save();
        // }
        // $product->status = ProductStatus::Active->value;
        // $product->save();
        // return back()->with('success', 'Created successfully!');
    }
}
