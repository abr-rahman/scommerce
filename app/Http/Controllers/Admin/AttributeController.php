<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AttributeDataTable;
use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Http\Requests\StoreAttributeRequest;
use App\Http\Requests\UpdateAttributeRequest;
use App\Services\Interfaces\AttributeServiceInterface;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    protected $serviceName;

    public function __construct(AttributeServiceInterface $serviceName)
    {
        $this->serviceName = $serviceName;
    }

    public function index(Request $request, AttributeDataTable $dataTable)
    {
        return $dataTable->render('admin.attribute.index');
    }

    public function create()
    {
        return view('admin.viewFolder.create');
    }

    public function store(StoreAttributeRequest $request)
    {
        $this->serviceName->store($request->validated());
        return back()->with('success', 'Created successfully!');
    }

    public function show(Attribute $attribute)
    {
        //
    }

    public function edit(Attribute $attribute)
    {
        return view('admin.viewFolder.edit', compact('attribute'));
    }

    public function update(UpdateAttributeRequest $request, $id)
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
