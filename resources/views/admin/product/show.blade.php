@extends('layouts.admin-master')
@section('section')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3 class="d-inline-block d-sm-none">{{ $product->product_name }}</h3>

                    <div class="col-12">
                        {{-- @if ($product->product_image == 'default-product-image.png')
                            <img src="{{ asset('default/' . $product->product_image) }}" style="width: 18%; object-fit: contain;" class="product-image" alt="Product Image">
                        @else --}}
                            <img src="{{ asset('uploads/product/' . $product->product_image) ?? asset( $product->product_image) }}" style="width: 18%; object-fit: contain;" class="product-image" alt="Product Image">
                        {{-- @endif --}}
                    </div>
                    <div class="col-12 product-image-thumbs">
                        @if (isset($product->thumbnail_image))
                            @foreach (json_decode($product->thumbnail_image, true) as $thumbnail)
                                <div class="product-image-thumb"><img src="{{ asset('uploads/product/' . $thumbnail) ?? asset($thumbnail) }}" alt="Product Featured Image"></div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <h3 class="my-3">{{ $product->product_name }}</small></h3><hr>
                    <div class="border">
                        <div class="p-2 text-center"><strong>Customer Price</strong></div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Regular Price</th>
                                    <th>Dis: Fixed</th>
                                    <th>Dis: Per.</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> {{ $userPrice->regular_price }}  </td>
                                    @if ($userPrice->discount_fixed === $userPrice->regular_price)
                                        <td>0.00</td>
                                    @else
                                        <td> {{ $userPrice->discount_fixed }} </td>
                                    @endif
                                    <td> {{ $userPrice->discount_percentage }} </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="border">
                        <div class="p-2 text-center"><strong>Dealer Price</strong></div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Price</th>
                                    <th>Dis: Fixed</th>
                                    <th>Dis: Per.</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> {{ $dealerPrice->dealer_price }}  </td>
                                    @if ($dealerPrice->dealer_dis_fixed === $dealerPrice->dealer_price)
                                        <td>0.00</td>
                                    @else
                                        <td> {{ $dealerPrice->dealer_dis_fixed }} </td>
                                    @endif
                                    <td> {{ $dealerPrice->dealer_dis_percentage }} </td>
                                </tr>
                            </tbody>
                        </table>
                    </div> --}}
                    <div class="border">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Sub-Category</th>
                                    <th>Brand</th>
                                    <th>weight</th>
                                    <th>Tags</th>
                                    <th>Dimention</th>
                                    <th>Meterials</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> {{ $product->category->name ?? 'null' }}  </td>
                                    <td> {{ $product->subCategory->name ?? 'null' }} </td>
                                    <td> {{ $product->brand->name ?? 'null' }} </td>
                                    <td> {{ $product->weight ?? 'null' }} </td>
                                    <td> {{ $product->tag ?? 'null' }} </td>
                                    <td> {{ $product->dimensions ?? 'null' }} </td>
                                    <td> {{ $product->meterials ?? 'null' }} </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="border">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Quantity</th>
                                    <th>Slug</th>
                                    <th>sku</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> {{ $product->inventory->quantity ?? 0 }} </td>
                                    <td> {{ $product->slug }} </td>
                                    <td> {{ $product->sku }} </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            <div class="row mt-4">
                <nav class="w-100">
                    <div class="nav nav-tabs" id="product-tab" role="tablist">
                        <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab"
                            href="#product-desc" role="tab" aria-controls="product-desc"
                            aria-selected="true">Description</a>
                        <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab"
                            href="#product-comments" role="tab" aria-controls="product-comments"
                            aria-selected="false">Comments</a>
                        <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab"
                            href="#product-rating" role="tab" aria-controls="product-rating"
                            aria-selected="false">Rating</a>
                    </div>
                </nav>
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="product-desc" role="tabpanel"
                        aria-labelledby="product-desc-tab"> {!! $product->long_description !!}
                    </div>
                    <div class="tab-pane fade show active" id="product-desc" role="tabpanel"
                        aria-labelledby="product-desc-tab"> {!! $product->short_description !!}
                    </div>
                    <div class="tab-pane fade" id="product-comments" role="tabpanel"
                        aria-labelledby="product-comments-tab"> Vivamus rhoncus nisl sed venenatis luctus. Sed
                        condimentum risus ut tortor feugiat laoreet. Suspendisse potenti. Ddunt ipsum. </div>
                    <div class="tab-pane fade" id="product-rating" role="tabpanel"
                        aria-labelledby="product-rating-tab"> Cras ut ipsum ornare,  </div>
                </div>
            </div>
        </div>

    </div>
@endsection
