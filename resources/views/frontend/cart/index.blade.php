@extends('frontend.layouts.master_frontend')
@section('pageTitle'){{ __('Cart') }}@endsection
@section('section')
    <div class="relative">
        <img src="{{ asset('frontend/images/contact-about-bg.webp') }}" alt="img"
            class="min-h-[220px] object-cover">
        <div class="absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%]">
            <h2 class="text-[18px] text-center sm:text-[30px] font-bold text-white bg-white/50 py-2 px-5 rounded uppercase">
                Cart Details</h2>
        </div>
    </div>
    <div class="mx-auto w-full xl:max-w-screen-lg sm:px-1 py-10">
        @php
            $subTotal = 0;
        @endphp
        <!-- cart -->
        <div class="cart bg-gray-50 border px-5">
            <div id="cartBody">
                <div class="grid grid-cols-5 md:grid-cols-7 py-5 border-b">
                    <div class="col-span-2 md:col-span-3 font-semibold text-center text-sm sm:text-base">Product</div>
                    <div class=" font-semibold text-center text-sm sm:text-base hidden md:block">Price</div>
                    <div class=" font-semibold text-center text-sm sm:text-base">Quantity</div>
                    <div class=" font-semibold text-center text-sm sm:text-base">Total</div>
                    <div class=" font-semibold text-center text-sm sm:text-base">Remove</div>
                </div>
                @forelse ($carts as $cart)
                    @php
                        $quantityPrice = $cart->quantity * $cart->price;
                        $subTotal += $cart->quantity * $cart->price;
                    @endphp
                    <div class="grid grid-cols-5 md:grid-cols-7 items-center py-5 border-b">
                        <div class="col-span-2 md:col-span-3 text-center flex items-center gap-1 lg:gap-2">
                            <img src="{{ asset('uploads/product/' . $cart->product->product_image) ?? asset($cart->product->product_image) }}"
                                alt="img" class="w-16 h-16 object-contain hidden sm:block">
                            <p class="text-sm sm:text-base">{{ $cart->product->product_name }}</p>
                        </div>
                        <div class="text-center hidden md:block">{{ $cart->price }}</div>
                        <div class="text-center grid sm:flex items-center mx-auto">
                            <button data-product-id="{{ $cart->product->id }}" class="p-1 lg:p-2 border hover:bg-slate-200" onclick="decrementBtn($(this))">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-minus"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M5 12l14 0"></path>
                                </svg>
                            </button>
                            <span class="p-1 lg:p-2 border-y" id="{{ $cart->product->id }}_quantity">{{ $cart->quantity }}</span>
                            <button data-product-id="{{ $cart->product->id }}" class="p-1 lg:p-2 border hover:bg-slate-200" onclick="incrementBtn($(this))">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 5l0 14"></path>
                                    <path d="M5 12l14 0"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="text-center text-sm sm:text-base font-semibold">{{ number_format($quantityPrice, 0, '.', ',') }}</div>

                        <button data-cart-id="{{ $cart->id }}" class="text-center" onclick="removeBtn($(this))">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-8 h-8 sm:w-10 sm:h-10 mx-auto bg-fave-100 hover:bg-fave-500 hover:text-white p-1 sm:p-2 rounded-full cursor-pointer text-fave-500"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M4 7l16 0"></path>
                                <path d="M10 11l0 6"></path>
                                <path d="M14 11l0 6"></path>
                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                            </svg>
                        </button>
                    </div>
                @empty
                    Not Found
                @endforelse
                <div class="">
                    <div class="flex justify-between py-5 border-b">
                        <input type="text" id="coupon_input_field"  placeholder="Coupon Code"
                            class="w-[150px] sm:w-auto outline-fave-500 p-2 border">
                        <button id="apply_coupon_btn"
                            class="font-semibold text-md sm:text-lg border p-2 hover:bg-slate-200 whitespace-nowrap">Apply
                            coupon</button>
                    </div>
                    <div class="py-5 border-b">
                        <div class="flex justify-between">
                            <p class="font-semibold">Coupon Amount</p>
                            <div class="flex">
                                <p class="font-semibold" id="discount_fixed"></p>
                                <p class="font-semibold" id="discount_amount">0.00</p>
                                <p class="font-semibold" id="discount_percent"></p>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-between py-5">
                        <p class="font-semibold text-lg">Subtotal</p>
                        <h2 class="font-semibold text-xl">&#2547;. <span id="grand_total">{{ number_format($subTotal, 0, '.', ',') }} 
                          </span></h2>
                            @php
                                Session::put('sub_total', $subTotal);
                            @endphp
                    </div>
                </div>
            </div>
            <div class="grid sm:flex sm:justify-between justify-center gap-2 pb-5">
                <a href="{{ URL::previous() }}" class="flex items-center gap-1 underline hover:text-fave-500 mx-auto sm:mx-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back-up"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="1"
                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M9 14l-4 -4l4 -4"></path>
                        <path d="M5 10h11a4 4 0 1 1 0 8h-1"></path>
                    </svg>
                    <span>Return to shop</span>
                </a>
                {{-- <form method="post" action="{{ route('checkout')}}">
                    @csrf
                    <div id="inputSubtotal">
                        <input type="hidden" value="{{ $subTotal }}" name="sub_total" id="grand_total_value">
                    </div> --}}
                    
                    <a href="{{ route('checkout') }}" class="font-semibold bg-fave-500 text-white py-2 px-5 rounded">Proceed
                    to checkout</a>
                {{-- </form> --}}
                </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
    //    $('#proceed_to_checkout').click(function() {
    //        $.ajax({
    //            url: "{{ route('checkout') }}",
    //            method: "GET",
    //            success: function(data) {
    //                toastr.success(data.success);
    //            }
    //        });
    //    });
        $('#apply_coupon_btn').click(function() {
            var coupon_name = $('#coupon_input_field').val();
            var sub_total = {{ $subTotal }};
            $.ajax({
                type: 'POST',
                url: "{{ route('frontend.coupon_add') }}",
                data: {
                    coupon_name: coupon_name,
                    sub_total: sub_total
                },
                success: function(data) {
                    $('#discount_percent').html(data.coupon_type_percent);
                    $('#discount_fixed').html(data.coupon_type_fixed);
                    $('#discount_amount').html(data.coupon_amount);
                    $('#grand_total').html(data.grand_total);
                    $('#grand_total_value').val(data.grand_total);
                    $('.coupon_area').css('display', 'none');
                    toastr.success(data.success);
                    // toastr.success('Success: ' + response.message);
                },
                error: function(xhr) {
                    // On error, display an error message with Toastr
                    if (xhr.responseJSON && xhr.responseJSON.error) {
                        toastr.error('Error: ' + xhr.responseJSON.error);
                    } else {
                        toastr.error('An error occurred.');
                    }
                }
            });
        });
        function incrementBtn(elem){

            product_id = elem.data('product-id');
            var incVal = $('#'+product_id+'_quantity').html();
            var intValue = parseInt(incVal);

            if (!isNaN(intValue)) {
                intValue++;
                $.ajax({
                    type: 'POST',
                    url: "{{ route('increment.quantity') }}",
                    data: {
                        product_id: product_id
                    },
                    success: function(data) {
                        toastr.success(data);
                        $('#cartBody').load(location.href+" #cartBody>*","");
                        $('#inputSubtotal').load(location.href+" #inputSubtotal>*","");
                    }
                });
                $('#'+ product_id +'_quantity').html(intValue);
            }
        }

        function decrementBtn(elem)
        {
            product_id = elem.data('product-id');
            var decVal = $('#'+product_id+'_quantity').html();
            var intValue = parseInt(decVal);

            if (!isNaN(intValue) && intValue > 1) {
                intValue--;
                $.ajax({
                    type: 'POST',
                    url: "{{ route('decrement.quantity') }}",
                    data: {
                        product_id: product_id
                    },
                    success: function(data) {
                        toastr.success(data);
                        $('#cartBody').load(location.href+" #cartBody>*","");
                        $('#inputSubtotal').load(location.href+" #inputSubtotal>*","");
                    }
                });
                $('#'+ product_id +'_quantity').html(intValue);
            }
        }

        function removeBtn(elem)
        {
            cart_id = elem.data('cart-id');
            $.ajax({
                method:'POST',
                url: "{{ route('frontend.remove.cart') }}",
                data: {
                    cart_id: cart_id
                },
                success:function(data){
                    toastr.success(data);
                    $('#cartBody').load(location.href+" #cartBody>*","");
                    $('#cartQuantity').load(location.href+" #cartQuantity>*","");
                },
                error:function(error){
                    toastr.error(error);
                }
            });
        }
    </script>
@endpush
