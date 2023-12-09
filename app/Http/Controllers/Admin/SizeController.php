<?php

namespace App\Http\Controllers\Admin;

use App\Models\Size;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSizeRequest;
use App\Http\Requests\UpdateSizeRequest;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    // protected $serviceName;

    // public function __construct(serviceNameInterface $serviceName)
    // {
    //     $this->serviceName = $serviceName;
    // }

    // public function index(Request $request, TataTableName $dataTable)
    // {
    //     return $dataTable->render('admin.viewFolder.index');
    // }

    // public function create()
    // {
    //     return view('admin.viewFolder.create');
    // }

    public function store(StoreSizeRequest $request)
    {
        $item = new Size();
        $item->size = $request->size;
        $item->save();
        return back()->with('success', 'Created successfully!');
    }

    // public function show(Size $size)
    // {
    //     //
    // }

    // public function edit(Size $size)
    // {
    //     return view('admin.viewFolder.edit', compact(size));
    // }

    // public function update(UpdateSizeRequest $request, $id)
    // {
    //     $this->serviceName->update($request->validated(), $id);
    //     return back()->with('success', 'Updated successfully!');
    // }

    // public function destroy($id)
    // {
    //     $this->serviceName->delete($id);
    //     return response()->json('Deleted successfully!');
    // }

    // public function active($id)
    // {
    //     $this->serviceName->statusInactive($id);
    //     return response()->json(['Status changed successfully!']);
    // }

    // public function inActive($id)
    // {
    //     $this->serviceName->statusActive($id);
    //     return response()->json(['Status changed successfully!']);
    // }


}
