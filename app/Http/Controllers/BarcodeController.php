<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Barcode;
use App\Models\Product;
use App\Models\Purchase;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class BarcodeController extends Controller
{
    public function index()
    {
        $barcodes = Barcode::select('barcode_number')->get();
        return view('admin.barcode.index', compact('barcodes'));
    }


    public function qrCode($id)
    {
        $product = Product::select('id', 'product_name')->find($id);
        $fullUrl = url()->current();
        $parsedUrl = parse_url($fullUrl);
        $baseUrl = $parsedUrl['scheme'] . '://' . $parsedUrl['host'].'/product/verify/?';

        $qrcodes = Barcode::select('id','barcode_number', 'serial_number', 'product_id')->where('product_id', $product->id)->get();
        return view('admin.barcode.create', compact('qrcodes', 'product', 'baseUrl'));
    }

    public function qrCodeStore(Request $request)
    {
        $getProductName = $request->product_name;
        $productName = substr($getProductName, 0, 4);
        $lastEntryNumber = Barcode::select('serial_number')->orderBy('serial_number', 'desc')->first();
        $currentDate = Carbon::now();
        $formattedDate = $currentDate->format('y-m-d');
        $randomInvoice = mt_rand(1000000000, 9999999999);

        // $lastEntryNumber = 10000000;
        $counter = $lastEntryNumber->serial_number;
        $counter++;

        $quantity = $request->input('quantity', $request->quantity);

        for ($i = 0; $i < $quantity; $i++) {
            $serializedNumber = $counter;
            $counter++;
            $randomContent = $productName.'a'.Str::random(4).'b'.Str::random(4).'r'.$formattedDate;
            $barcode = new Barcode();
            $barcode->barcode_number = $randomContent;
            $barcode->product_id = $request->product_id;
            $barcode->serial_number = $serializedNumber;
            $barcode->save();
        }
        // return redirect()->route('product.qr_code.print');
        return redirect()->route('product.qr_code.print', 
            ['id' => $barcode->product_id, 'quantity' => $request->quantity]);
    }

    public function qrCodePrint($id, $quantity)
    {
        $fullUrl = url()->current();
        $parsedUrl = parse_url($fullUrl);
        $baseUrl = $parsedUrl['scheme'] . '://' . $parsedUrl['host'].'/product/verify/?';

        $qrcodes = Barcode::select('barcode_number', 'serial_number')
        ->where('product_id', $id)
        ->orderBy('created_at', 'desc')
        ->take($quantity)
        ->get();
        return view('admin.barcode.print', compact('qrcodes', 'baseUrl'));
    }

    public function downloadQr($id)
    {
        $purchase = Purchase::find($id);
        $fullUrl = url()->current();
        $parsedUrl = parse_url($fullUrl);
        $baseUrl = $parsedUrl['scheme'] . '://' . $parsedUrl['host'].'/product/verify/?';

        if ($purchase) {   
            $formattedCreatedAt = $purchase->created_at->format('Y-m-d H:i:s');     
            $qrcodes = Barcode::select('barcode_number', 'serial_number', 'created_at')
                ->where('product_id', $purchase->product_id)
                ->whereBetween('created_at', [
                    Carbon::createFromFormat('Y-m-d H:i:s', $formattedCreatedAt)->subMinute(),
                    Carbon::createFromFormat('Y-m-d H:i:s', $formattedCreatedAt)->addMinute(),
                ])
                ->get();
                return view('admin.barcode.print', compact('qrcodes', 'baseUrl'));
        } else {
            return back()->with('Contact a support team');
        }

    }
}
