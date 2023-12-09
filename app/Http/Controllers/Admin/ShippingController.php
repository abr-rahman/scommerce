<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ShippingDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\ShippingStoreRequest;
use App\Http\Requests\ShippingUpdateRequest;
use App\Models\District;
use App\Models\Division;
use App\Models\Shipping;
use App\Models\Upazila;
use App\Services\Interfaces\ShippingServiceInterface;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    protected $shippingService;

    public function __construct(ShippingServiceInterface $shippingService)
    {
        $this->shippingService = $shippingService;
    }

    public function index(Request $request, ShippingDataTable $dataTable)
    {
        return $dataTable->render('admin.shipping.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $divisions = Division::all();
        return view('admin.shipping.create', compact('divisions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ShippingStoreRequest $request)
    {
        $this->shippingService->store($request->validated());
        return back()->with('success', 'Created successfully!');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(shipping $shipping)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(shipping $shipping)
    {
        $divisions = Division::all();
        return view('admin.shipping.edit', compact('shipping', 'divisions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ShippingUpdateRequest $request, $id)
    {
        $this->shippingService->update($request->validated(), $id);
        return back()->with('success', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->shippingService->delete($id);
        return response()->json('Deleted successfully!');
    }

    public function active($id)
    {
        $this->shippingService->statusInactive($id);
        return response()->json(['Status changed successfully!']);
    }

    public function inActive($id)
    {
        $this->shippingService->statusActive($id);
        return response()->json(['Status changed successfully!']);
    }
}
