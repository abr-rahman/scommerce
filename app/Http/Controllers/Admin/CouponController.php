<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CouponDataTable;
use App\Models\Coupon;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCouponRequest;
use App\Http\Requests\UpdateCouponRequest;
use App\Services\Interfaces\CouponServiceInterface;

class CouponController extends Controller
{
    protected $couponService;

    public function __construct(CouponServiceInterface $couponService)
    {
        $this->couponService = $couponService;
    }

    public function index(CouponDataTable $dataTable)
    {
        return $dataTable->render('admin.coupon.index');
    }

    public function create()
    {
        return view('admin.coupon.create');
    }

    public function store(StoreCouponRequest $request)
    {
        $this->couponService->store($request->validated());
        return back()->with('success', 'Created successfully!');
    }

    public function edit(Coupon $coupon)
    {
        return view('admin.coupon.edit', compact('coupon'));
    }

    public function update(UpdateCouponRequest $request, $id)
    {
        $this->couponService->update($request->validated(), $id);
        return back()->with('success', 'Updated successfully!');
    }

    public function destroy($id)
    {
        $this->couponService->delete($id);
        return response()->json('Deleted successfully!');
    }

    public function active($id)
    {
        $this->couponService->statusInactive($id);
        return response()->json(['Status changed successfully!']);
    }

    public function inActive($id)
    {
        $this->couponService->statusActive($id);
        return response()->json(['Status changed successfully!']);
    }

    public function show(Coupon $coupon)
    {
        //
    }

}
