<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\VariantDataTable;
use App\Http\Controllers\Controller;
use App\Models\Variant;
use App\Http\Requests\StoreVariantRequest;
use App\Http\Requests\UpdateVariantRequest;
use App\Services\Interfaces\VariantServiceInterface;
use App\Models\BulkVariant;
use App\Models\BulkVariantChild;
use Illuminate\Http\Request;

class VariantController extends Controller
{
    protected $variantService;

    public function __construct(VariantServiceInterface $variantService)
    {
        $this->variantService = $variantService;
    }

    public function index(VariantDataTable $dataTable)
    {
        $variants = BulkVariant::with(['bulk_variant_child'])->get();
        return view('addition.variant.index', compact('variants'));

        // return $dataTable->render('addition.variant.index');
    }

    public function create()
    {
        return view('addition.variant.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'variant_name' => 'required',
        ]);

        $addVariant = new BulkVariant();
        $addVariant->bulk_variant_name = $request->variant_name;
        $addVariant->save();

        foreach ($request->variant_child as $variant_child) {
            $addVariantChild = new BulkVariantChild();
            $addVariantChild->bulk_variant_id = $addVariant->id;
            $addVariantChild->child_name = $variant_child;
            $addVariantChild->save();
        }

        // $this->variantService->store($request->validated());
        return back()->with('success', 'Created successfully!');
    }

    public function show(Variant $variant)
    {
        //
    }

    public function edit($id)
    {
        $bulk  = BulkVariant::find($id);
        $variants = BulkVariantChild::where('bulk_variant_id', $bulk->id)->get();
        $variant_name = $bulk->bulk_variant_name;

        return view('addition.variant.edit', compact('variants', 'bulk'));
    }

    public function update(Request $request, $id)
    {
        // return $request->all();
        $addVariant  = BulkVariant::find($id);

        // $addVariant = new BulkVariant();
        
        $updateVariant =  BulkVariant::with(['bulk_variant_child'])->where('id', $addVariant->id)->first();
        $updateVariant->bulk_variant_name = $request->variant_name;
        $updateVariant->save();

        $variant_child_ids = $request->variant_child_ids;
        $variant_child = $request->variant_child;

        foreach ($updateVariant->bulk_variant_child as $variantChild) {
            
            $variantChild->delete_in_update = 1;
            $variantChild->save();
        }

        $index = 0;
        foreach ($variant_child_ids as $variant_child_id) {

            $variant_child_id = $variant_child_id == 'noid' ? NULL : $variant_child_id; 
            $updateBulkVariantChild = BulkVariantChild::where('id', $variant_child_id)->where('bulk_variant_id', $updateVariant->id)->first();
            if ($updateBulkVariantChild) {

                $updateBulkVariantChild->child_name = $variant_child[$index];
                $updateBulkVariantChild->delete_in_update = 0;
                $updateBulkVariantChild->save();
            }else {

                $addVariantChild = new BulkVariantChild();
                $addVariantChild->bulk_variant_id = $updateVariant->id;
                $addVariantChild->child_name = $variant_child[$index];
                $addVariantChild->save();
            }
            $index++;
        }

        $deleteBulkVariantChild = BulkVariantChild::where('bulk_variant_id', $updateVariant->id)->get();
        if ($deleteBulkVariantChild->count() > 0) {

            foreach ($deleteBulkVariantChild as $deleteBulkVariantChild) {

                $deleteBulkVariantChild->delete();
            }
        }

        $addVariant->bulk_variant_name = $request->variant_name;
        $addVariant->save();

        foreach ($request->variant_child as $variant_child) {
            $addVariantChild = new BulkVariantChild();
            $addVariantChild->bulk_variant_id = $addVariant->id;
            $addVariantChild->child_name = $variant_child;
            $addVariantChild->save();
        }

        // $this->variantService->update($request->validated(), $id);
        return back()->with('success', 'Updated successfully!');
    }

    public function destroy($id)
    {
        $bulk  = BulkVariant::find($id);
        $variants = BulkVariantChild::where('bulk_variant_id', $bulk->id)->get();
        $bulk->delete();
        return response()->json('Deleted successfully!');
    }

    public function active($id)
    {
        $this->variantService->statusInactive($id);
        return response()->json(['Status changed successfully!']);
    }

    public function inActive($id)
    {
        $this->variantService->statusActive($id);
        return response()->json(['Status changed successfully!']);
    }

}
