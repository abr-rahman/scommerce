<?php

namespace App\Services;

use App\Enums\ProductStatus;
use App\Models\Inventory;
use App\Enums\StatusEnum;
use App\Http\Requests\StoreInventoryRequest;
use App\Models\Barcode;
use App\Models\Product;
use App\Models\Purchase;
use App\Services\Interfaces\InventoryServiceInterface;
use Carbon\Carbon;
use Illuminate\Support\Str;

Class InventoryService implements InventoryServiceInterface
{
    public function all()
    {
        $item = Inventory::orderBy('id', 'desc')->get();
        return $item;
    }

    public function store(array $attributes)
    {
        $item =  Inventory::create($attributes);
        return $item;
    }

    public function inventoryStore(StoreInventoryRequest $request)
    {
        $inventoryExists = Inventory::where(['product_id' => $request->product_id, 'color_id' => $request->color_id, 'size_id' => $request->size_id])->with('product');
        $is_exist = $inventoryExists->exists();
        $product = Product::select('id', 'product_name', 'status')->where('id', $request->product_id)->first();
        $getProductName = $product->product_name;
        $productName = substr($getProductName, 0, 4);
        $lastEntry = Barcode::select('barcode_number')->latest('barcode_number')->first();
        $lastEntryNumber = substr($lastEntry->barcode_number, 6, 8);
        $currentDate = Carbon::now();
        $formattedDate = $currentDate->format('y-m-d'); // Change the format as needed
        $randomInvoice = mt_rand(1000000000, 9999999999);

        if ($lastEntryNumber != null) {
            $counter = $lastEntryNumber;
        } else {
            $counter = '10000000';
        }

        $serializedNumber = serialize($counter);
        $counter++;

        $quantity = $request->input('quantity', $request->quantity);

        for ($i = 0; $i < $quantity; $i++) {
            $serializedNumber = serialize($counter);
            $counter++;
            $randomContent = $productName.$serializedNumber.Str::random(4).$formattedDate;

            $barcode = new Barcode();
            $barcode->barcode_number = $randomContent;
            $barcode->product_id = $request->product_id;
            $barcode->save();
        }

        // $purchase = new Purchase();
        // $purchase->product_id = $request->product_id;
        // $purchase->color_id = $request->color_id;
        // $purchase->size_id = $request->size_id;
        // $purchase->quantity = $request->quantity;
        // $purchase->invoice_number = $productName.$randomInvoice;
        // $purchase->save();

        if ($is_exist) {
            $inventoryExists->increment('quantity', $request->quantity);
        }
        // elseif (Inventory::where(['product_id' => $request->product_id])->exists()) {
        //     Inventory::where(['product_id' => $request->product_id])->increment('quantity', $request->quantity);
        // }
        //  else {
            // if (($request->color_id || $request->size_id) != null)
            {
                $inventory = new Inventory();
                $inventory->product_id = $request->product_id;
                $inventory->color_id = $request->color_id;
                $inventory->size_id = $request->size_id;
                $inventory->quantity = $request->quantity;
                $inventory->save();

            // } else {
            //     return back()->with('error', 'Color and size both empty!');
            // }
        }
        $product->status = ProductStatus::Active->value;
        $product->save();
        return back()->with('success', 'Created successfully!');
    }
    public function inventoryUpdate(StoreInventoryRequest $request)
    {
        $is_exist = Inventory::where(['product_id' => $request->product_id, 'color_id' => $request->color_id, 'size_id' => $request->size_id])->exists();

        if ($is_exist) {
            Inventory::where(['product_id' => $request->product_id, 'color_id' => $request->color_id, 'size_id' => $request->size_id])->increment('quantity', $request->quantity);
        }
        // elseif (Inventory::where(['product_id' => $request->product_id])->exists()) {
        //     Inventory::where(['product_id' => $request->product_id])->increment('quantity', $request->quantity);
        // }
         else {
            // if (($request->color_id || $request->size_id) != null)
            // {
                $inventory = new Inventory();
                $inventory->product_id = $request->product_id;
                $inventory->color_id = $request->color_id;
                $inventory->size_id = $request->size_id;
                $inventory->quantity = $request->quantity;
                $inventory->save();

            // } else {
            //     return back()->with('error', 'Color and size both empty!');
            // }
        }
        return back()->with('success', 'Created successfully!');
    }

    public function find(int $id)
    {
        $item = Inventory::find($id);
        return $item;
    }

    public function update(array $attributes, int $id)
    {
        $item = Inventory::find($id);
        $updatedItem = $item->update($attributes);
        return $updatedItem;
    }

    public function delete(int $id)
    {
        $item = Inventory::find($id);
        $item->delete($item);
        return $item;
    }

    public function statusActive(int $id)
    {
        $item = Inventory::find($id);
        if ($item->status == StatusEnum::Inactive->value) {
            $item->status = StatusEnum::Active->value;
        }
        $item->save();
        return $item;
    }

    public function statusInactive(int $id)
    {
        $item = Inventory::find($id);
        if ($item->status == StatusEnum::Active->value) {
            $item->status = StatusEnum::Inactive->value;
        }
        $item->save();
        return $item;
    }
}
