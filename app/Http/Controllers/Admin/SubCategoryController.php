<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SubCategoryDataTable;
use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use App\Http\Requests\StoreSubCategoryRequest;
use App\Http\Requests\SubCategoryStoreRequest;
use App\Http\Requests\SubCategoryUpdateRequest;
use App\Http\Requests\UpdateSubCategoryRequest;
use App\Services\Interfaces\SubCategoryServiceInterface;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SubCategoryController extends Controller
{
    protected $subCategoryService;

    public function __construct(SubCategoryServiceInterface $subCategoryService)
    {
        $this->subCategoryService = $subCategoryService;
    }

    public function index(Request $request, SubCategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.sub-category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('status', StatusEnum::Active->value)->get();
        return view('admin.sub-category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubCategoryStoreRequest $request)
    {
        $this->subCategoryService->store($request->validated());
        return back()->with('success', 'Created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategory $subCategory)
    {
        $categories = Category::where('status', StatusEnum::Active->value)->get();
        return view('admin.sub-category.edit', compact('categories', 'subCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubCategoryUpdateRequest $request, $id)
    {
        $this->subCategoryService->update($request->validated(), $id);
        return back()->with('success', 'Updated successfully!');
    }

    public function destroy($id)
    {
        $this->subCategoryService->delete($id);
        return response()->json('Deleted successfully!');        
    }

    public function active($id)
    {
        $this->subCategoryService->statusInactive($id);
        return response()->json(['Status changed successfully!']);
    }

    public function inActive($id)
    {
        $this->subCategoryService->statusActive($id);
        return response()->json(['Status changed successfully!']);
    }
}
