<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SupplierDataTable;
use App\Http\Controllers\Controller;
use App\Models\Supplier;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use App\Services\Interfaces\SupplierServiceInterface;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    protected $serviceName;

    public function __construct(SupplierServiceInterface $serviceName)
    {
        $this->serviceName = $serviceName;
    }

    public function index(SupplierDataTable $dataTable)
    {
        return $dataTable->render('admin.supplier.index');
    }

    public function create()
    {
        return view('admin.supplier.create');
    }

    public function store(StoreSupplierRequest $request)
    {
        $this->serviceName->store($request->validated());
        return back()->with('success', 'Created successfully!');
    }

    public function show(Supplier $supplier)
    {
        //
    }

    public function edit(Supplier $supplier)
    {
        return view('admin.supplier.edit', compact('supplier'));
    }

    public function update(UpdateSupplierRequest $request, $id)
    {
        $this->serviceName->update($request->validated(), $id);
        return back()->with('success', 'Updated successfully!');
    }

    public function destroy($id)
    {
        $this->serviceName->delete($id);
        return response()->json('Deleted successfully!');
    }

    public function active($id)
    {
        $this->serviceName->statusInactive($id);
        return response()->json(['Status changed successfully!']);
    }

    public function inActive($id)
    {
        $this->serviceName->statusActive($id);
        return response()->json(['Status changed successfully!']);
    }


}
