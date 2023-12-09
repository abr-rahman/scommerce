@extends('frontend.layouts.master_frontend')
@section('pageTitle'){{ __('Verification') }}@endsection
@section('section')
<div class="relative">
    <img src="{{ asset('frontend/images/contact-about-bg.webp') }}" alt="img" class="min-h-[220px] object-cover">
    <div class="absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%]">
        <h2 class="text-[18px] text-center sm:text-[30px] font-bold text-white bg-white/50 py-2 px-5 rounded uppercase">Verify Your Product</h2>
    </div>
</div>

<div class="mx-auto w-full xl:container px-6 py-10">
    <div class="">
        <form action="{{ route('product.verify_store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="product_id" value="{{ $qrCode->product->id }}" >
            <div class="grid md:grid-cols-2 gap-5">
                <div class="bg-white p-5 border rounded">
                    {{-- @php
                        $currentURL = Illuminate\Support\Facades\Request::fullUrl();
                        $parseURL = parse_url($currentURL);
                        $queryString = isset($parseURL['query']) ? str_replace('=', '', $parseURL['query']) : '';
                    @endphp --}}
                    <div class="mb-4">
                        <label for="name" class="block  font-medium">Name <span>*</span></label>
                        <input type="text" id="name" name="name" class="form-input w-full border px-2 py-2 mt-1 outline-fave-500" placeholder="Enter Your Name*" required="">
                    </div>

                    <div class="mb-4">
                        <label for="phone" class="block  font-medium">Phone Number <span>*</span></label>
                        <input type="tel" id="phone" name="phone" class="form-input w-full border px-2 py-2 mt-1 outline-fave-500" placeholder="123-456-7890*" required="">
                    </div>

                    <div class="mb-4">
                        <label for="address" class="block  font-medium">Email Address</label>
                        <input type="email" id="address" name="address" class="form-input w-full border px-2 py-2 mt-1 outline-fave-500" placeholder="Enter Your Email *" required="">
                    </div>

                    <div class="mb-4">
                        <label for="pName" class="block  font-medium">Product Name <span>*</span></label>
                        <input type="text" id="pName" name="product_name" value="{{ $qrCode->product->product_name }}" readonly class="form-input w-full border px-2 py-2 mt-1 outline-fave-500" placeholder="Enter Product Name*" required="">
                    </div>
                    <div class="mb-4">
                        <label for="sNumber" class="block  font-medium">Serial Number <span>*</span></label>
                        <input type="text" id="sNumber" value="{{ $queryString }}" name="barcode_number" class="form-input w-full border px-2 py-2 mt-1 outline-fave-500" placeholder="Enter Serial Number*" readonly required="">
                    </div>
                </div>
                <div class="bg-white p-5 border rounded">
                    <div class="mb-4">
                        <label for="sName" class="block  font-medium">Shop Name <span>*</span></label>
                        <input type="text" id="sName" name="shope_name" class="form-input w-full border px-2 py-2 mt-1 outline-fave-500" placeholder="Enter Shop Name*" required="">
                    </div>

                    <div class="mb-4">
                        <label for="image" class="block  font-medium">Upload Your Invoice <span>*</span></label>
                        <input type="file" id="image" name="invoice_attachment" class="form-input w-full border px-2 py-2 mt-1 outline-fave-500" accept="image/*" required="">
                    </div>

                    <div class="mb-4">
                        <label for="dName" class="block  font-medium">Address</label>
                        <input type="text" id="dName" name="district" class="form-input w-full border px-2 py-2 mt-1 outline-fave-500" placeholder="Full Address*" required="">
                    </div>

                </div>
            </div>
            <div class="py-10">
                <button type="submit" class="font-semibold bg-fave-500 text-white py-2 px-5 rounded float-right w-full sm:w-[200px]">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection

