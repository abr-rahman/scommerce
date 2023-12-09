<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CustomeShippingDataTable;
use App\Models\CustomShipping;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomeShippingStoreRequest;
use App\Http\Requests\CustomeShippingUpdateRequest;
use App\Http\Requests\ShippingStoreRequest;
use App\Services\CustomShippingService;
use App\Services\Interfaces\CustomShippingServiceInterface;
use Illuminate\Http\Request;

class CustomShippingController extends Controller
{
    protected $customShippingService;

    public function __construct(CustomShippingServiceInterface $customShippingService)
    {
        $this->customShippingService = $customShippingService;
    }

    public function index(CustomeShippingDataTable $dataTable)
    {
        return $dataTable->render('admin.shipping.custom.index');
    }

    public function create()
    {
        return view('admin.shipping.custom.create');
    }

    public function store(CustomeShippingStoreRequest $request)
    {
        $this->customShippingService->store($request->validated());
        return back()->with('success', 'Created successfully!');
    }

    public function show(CustomShipping $customShipping)
    {
        //
    }

    public function edit(CustomShipping $customShipping)
    {
        return view('admin.shipping.custom.edit', compact('customShipping'));
    }

    public function update(CustomeShippingUpdateRequest $request, $id)
    {
        $this->customShippingService->update($request->validated(), $id);
        return back()->with('success', 'Updated successfully!');
    }

    public function destroy($id)
    {
        $this->customShippingService->delete($id);
        return response()->json('Deleted successfully!');
    }

    public function active($id)
    {
        $this->customShippingService->statusInactive($id);
        return response()->json(['Status changed successfully!']);
    }

    public function inActive($id)
    {
        $this->customShippingService->statusActive($id);
        return response()->json(['Status changed successfully!']);
    }
}
