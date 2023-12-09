<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CategoryDataTable;
use App\DataTables\CategoryRecycleDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Services\Interfaces\CategoryServiceInterface;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryServiceInterface $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index(Request $request, CategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.category.index');
    }

    // public function recycleBin(Request $request, CategoryRecycleDataTable $dataTable)
    // {
    //     return $dataTable->render('admin.category.recycle');
    // }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryStoreRequest $request)
    {    
        $this->categoryService->store($request->validated());
        return back()->with('success', 'Created successfully!');
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryUpdateRequest $request, $id)
    {
        $this->categoryService->update($request->validated(), $id);
        return back()->with('success', 'Updated successfully!');
    }

    public function destroy($id)
    {
        $product = Product::select('id', 'category_id')->where('category_id', $id)->exists();
        if ($product == true) {
            return response()->json('First delete the Product and then delete the category!');
        } else {
            $this->categoryService->delete($id);
            return response()->json('Deleted successfully!');
        }
    }

    public function active($id)
    {
        $this->categoryService->statusInactive($id);
        return response()->json(['Status changed successfully!']);
    }

    public function inActive($id)
    {
        $this->categoryService->statusActive($id);
        return response()->json(['Status changed successfully!']);
    }
}
