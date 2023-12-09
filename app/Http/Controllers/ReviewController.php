<?php

namespace App\Http\Controllers;

use App\DataTables\ReviewDataTable;
use App\Models\Review;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use App\Services\Interfaces\ReviewServiceInterface;
use App\Models\Product;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    protected $reviewService;

    public function __construct(ReviewServiceInterface $reviewService)
    {
        $this->reviewService = $reviewService;
    }

    public function index(ReviewDataTable $dataTable)
    {
        return $dataTable->render('admin.product.review.index');
    }

    // public function create()
    // {
    //     return view('admin.product.review.create');
    // }

    public function createReview($id)
    {
        $product = Product::find($id);
        return view('admin.product.review.create', compact('product'));
    }

    public function store(StoreReviewRequest $request)
    {
        $this->reviewService->store($request->validated());
        return back()->with('success', 'Created successfully!');
    }

    public function show(Review $review)
    {
        //
    }

    public function edit(Review $review)
    {
        return view('admin.product.review.edit', compact('review'));
    }

    public function update(UpdateReviewRequest $request, $id)
    {
        $this->reviewService->update($request->validated(), $id);
        return back()->with('success', 'Updated successfully!');
    }

    public function destroy($id)
    {
        $this->reviewService->delete($id);
        return response()->json('Deleted successfully!');
    }

    public function active($id)
    {
        $this->reviewService->statusInactive($id);
        return response()->json(['Status changed successfully!']);
    }

    public function inActive($id)
    {
        $this->reviewService->statusActive($id);
        return response()->json(['Status changed successfully!']);
    }

}
