@extends('frontend.layouts.master_frontend')
@section('pageTitle'){{ __('Claim Warranty') }}@endsection
@section('section')
<div class="relative">
    <img src="{{ asset('frontend/images/contact-about-bg.webp') }}" alt="img" class="min-h-[220px] object-cover">
    <div class="absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%]">
        <h2 class="text-[18px] text-center sm:text-[30px] font-bold text-white bg-white/50 py-2 px-5 rounded uppercase">
            CLAIM A WARRANTY</h2>
    </div>
</div>
<div class="mx-auto md:container py-10 ">
    <div class="my-20">
        <div class="bg-fave-500 py-3 px-5">
            <p class="text-white text-center sm:text-3xl text-xl uppercase font-medium">Our warrenty form</p>
        </div>
        <div class="xl:flex gap-5 px-5">
                <div class="xl:w-1/2 w-full my-10 border">
                    <div class="grid grid-cols-2 border-b items-center">
                        <div>
                            <p class="px-6 py-4 text-xs sm:text-base font-semibold tracking-wider">
                                Name:
                            </p>
                        </div>
                        <div>
                            <p class="px-6 py-4 text-xs sm:text-base break-wordsl tracking-wider">
                                {{ $warrantyList->name }}
                            </p>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 border-b items-center">
                        <div>
                            <p class="px-6 py-4 text-xs sm:text-base font-semibold tracking-wider">
                                Phone Number:
                            </p>
                        </div>
                        <div>
                            <p class="px-6 py-4 text-xs sm:text-base break-all tracking-wider">
                                {{ $warrantyList->phone }}
                            </p>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 border-b items-center">
                        <div>
                            <p class="px-6 py-4 text-xs sm:text-base font-semibold tracking-wider">
                                Product ID:
                            </p>
                        </div>
                        <div>
                            <p class="px-6 py-4 text-xs sm:text-base break-all tracking-wider">
                                {{ $warrantyList->product->product_code }}
                            </p>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 border-b items-center">
                        <div>
                            <p class="px-6 py-4 text-xs sm:text-base font-semibold tracking-wider">
                                Bought from:
                            </p>
                        </div>
                        <div>
                            <p class="px-6 py-4 text-xs sm:text-base break-all  tracking-wider">
                                {{ $warrantyList->created_at }}
                            </p>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 border-b items-center">
                        <div>
                            <p class="px-6 py-4 text-xs sm:text-base font-semibold tracking-wider">
                                Product Type:
                            </p>
                        </div>
                        <div>
                            <p class="px-6 py-4 text-xs sm:text-base break-alltracking-wider">
                                {{ $warrantyList->product->category->name }}
                            </p>
                        </div>
                    </div>
                </div>
            <form action="{{ route('claim.store') }}" method="POST" class="xl:w-1/2 w-full" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ $warrantyList->id }}" name="verify_id" >
                <input type="hidden" value="{{ $warrantyList->name }}" name="name">
                <input type="hidden" value="{{ $warrantyList->phone }}" name="phone">
                <input type="hidden" value="{{ $warrantyList->product->id }}" name="product_id" >
                <input type="hidden" value="{{ $warrantyList->address }}" name="email" >
                <input type="hidden" value="{{ $warrantyList->barcode_number }}" name="others">

                <div class="">
                    <div class="mt-10 ">
                        <label for="message" class="block font-semibold mb-2">Please Tell us about your problems in details</label>
                        <textarea id="message" name="message" rows="6" class="outline-fave-500 form-input rounded-md w-full mx-auto border px-2 py-2 mt-1" placeholder="Enter your message here"></textarea>
                    </div>
                    <div class="my-5 ">
                        <label class="block font-semibold mb-2">Please attatch images of the changes</label>
                        <div class="md:flex gap-5 items-center justify-between">
                            <div class="sm:flex gap-5 md:w-3/4">
                                <div class="sm:w-1/2 md:w-1/2 w-full">
                                    <label for="file" class="block font-semibold mb-2">Images</label>
                                    <div class="mt-1 md:flex items-center gap-5">
                                        <label class="w-full md:w-1/2 flex flex-col items-center px-4 py-6 bg-white text-blue-700 rounded-lg tracking-wide border border-fave-500 cursor-pointer hover:bg-fave-100">
                                            <svg class="w-6 h-6 text-fave-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                            </svg>
                                            <span class="mt-2 text-base text-fave-500 leading-normal">Upload</span>
                                            <input type="file" onchange="displayImage(event)" class="hidden opacity-0" id="file" name="attachments">
                                        </label>
                                       
                                        <div style="width: 120px;">
                                            <img src="" alt="Images" id="displayImg" class="w-[120px] h-[110px] border border-fave-500 rounded-lg
                                            object-contain	">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5 text-right md:w-1/4">
                                <button type="submit" class="bg-fave-900 hover:bg-fave-700 text-white w-full md:w-32 h-10">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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
                    toastr.success('success');
                },
                error:function(error){
                    toastr.error('Number Not Found!');
                }
            });
        });
    </script>

    <script>
         function displayImage(event) {
            const fileInput = event.target;
            const file = fileInput.files[0];
            const img = document.getElementById('displayImg');

            if (file) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    img.src = e.target.result;
                }

                reader.readAsDataURL(file);
            } else {
                img.src = '';
            }
        }
    </script>
@endpush