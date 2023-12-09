<?php

namespace App\Http\Controllers;

use App\DataTables\OffilineCustomerTable;
use App\Models\OfflineCustomer;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOfflineCustomerRequest;
use App\Http\Requests\UpdateOfflineCustomerRequest;
use App\Models\Cart;
use App\Models\Product;
use App\Services\Interfaces\OfflineServiceInterface;
use Illuminate\Http\Request;

class OfflineCustomerController extends Controller
{
    protected $offlineService;

    public function __construct(OfflineServiceInterface $offlineService)
    {
        $this->offlineService = $offlineService;
    }

    public function index(OffilineCustomerTable $dataTable)
    {
        return $dataTable->render('admin.offline.index');
    }

    public function create()
    {
        return view('admin.offline.create');
    }

    public function store(StoreOfflineCustomerRequest $request)
    {
        $this->offlineService->store($request->validated());
        return back()->with('success', 'Created successfully!');
    }

    public function edit(OfflineCustomer $offlineCustomer)
    {
        return view('admin.offline.edit', compact('offlineCustomer'));
    }

    public function update(UpdateOfflineCustomerRequest $request, $id)
    {
        $this->offlineService->update($request->validated(), $id);
        return back()->with('success', 'Updated successfully!');
    }

    public function destroy($id)
    {
        $this->offlineService->delete($id);
        return response()->json('Deleted successfully!');
    }

    public function active($id)
    {
        $this->offlineService->statusInactive($id);
        return response()->json(['Status changed successfully!']);
    }

    public function inActive($id)
    {
        $this->offlineService->statusActive($id);
        return response()->json(['Status changed successfully!']);
    }

    public function customerShow($id)
    {
        $offlineCustomer = OfflineCustomer::find($id);
        return view('admin.offline.show', compact('offlineCustomer'));
    }

}
