<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CareerApplyDataTable;
use App\DataTables\CareerDataTable;
use App\Models\Career;
use App\Http\Controllers\Controller;
use App\Http\Requests\CareerStoreRequest;
use App\Http\Requests\CareerUpdateRequest;
use App\Models\CareerApply;
use App\Services\Interfaces\CareerServiceInterface;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    protected $careerService;

    public function __construct(CareerServiceInterface $careerService)
    {
        $this->careerService = $careerService;
    }

    public function index(CareerDataTable $dataTable)
    {
        return $dataTable->render('admin.career.index');
    }

    public function applyList(CareerApplyDataTable $dataTable)
    {
        return $dataTable->render('admin.career.apply-list');
    }

    public function create()
    {
        return view('admin.career.create');
    }

    public function store(CareerStoreRequest $request)
    {
        $this->careerService->store($request->validated());
        return redirect()->route('careers.index')->with('success', 'Created successfully!');
    }

    public function edit(career $career)
    {
        $career->image = (str_starts_with($career->image, 'http')) ? $career->image : asset('uploads/career/' . $career->image);
        return view('admin.career.edit', compact('career'));
    }

    public function update(CareerUpdateRequest $request, $id)
    {
        $this->careerService->update($request->validated(), $id);
        return redirect()->route('careers.index')->with('success', 'Updated successfully!');
    }

    public function destroy($id)
    {
        $this->careerService->delete($id);
        return response()->json('Deleted successfully!');
    }

    public function active($id)
    {
        $this->careerService->statusInactive($id);
        return response()->json(['Status changed successfully!']);
    }

    public function inActive($id)
    {
        $this->careerService->statusActive($id);
        return response()->json(['Status changed successfully!']);
    }

    public function show(career $career)
    {
        //
    }
    public function applyShow($id)
    {
        $carApply = CareerApply::find($id);
        return view('admin.career.apply-show', compact('carApply'));
    }

    public function applyDestroy($id)
    {
        $carApply = CareerApply::find($id);
        $carApply->forceDelete();
        return response()->json(['Deleted successfully!']);
    }

    public function downloadCv($id)
    {
        $carApply = CareerApply::find($id);
        $fileName = public_path('uploads/career/'.$carApply->cv);

        return response()->download($fileName);
    }
}
