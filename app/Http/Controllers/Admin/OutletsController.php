<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\OutletsDataTable;
use App\Models\Outlets;
use App\Http\Controllers\Controller;
use App\Http\Requests\OutletsStoreRequest;
use App\Http\Requests\OutletsUpdateRequest;
use App\Models\District;
use App\Models\Upazila;
use App\Services\Interfaces\OutletsServiceInterface;
use Illuminate\Http\Request;

class OutletsController extends Controller
{
    protected $serviceName;

    public function __construct(OutletsServiceInterface $serviceName)
    {
        $this->serviceName = $serviceName;
    }

    public function index(OutletsDataTable $dataTable)
    {
        return $dataTable->render('admin.outlets.index');
    }

    public function create()
    {
        $districts = District::all();
        $upazilas = Upazila::all();
        return view('admin.outlets.create', compact('districts', 'upazilas'));
    }

    public function store(OutletsStoreRequest $request)
    {
        $this->serviceName->store($request->validated());
        return redirect()->route('outlets.index')->with('success', 'Created successfully!');
    }

    public function edit(Outlets $outlet)
    {
        $districts = District::all();
        $upazilas = Upazila::all();
        return view('admin.outlets.edit', compact('outlet', 'districts', 'upazilas'));
    }

    public function update(OutletsUpdateRequest $request, $id)
    {
        $this->serviceName->update($request->validated(), $id);
        return redirect()->route('outlets.index')->with('success', 'Updated successfully!');
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

    public function show($id)
    {
        //
    }

}
