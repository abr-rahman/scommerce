<?php

namespace App\Http\Controllers;

use App\DataTables\SliderDataTable;
use App\Models\Slider;
use App\Http\Controllers\Controller;
use App\Http\Requests\SliderStoreRequest;
use App\Http\Requests\SliderUpdateRequest;
use App\Services\Interfaces\SliderServiceInterface;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    protected $sliderService;

    public function __construct(SliderServiceInterface $sliderService)
    {
        $this->sliderService = $sliderService;
    }

    public function index(SliderDataTable $dataTable)
    {
        return $dataTable->render('admin.slider.index');
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(SliderStoreRequest $request)
    {
        // dd($request->all());
        $this->sliderService->store($request->validated());
        return back()->with('success', 'Created successfully!');
    }

    public function show(Slider $slider)
    {
        //
    }

    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(SliderUpdateRequest $request, $id)
    {
        $this->sliderService->update($request->validated(), $id);
        return back()->with('success', 'Updated successfully!');
    }

    public function destroy($id)
    {
        $this->sliderService->delete($id);
        return response()->json('Deleted successfully!');
    }

    public function active($id)
    {
        $this->sliderService->statusInactive($id);
        return response()->json(['Status changed successfully!']);
    }

    public function inActive($id)
    {
        $this->sliderService->statusActive($id);
        return response()->json(['Status changed successfully!']);
    }
}
