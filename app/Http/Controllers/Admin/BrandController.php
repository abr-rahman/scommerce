<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\DataTables\BrandDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\BrandStoreRequest;
use App\Http\Requests\BrandUpdateRequest;
use App\Models\Product;
use App\Services\Interfaces\BrandServiceInterface;

class BrandController extends Controller
{
    protected $brandService;

    public function __construct(BrandServiceInterface $brandService)
    {
        $this->brandService = $brandService;
    }

    public function index(Request $request, BrandDataTable $dataTable)
    {
        return $dataTable->render('admin.brand.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandStoreRequest $request)
    {
        $this->brandService->store($request->validated());
        return back()->with('success', 'Created successfully!');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('admin.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandUpdateRequest $request, $id)
    {
        $this->brandService->update($request->validated(), $id);
        return back()->with('success', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::select('id', 'brand_id')->where('brand_id', $id)->exists();
        if ($product == true) {
            return response()->json('First delete the Product and then delete the category!');
        } else {
            $this->brandService->delete($id);
        }
        return response()->json('Deleted successfully!');
    }

    public function active($id)
    {
        $this->brandService->statusInactive($id);
        return response()->json(['Status changed successfully!']);
    }

    public function inActive($id)
    {
        $this->brandService->statusActive($id);
        return response()->json(['Status changed successfully!']);
    }
}
