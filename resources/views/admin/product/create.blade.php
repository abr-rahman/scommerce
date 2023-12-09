@extends('layouts.admin-master')
@push('css')
    <style>
        .border {
            border: 1px solid #b3b3b3 !important;
        }
    </style>
@endpush
@section('section')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Product Create</h3>
                        </div>
                        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="border rounded p-2 bg-white">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Product Name <span class="text-danger">*</span></label>
                                                        <input type="text" name="product_name" value="{{ old('product_name') }}" id="product_name" class="form-control"
                                                            placeholder="Product Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Product Numbering <span class="text-danger">*</span></label>
                                                        <input type="number" name="numbering" value="{{ old('numbering') }}" class="form-control"
                                                            placeholder="Product number">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border rounded p-2 bg-white mt-3">
                                            <div class="form-group">
                                                <div class="row">
                                                <div class="col-md-4">
                                                    <label for="exampleInputEmail1">Customer Selling Price <span class="text-danger">*</span></label>
                                                    <input type="number" value="00.0" value="{{ old('regular_price') }}" name="regular_price" id="selling_price" class="form-control" placeholder="Selling Price">
                                                </div>  
                                                <div class="col-md-4">
                                                    <label for="exampleInputEmail1">Customer Discount Amount</label>
                                                    <input type="number" class="form-control" value="{{ old('discount_fixed') }}" name="discount_fixed" id="discount_amount" placeholder="Discount Amount &#2547;"> <br>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="exampleInputEmail1">Customer Discount Percent %</label>
                                                    <input type="number" class="form-control" value="{{ old('discount_percentage') }}" name="discount_percentage" id="discount_percentage" placeholder="Discount Percentage %">
                                                </div>
                                            </div>
                                        </div>
                                            {{-- <div class="col-md-6">
                                                <div class="border rounded p-2 bg-white mt-3">
                                                    <div class="form-group ">
                                                        <label for="exampleInputEmail1">Dealer Selling Price <span class="text-danger">*</span></label>
                                                        <input type="number" value="00.0" min="0" value="{{ old('dealer_price') }}" name="dealer_price" id="dealer_selling_price" class="form-control" placeholder="Dealer Selling Price">

                                                        <label for="exampleInputEmail1">Dealer Discount Type</label>
                                                        <input type="number" min="0" class="form-control" value="{{ old('dealer_dis_fixed') }}" name="dealer_dis_fixed" id="dealer_dis_fixed" placeholder="Dealer Discount Amount &#2547;"><br>
                                                        <input type="number" min="0" class="form-control" value="{{ old('dealer_dis_percentage') }}" name="dealer_dis_percentage" id="dealer_dis_percentage" placeholder="Discount Percentage %">
                                                    </div>
                                                </div>
                                            </div> --}}
                                        </div>
                                        <div class="border rounded p-2 bg-white mt-3">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Thumbnail Image</label>
                                                        <input type="file" value="{{ old('product_image') }}" name="product_image" class="form-control"
                                                            placeholder="Image">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Featured Images (Max 4)</label>
                                                        <input type="file" class="form-control" value="{{ old('thumbnail_image') }}" name="thumbnail_image[]"
                                                            placeholder="Featured Images" multiple>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Warranty Days</label>
                                                        <input type="number" value="{{ old('warranty_day') }}" name="warranty_day" class="form-control"
                                                            placeholder="Warranty Days">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border rounded p-2 bg-white mt-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Long Description</label>
                                                <textarea name="long_description" class="form-control tEditor" placeholder="Long Description" cols="20"
                                                    rows="10">{{ old('long_description') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="border rounded p-2 bg-white">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Select Category <span
                                                                class="text-danger">*</span></label>
                                                        <select value="{{ old('category_id') }}" name="category_id" class="form-control select2">
                                                            <option value="">Select Category</option>
                                                            @foreach ($categories as $item)
                                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Select Brand </label>
                                                        <select value="{{ old('brand_id') }}" name="brand_id" class="form-control select2">
                                                            <option value="">Select Brand</option>
                                                            @foreach ($brands as $item)
                                                                <option value="{{ $item->id }}">{{ $item->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border rounded p-2 bg-white mt-3">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Add Tags (Max One Word )</label>
                                                    <input type="text" class="form-control" value="{{ old('tag') }}" name="tag" placeholder="Tags">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border rounded p-2 bg-white mt-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Short Description</label>
                                                <textarea value="{{ old('short_description') }}" name="short_description" class="form-control tEditor" placeholder="Short Description" cols="10"
                                                    rows="5"></textarea>
                                            </div>
                                        </div>
                                        <div class="float-right mt-5">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success bg-success">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection
@push('js')
    <script>
        $("#discount_amount").on("keyup change", function(e) {
            var discountAmount = $(this).val();
            var selling_price = $('#selling_price').val();
            let totalPercen = (discountAmount / selling_price) * 100;
            $("#discount_percentage").val(Math.round(totalPercen));
        });

        $("#discount_percentage").on("keyup change", function(e) {
            var discountPercen = $(this).val();
            var selling_price = $('#selling_price').val();
            let totalPercen = ((selling_price * discountPercen) / 100);
            $("#discount_amount").val(Math.round(totalPercen));
        });

        $("#dealer_dis_fixed").on("keyup change", function(e) {
            var discountAmount = $(this).val();
            var selling_price = $('#dealer_selling_price').val();
            let totalPercen = (discountAmount / selling_price) * 100;
            $("#dealer_dis_percentage").val(Math.round(totalPercen));
        });

        $("#dealer_dis_percentage").on("keyup change", function(e) {
            var discountPercen = $(this).val();
            var selling_price = $('#dealer_selling_price').val();
            let totalPercen = ((selling_price * discountPercen) / 100);
            $("#dealer_dis_fixed").val(Math.round(totalPercen));
        });
    </script>
@endpush
