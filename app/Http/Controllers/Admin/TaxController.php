<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TaxDataTable;
use App\Http\Controllers\Controller;
use App\Models\Tax;
use App\Http\Requests\TaxStoreRequest;
use App\Http\Requests\TaxUpdateRequest;
use App\Services\Interfaces\TaxServiceInterface;

class TaxController extends Controller
{
    protected $taxService;

    public function __construct(TaxServiceInterface $taxService)
    {
        $this->taxService = $taxService;
    }

    public function index(TaxDataTable $dataTable)
    {
        return $dataTable->render('admin.tax.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tax.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaxStoreRequest $request)
    {
        $this->taxService->store($request->validated());
        return back()->with('success', 'Created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tax $tax)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tax $tax)
    {
        return view('admin.tax.edit', compact('tax'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaxUpdateRequest $request, $id)
    {
        $this->taxService->update($request->validated(), $id);
        return back()->with('success', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->taxService->delete($id);
        return response()->json('Deleted successfully!');
    }

    public function active($id)
    {
        $this->taxService->statusInactive($id);
        return response()->json(['Status changed successfully!']);
    }

    public function inActive($id)
    {
        $this->taxService->statusActive($id);
        return response()->json(['Status changed successfully!']);
    }
}
