<?php

namespace App\Http\Controllers\Admin;

use App\Models\Color;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreColorRequest;
use App\Http\Requests\UpdateColorRequest;
use Illuminate\Http\Request;

class ColorController extends Controller
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

    public function store(StoreColorRequest $request)
    {
        $item = new Color();
        $item->color_name = $request->color_name ?? null;
        $item->color_code = $request->color_code ?? null;
        $item->save();
        return back()->with('success', 'Created successfully!');
    }

    // public function show(Color $color)
    // {
    //     //
    // }

    // public function edit(Color $color)
    // {
    //     return view('admin.viewFolder.edit', compact(color));
    // }

    // public function update(UpdateColorRequest $request, $id)
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
