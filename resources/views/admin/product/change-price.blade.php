@extends('layouts.admin-master')
@section('section')
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Update Price</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="row py-2">
            <div class="col-md-12">
                <form action="{{ route('product.price_regular', $userPrice->id) }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $userPrice->product_id }}">
                        <h2>Regular Price</h2>
                        <div class="border rounded p-2 bg-white mt-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Customer Selling Price <span class="text-danger">*</span></label>
                                <input type="text" value="{{ $userPrice->regular_price }}"  name="regular_price" id="selling_price" class="form-control" placeholder="Selling Price">

                                <label for="exampleInputEmail1">Customer Discount Type</label>
                                <input type="text" min="0" value="{{ $userPrice->discount_fixed }}" class="form-control" name="discount_fixed" id="discount_amount" placeholder="Discount Amount &#2547;"> <br>                                                    
                                <input type="text" min="0" value="{{ $userPrice->discount_percentage }}" class="form-control" name="discount_percentage" id="discount_percentage" placeholder="Discount Percentage %">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary bg-primary mt-2 float-right">Save</button>
                    </div>
                </form>
            </div>
            {{-- <div class="col-md-6">
                <form action="{{ route('product.price_dealer', $dealerPrice->id) }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $dealerPrice->product_id }}">
                        <h2>Dealer Price</h2>
                        <div class="border rounded p-2 bg-white mt-3">
                            <div class="form-group ">
                                <label for="exampleInputEmail1">Dealer Selling Price <span class="text-danger">*</span></label>
                                <input type="text" value="{{ $dealerPrice->dealer_price }}" min="0" name="dealer_price" id="dealer_selling_price" class="form-control" placeholder="Dealer Selling Price">

                                <label for="exampleInputEmail1">Dealer Discount Type</label>
                                <input type="text" min="0" value="{{ $dealerPrice->dealer_dis_fixed }}" class="form-control" name="dealer_dis_fixed" id="dealer_dis_fixed" placeholder="Dealer Discount Amount &#2547;"><br>
                                <input type="text" min="0" value="{{ $dealerPrice->dealer_dis_percentage }}" class="form-control" name="dealer_dis_percentage" id="dealer_dis_percentage" placeholder="Discount Percentage %">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary bg-primary mt-2 float-right">Save</button>
                    </div>
                </form>
            </div> --}}
        </div>
    </div>
</div>
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