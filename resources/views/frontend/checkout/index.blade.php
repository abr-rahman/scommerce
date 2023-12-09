@extends('frontend.layouts.master_frontend')
@section('pageTitle'){{ __('Checkout') }}@endsection
@section('section')
    <div class="relative">
        <img src="{{ asset('frontend/images/contact-about-bg.webp') }}" alt="img"
            class="min-h-[220px] object-cover">
        <div class="absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%]">
            <h2 class="text-[18px] text-center sm:text-[30px] font-bold text-white bg-white/50 py-2 px-5 rounded uppercase">
                Checkout</h2>
        </div>
    </div>
    <div class="container mx-auto my-16 bg-gray-50 border p-5">
        <form method="post" action="{{ route('confirm.order') }}" enctype="multipart/form-data">
            @csrf
            <div class="grid lg:grid-cols-5 gap-5 sm:gap-10">
                <div class="lg:col-span-2">
                    <div class="">
                        <h2 class="text-xl border-b py-5 font-semibold">Customer Information</h2>
                        <div class="pt-5">
                                <div class="">
                                    <label for="fname">Full Name <b>*</b></label>
                                    <input type="text" id="fname" required name="customer_name" placeholder="Full Name*" value="{{ auth()->user()->name }}" class="border text-sm p-2 mt-1 rounded w-full my-5">
                                </div>
                                <div class="">
                                    <label for="email">Email <b>*</b></label>
                                    <input type="text" id="email" required name="email" placeholder="Email*" value="{{ auth()->user()->email }}" class="border text-sm p-2 mt-1 rounded w-full my-5">
                                </div>
                                <div class="">
                                    <label for="phone">Phone <b>*</b></label>
                                    <input type="text" id="phone" required name="phone" value="{{ old('phone') }}" placeholder="Telephone*" class=" border text-sm p-2 mt-1 rounded w-full my-5">
                                </div>
                                <div class="md:flex gap-5 w-full">
                                    <div class="w-full">
                                        <label for="Division">Division <b>*</b></label>
                                        <select id="divisionSelect" required name="division_id" class="block text-sm appearance-none w-full border p-2 mt-1 my-5">
                                            <option value="">Select Division</option>
                                            @foreach ($divisions as $division)
                                                <option value="{{ $division->id }}">{{ $division->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="w-full">
                                        <label class="block " for="selectOption">
                                            District <b>*</b>
                                        </label>
                                        <div class="relative">
                                            <select required name="district_id" id="district_dropdown" class="block text-sm appearance-none w-full border p-2 mt-1 my-5">
                                                <option value="option1">Select District</option>
                                            </select>
                                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path d="M7 7l3-3 3 3m0 6l-3 3-3-3"></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="">
                                    <label for="phone">Area <b>*</b></label>
                                    <select required name="upazila_id" id="upazila_dropdown" class="block text-sm appearance-none w-full border p-2 mt-1 my-5">
                                        <option value="option1">Select Area </option>
                                    </select>
                                </div> --}}
                                <div class="">
                                    <label for="thana">Thana <b>*</b></label>
                                    <input type="text" required name="thana" value="{{ old('thana') }}" placeholder="Thana" class="border text-sm p-2 mt-1 rounded w-full my-5">
                                </div>
                                <div class="">
                                    <label for="address">Address <b>*</b></label>
                                    <input type="text" id="address" required name="address" value="{{ old('address') }}" placeholder="Address" class="border text-sm p-2 mt-1 rounded w-full my-5">
                                </div>
                                <div class="">
                                    <label for="landmark">Landmark (Optional)</label>
                                    <input type="text" id="landmark" name="landmark" placeholder="Landmark" value="{{ old('landmark') }}" class="border text-sm p-2 mt-1 rounded w-full my-5">
                                </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-3">
                    <div class="">
                        <h2 class="text-xl border-b py-5 font-semibold">Order Overview</h2>
                        <div class="max-h-[350px] overflow-y-auto">
                            <div class="py-5 border-b grid grid-cols-5 font-semibold">
                                <p class="col-span-3">Product Name</p>
                                <p class="">Price</p>
                                <p class="">Total</p>
                            </div>
                            @foreach ($carts as $cart)
                            @php
                                $quantityPrice = $cart->quantity * $cart->price;
                            @endphp
                                <div class="py-5 border-b grid grid-cols-5 ">
                                    <p class="col-span-3">{{ $cart->product->product_name }} ({{ $cart->quantity }})</p>
                                    <p class="">{{ $cart->price }}</p>
                                    <p class="font-semibold">{{  number_format($quantityPrice, 0, '.', ',') }}</p>
                                </div>
                            @endforeach
                        </div>
                        <div id="shippingForLoadCod">
                            <div class="py-5" id="shippingForLoad">
                                <div class="grid grid-cols-5 justify-between py-5 border-b">
                                    <p class="col-span-4 font-semibold">Sub-Total :</p>
                                    <p class="font-semibold">{{ $currentTotal }}</p>
                                </div>
                                <div class="grid grid-cols-5 justify-between py-5 border-b">
                                    <p class="col-span-4 font-semibold">Home Delivery :</p>
                                    <p class="font-semibold" id="deliveryAmount">0.00</p>
                                </div>
                                <div class="grid grid-cols-5 justify-between py-5 border-b">
                                    <p class="col-span-4 font-semibold">Total :</p>
    
                                    <p class="font-semibold" id="grandTotal">{{ $currentTotal }} </p>
                                    <input type="hidden" name="grand_total" value="{{ $currentTotal }}" id="grandTotalValue">
                                    <div id="currentTotal" data-current-total="{{ $currentTotal }}"></div>
                                    
                                    {{-- <input type="text"  name="shipping_charge" id="deliveryValue"> --}}
                                </div>
                            </div>
                            <div class="flex flex-col sm:flex-row gap-2 justify-between items-center py-5 border-b">
                                <div class="grid gap-2 w-full">
                                    <h2 class="font-semibold">Shipping Area <b>*</b></h2>
                                    <select required id="selectArea" name="shipping_charge" class="p-2 border w-full" >
                                        <option >-- Select Area --</option>
                                        @foreach ($shippings as $shipping)
                                            <option value="{{ $shipping->charge }}">{{ $shipping->area_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="flex flex-col sm:flex-row gap-2 justify-between items-center py-5 border-b">
                                <div class="grid gap-2 w-full">
                                    <h2 class="font-semibold">Payment Method <b>*</b></h2>
                                    <select name="payment_method" id="paymentMethod" class="p-2 border w-full" required>
                                        <option>--Select Method--</option>
                                        <option value="online" >Online Payment</option>
                                        <option value="cod" selected>Cash on Delivery</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-5 items-center justify-between mt-5">
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox text-indigo-600" required>
                            <p class="ml-2 text-sm select-none">I have read and agree to the <a class="underline text-fave-500 " href="#">Terms and Conditions</a> , <a class="underline text-fave-500 " href="#">Privacy Policy</a> and <a class="underline text-fave-500 " href="#">Refund and Return Policy</a></p>
                        </label>
                        <button type="submit" class="bg-fave-500 text-white px-6 rounded font-semibold py-3 whitespace-nowrap">Confirm Order</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('js')
    <script>
        $('body').on('change', '#selectArea', function(e) {
            var selectedValue = $(this).val();
            if (selectedValue == 0) {
                $('#paymentMethod').val('online');
                $('#paymentMethod option[value="cod"]').prop('disabled', true);
            } else {
                $('#paymentMethod').val('cod');
                $('#paymentMethod option[value="cod"]').prop('disabled', false);
            }
            var currentTotalData = $("#currentTotal").data('current-total');
            if (typeof currentTotalData === 'string') {
                var currentTotalValue = currentTotalData.replace(/[^0-9]/g, '');
                var currentTotalValue = {{ $currentTotal }};
            } else {
                var currentTotalValue = $("#currentTotal").data('current-total');
            }
            if (!isNaN(currentTotalValue)) {
                const grandTotal = parseFloat(selectedValue) + parseInt(currentTotalValue);
                $('#deliveryAmount').html(selectedValue);
                $('#grandTotal').html(grandTotal.toFixed(2)); // Display the grand total with two decimal places
                $('#deliveryValue').val(selectedValue);
                $('#grandTotalValue').val(grandTotal.toFixed(2)); // Set the grand total value with two decimal places
            } else {
                console.error('Invalid current total value');
            }
            // const grandTotal = parseInt(selectedValue) + parseInt(currentTotalValue);
            // $('#deliveryAmount').html(selectedValue);
            // $('#grandTotal').html(grandTotal);
            // $('#deliveryValue').val(selectedValue);
            // $('#grandTotalValue').val(grandTotal);
        });

        $('body').on('click', '#divisionSelect', function(e) {
            var division_id = $(this).val();
            $.ajax({
                type: 'POST',
                url: "{{ route('division.to_district') }}",
                data: {division_id:division_id },
                success: function(data){
                    $('#district_dropdown').html(data);
                }
            });
        });

        // $('#district_dropdown').change(function(){
        //     var district_id = $(this).val();
        //     $.ajax({
        //         type: 'POST',
        //         url: "{{ route('district.to_upazila') }}",
        //         data: {district_id:district_id },
        //         success: function(data){
        //             $('#upazila_dropdown').html(data);
        //         }
        //     });
        // });

        // $('body').on('change', '#district_dropdown', function(e) {
        //     var district_id = $(this).val();

        //     var currentTotalData = $("#currentTotal").data('current-total');
        //     if (typeof currentTotalData === 'string') {
        //         var currentTotalValue = currentTotalData.replace(/[^0-9]/g, '');
        //     } else {
        //         var currentTotalValue = $("#currentTotal").data('current-total');
        //     }
        //     // var current_total = $("#currentTotal").val();
        //     // alert(current_total);
        //     $.ajax({
        //         type: 'POST',
        //         url: "{{ route('district.to_shipping') }}",
        //         data: {district_id:district_id},
        //         success: function(data){
        //             var grandTotal = parseInt(data.shippingCharge) + parseFloat(currentTotalValue);
        //             $('#deliveryAmount').html(data.shippingCharge);
        //             $('#grandTotal').html(grandTotal);
        //             $('#deliveryValue').val(data.shippingCharge);
        //             $('#grandTotalValue').val(grandTotal);
        //         }
        //     });
        // });
    </script>
@endpush
