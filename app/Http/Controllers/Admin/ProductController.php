<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ArrivalDataTable;
use App\DataTables\ProductDataTable;
use App\DataTables\SliderDataTable;
use App\Enums\ProductStatus;
use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Services\Interfaces\ProductServiceInterface;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Purchase;
use App\Models\RegularPrice;
use App\Utils\FileUploader;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    // public function __construct(
    //     private FileUploader $uploader,
    // ) {
    // }

    protected $productService;

    public function __construct(ProductServiceInterface $productService, private FileUploader $uploader)
    {
        $this->productService = $productService;
    }

    public function index(ProductDataTable $dataTable)
    {
        return $dataTable->render('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('status', StatusEnum::Active->value)->get();
        $brands = Brand::where('status', StatusEnum::Active->value)->get();
        // $subCategories = SubCategory::where('status', StatusEnum::Active->value)->get();
        // $tags = Tag::where('status', StatusEnum::Active->value)->get();
        // $taxs = Tax::where('status', StatusEnum::Active->value)->get();
        // $attribute = Attribute::where('status', StatusEnum::Active->value)->get();
        return view('admin.product.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request)
    {
        $category_name = Category::select('id', 'name')->where('id', $request->category_id)->first();
        $brand_name = Brand::where('id', $request->brand_id)->first();

        $randomProductId = mt_rand(1000000000, 9999999999);

        if ($request->hasFile('product_image')) {
            $product_image = $this->uploader->upload($request->file('product_image'), 'uploads/product/');
            $product['product_image'] = $product_image;
        }

        if ($request->hasFile('thumbnail_image')) {
            $thumbnail_image = $this->uploader->uploadMultiple($request->file('thumbnail_image'), 'uploads/product/');
            $product['thumbnail_image'] = $thumbnail_image;
        }

        $customerPrice = $request->regular_price;

        $customerDiscountAmount = $request->discount_fixed;
        $customerCurrentPrice = $customerPrice - $customerDiscountAmount;

        $dealerDiscountAmount = $request->dealer_dis_fixed;
        $dealerCurrentPrice = $request->dealer_price - $dealerDiscountAmount;

        if ($customerPrice < $customerDiscountAmount) {
            return back()->with('error', 'Discounted price too long!');
        } else {
            $product = new Product();
            $product->category_id = $request->category_id ?? null;
            // $product->sub_category_id = $request->sub_category_id ?? null;
            $product->brand_id = $request->brand_id ?? null;
            $product->tag = $request->tag ?? null;
            $product->added_by = auth()->user()->id ?? null;
            $product->product_name = $request->product_name ?? null;
            $product->slug = str_replace([' ', '/', ',', '.'], '-', $category_name->name.'-'.$brand_name->name.'-'.$request->product_name) ?? null;
            $product->sku = $request->product_name.'-'.Str::random(4) ?? null;
            $product->product_code = $randomProductId.'-'.Str::random(4) ?? null;
            $product->short_description = $request->short_description ?? null;
            $product->long_description = $request->long_description ?? null;
            $product->warranty_day = $request->warranty_day ?? 0;
            $product->numbering = $request->numbering ?? 0;
            $product->thumbnail_image = $thumbnail_image ?? '["default-product-image.png"]';
            $product->product_image = $product_image ?? 'default-product-image.png';
            $product->status = ProductStatus::Comming->value;
            $product->save();

            $priceInsert = new RegularPrice();
            $priceInsert->product_id = $product->id;
            $priceInsert->regular_price = $customerPrice;
            $priceInsert->discount_fixed = $customerCurrentPrice ?? $customerPrice;
            $priceInsert->discount_percentage = $request->discount_percentage ?? 00;
            $priceInsert->save();

            // $delPriceInsert = new DealerPrice();
            // $delPriceInsert->product_id = $product->id;
            // $delPriceInsert->dealer_dis_fixed = $dealerCurrentPrice ?? $request->dealer_price;
            // $delPriceInsert->dealer_price = $request->dealer_price;
            // $delPriceInsert->dealer_dis_percentage = $request->dealer_dis_percentage ?? 00;
            // $delPriceInsert->save();

            return redirect()->route('products.index')->with('success', 'Created successfully!');
        }
        // $this->productService->store($request->validated());
    }
    /**
     * Display the specified resource.
     */
    // public function show(Product $product)
    // {
    //     return view('admin.product.show', compact('product'));
    // }
    public function productShow($id)
    {
        $product = Product::find($id);
        // $dealerPrice = DealerPrice::select('dealer_price', 'dealer_dis_fixed', 'dealer_dis_percentage')->where('product_id', $product->id)->first();
        $userPrice = RegularPrice::select('regular_price', 'discount_fixed', 'discount_percentage')->where('product_id', $product->id)->first();
        return view('admin.product.show', compact('product', 'userPrice'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function productEdit($id)
    {
        $product = Product::find($id);
        if (is_string($product->thumbnail_image)) {
            $product->thumbnail_image = json_decode($product->thumbnail_image, true);
        }
        $categories = Category::where('status', StatusEnum::Active->value)->get();
        // $subCategories = SubCategory::where('status', StatusEnum::Active->value)->get();
        $brands = Brand::where('status', StatusEnum::Active->value)->get();
        // $dealerPrice = DealerPrice::select('dealer_price', 'dealer_dis_fixed', 'dealer_dis_percentage')->where('product_id', $product->id)->first();
        // $userPrice = RegularPrice::select('regular_price', 'discount_fixed', 'discount_percentage')->where('product_id', $product->id)->first();
        session(['last_visited_url' => url()->current()]);
        return view('admin.product.edit', compact('product', 'categories', 'brands'));
    }

    public function inventory($id)
    {
        $product = Product::find($id);
        return view('admin.product.inventory', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, $id)
    {
        $category_name = Category::where('id', $request->category_id)->first();
        $brand_name = Brand::where('id', $request->brand_id)->first();
        $randomProductId = mt_rand(1000000000, 9999999999);
        $product = Product::find($id);

        if (!$request['thumbnail_image']) {
            $product->thumbnail_image = $product->thumbnail_image;
            $product->save();
        } else {
            if (isset($request['thumbnail_image'])) {
                $newJson = $this->uploader->uploadMultiple($request['thumbnail_image'], 'uploads/product/');
                $newArr = json_decode($newJson, true);
                $oldArr = json_decode($product->thumbnail_image, true);
                $updatedJson = json_encode(array_merge($oldArr, $newArr));
                $request['thumbnail_image'] = $updatedJson;
                $product->thumbnail_image = $updatedJson ?? null;
                $product->save();
            }
        }
        if (!$request['product_image']) {
            $product->product_image = $product->product_image;
            $product->save();
        } else {
            if (isset($request['product_image'])) {
                $oldFile = \public_path('uploads/product/' . $product->product_image);
                if (isset($product->product_image)) {
                    if (file_exists($oldFile)) {
                        if($product->product_image != 'default-product-image.png') {
                            unlink($oldFile);
                        }
                    }
                }
                $product_image = $this->uploader->upload($request->file('product_image'), 'uploads/product/');
                $request['product_image'] = $product_image;
                $product->product_image = $product_image;
                $product->save();
            }
        }

        $price = $request->regular_price;
        $disPrice = $request->discount_fixed;
        if ($price < $disPrice) {
            return back()->with('error', 'Discounted price too long!');
        } else {
            $product->category_id = $request->category_id ?? null;
            // $product->sub_category_id = $request->sub_category_id ?? null;
            $product->brand_id = $request->brand_id ?? null;
            $product->tag = $request->tag ?? null;
            $product->added_by = auth()->user()->id ?? null;
            $product->product_name = $request->product_name ?? null;
            $product->slug = str_replace([' ', '/', ',', '.'], '-', $category_name->name.'-'.$brand_name->name.'-'.$request->product_name) ?? null;
            $product->sku = $request->product_name.'-'.Str::random(4) ?? null;
            $product->product_code = $randomProductId.'-'.Str::random(4) ?? null;
            $product->short_description = $request->short_description ?? null;
            $product->long_description = $request->long_description ?? null;
            $product->warranty_day = $request->warranty_day ?? null;
            $product->numbering = $request->numbering ?? null;
            $product->save();

            // $this->productService->update($request->validated(), $id);
            return redirect()->route('products.index')->with('success', 'Updated successfully!');
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $purchase = Purchase::select('id', 'product_id')->where('product_id', $id)->exists();
        if ($purchase == true) {
            return response()->json('This product already purchased!');
        } else {
            $product->delete();
        }
        return response()->json('Deleted successfully!');
    }

    public function removeArrival($id)
    {
        $item = Product::find($id);
        if ($item->status == ProductStatus::Arrival->value) {
            $item->status = ProductStatus::Active->value;
        }
        $item->save();
        return response()->json('Remove arrival successfully!');
    }

    public function addFeatured($id)
    {
        $item = Product::find($id);
        $item->a_status = ProductStatus::Featured->value;
        $item->save();
        return back()->with('Featured Added successfully!');
    }

    public function removeFeatured($id)
    {
        $item = Product::find($id);
        $item->a_status = ProductStatus::Active->value;
        $item->save();
        return back()->with('Featured remove successfully!');
    }

    public function commingSoon($id)
    {
        $item = Product::find($id);
        if ($item->status == ProductStatus::Active->value) {
            $item->status = ProductStatus::Comming->value;
        }
        $item->save();
        return back()->with('success','Added comming-soon successfully!');
    }

    public function removeComming($id)
    {
        $item = Product::find($id);
        if ($item->status == ProductStatus::Comming->value) {
            $item->status = ProductStatus::Active->value;
        }
        $item->save();
        return response()->json('Remove comming-soon successfully!');
    }

    public function addArrival($id)
    {
        $item = Product::find($id);
        if ($item->status == ProductStatus::Active->value) {
            $item->status = ProductStatus::Arrival->value;
        }
        $item->save();

        return response()->json('Added arrival list successfully!');
    }

    public function active($id)
    {
        $this->productService->statusInactive($id);
        return response()->json(['Status changed successfully!']);
    }

    public function inActive($id)
    {
        $this->productService->statusActive($id);
        return response()->json(['Status changed successfully!']);
    }
}
