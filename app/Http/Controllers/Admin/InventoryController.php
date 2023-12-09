<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
use App\Http\Requests\StoreInventoryRequest;
use App\Http\Requests\UpdateInventoryRequest;
use App\Services\Interfaces\InventoryServiceInterface;
use App\Models\Color;
use App\Models\ColorSize;
use App\Models\Product;
use App\Models\Size;
use App\Services\InventoryService;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    // protected $inventoryService;

    // public function __construct(InventoryServiceInterface $inventoryService)
    // {
    //     $this->inventoryService = $inventoryService;
    // }

    public function index()
    {
        return 'dfasdfa';
    }

    public function create($id)
    {
        $product = Product::select('id','product_name')->with('dealerPrice')->with('userPrice')->find($id);
        $colors = Color::all();
        $sizes = Size::all();
        $inventory = Inventory::where('product_id', $product->id)->get();
        return view('admin.product.inventory.index', compact('product', 'colors', 'inventory', 'sizes'));
    }

    public function inventoryStore(StoreInventoryRequest $request)
    {
        $inventoryService = new InventoryService();
        $inventoryService->inventoryStore($request);
        // return back();
        return back()->with('success', 'Created successfully!');
    }

    public function show(Inventory $inventory)
    {
        //
    }

    public function edit($id)
    {
        $colors = Color::all();
        $sizes = Size::all();
        $inventory = Inventory::find($id);
        return view('admin.product.inventory.ajax_view.edit', compact('inventory', 'colors','sizes'));
    }

    public function update(UpdateInventoryRequest $request, $id)
    {
        $inventory = Inventory::find($id);
        $inventory->product_id = $request->product_id;
        $inventory->color_id = $request->color_id;
        $inventory->size_id = $request->size_id;
        $inventory->quantity = $request->quantity;
        $inventory->save();
        return response()->json(['Updated successfully!']);
    }

    public function destroy($id)
    {
        $inventory = Inventory::find($id);
        $inventory->delete();
        return back()->with('success', 'Created successfully!');
    }
}
