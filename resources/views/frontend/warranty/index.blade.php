@extends('frontend.layouts.master_frontend')
@section('pageTitle'){{ __('Warranty') }}@endsection
@section('section')
<div class="relative">
    <img src="{{ asset('frontend/images/contact-about-bg.webp') }}" alt="img" class="min-h-[220px] object-cover">
    <div class="absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%]">
        <h2 class="text-[18px] text-center sm:text-[30px] font-bold text-white bg-white/50 py-2 px-5 rounded uppercase">
            CLAIM A WARRANTY</h2>
    </div>
</div>
<div class="mx-auto md:container py-10 ">
    <div class="w-full md:w-[650px] mx-auto">
        <div class="bg-fave-500 py-5 text-center relative">
            <h1 class="text-white sm:text-3xl text-
            xl font-semibold uppercase">Claim Your Warrenty</h1>
            <form action="{{ route('warranty.store') }}" method="POST" id="warrantyForm">
                @csrf
                <div class="mb-4 mx-5">
                    <label for="pNumber" class="block text-white md:text-base text-sm my-2">Please Give Your Phone Number</label>
                    <input type="tel" id="pNumber" name="phone" class=" form-input outline-fave-500 rounded-md w-full md:w-2/3 mx-auto text-sm md:text-base border px-2 md:py-2 py-1 mt-1" placeholder="Enter Your Phone Number*" required="">
                </div>
                <button type="submit" class="bg-fave-900 hover:bg-fave-700 text-white md:w-28 w-20 md:h-10 h-8 font-medium">Submit</button>
            </form>
        </div>
        <div id="resultArea">
        </div>
    </div>
</div>
@endsection

@push('js')
    <script>
        $(document).on('submit', '#warrantyForm', function(e) {
            e.preventDefault();
            var url = $(this).attr('action');
            var data = $(this).serialize();
            $.ajax({
                url:url,
                method:'POST',
                data:data,
                datatype: 'html',
                success:function(data){
                    $('#resultArea').html(data); 
                    toastr.success('Your number matches these products');
                },
                error:function(error){
                    toastr.error('Number Not Found!');
                }
            });
        });
    </script>
@endpush