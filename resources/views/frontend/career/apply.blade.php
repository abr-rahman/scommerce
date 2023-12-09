@extends('frontend.layouts.master_frontend')
@section('pageTitle'){{ __('Career') }}@endsection
@section('section')
<div class="relative">
    <img src="{{ asset('frontend/images/contact-about-bg.webp') }}" alt="img" class="min-h-[220px] object-cover">
    <div class="absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%]">
        <h2 class="text-[18px] text-center sm:text-[30px] font-bold text-white bg-white/50 py-2 px-5 rounded uppercase">Careers</h2>
    </div>
</div>
<div class="mx-auto w-full xl:container px-2 py-10">
    <div class="py-6">
        <div class="container w-full md:w-[90%] lg:w-[80%] mx-auto pt-10 md:px-10">
            <div class="border-b flex gap-1 items-center pb-4">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="text-2xl text-fave-500" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                    <g>
                        <path fill="none" d="M0 0h24v24H0z"></path>
                        <path d="M17.084 15.812a7 7 0 1 0-10.168 0A5.996 5.996 0 0 1 12 13a5.996 5.996 0 0 1 5.084 2.812zM12 23.728l-6.364-6.364a9 9 0 1 1 12.728 0L12 23.728zM12 12a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"></path>
                    </g>
                </svg>
                <h2 class="text-lg text-fave-500 font-semibold">Apply Here</h2>
            </div>
            <div class="container w-full lg:w-[90%] my-10 shadow-lg rounded-xl md:p-5 p-3 py-3 mx-auto border sm:border-0">
                <form method="POST" action="{{ route('career.apply_store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mx-auto w-full grid grid-cols-1 gap-6">
                        <div class=" mx-auto w-full md:mx-0 "><label class="text-[1rem] font-medium text-textColor" for="">Name <span class="text-red-600">*</span></label>
                            <input type="text" name="name" placeholder="Enter Your name" class="w-full outline-none px-[0.8rem] text-sm py-[0.5rem] rounded-full border border-gray-300" value="">
                            <p class="text-sm text-red-500">Enter your name</p>
                        </div>
                        <div class="mx-auto w-full md:mx-0 "><label class="text-[1rem] font-medium text-textColor" for="">Email <span class="text-red-600">*</span></label>
                            <input type="text" name="email" placeholder="Enter Your Email" class="w-full outline-none px-[0.8rem] text-sm py-[0.5rem] rounded-full border border-gray-300" value=""></div>
                        <div class="mx-auto w-full md:mx-0 ">
                            <label class="text-[1rem] font-medium text-textColor" for="">Phone <span class="text-red-600">*</span></label>
                            <input type="text" name="phone" placeholder="Enter Your Phone Number" class="w-full outline-none text-sm px-[0.8rem] py-[0.5rem] rounded-full border border-gray-300" value="">
                        </div>
                        <div class="mx-auto w-full md:mx-0">
                            <label class="text-[1rem] font-medium text-textColor" for="">Choose Your <span class="text-red-600">*</span></label>
                            <div class=" text-sm px-[0.8rem] py-[0.5rem] rounded-full border border-gray-300">
                                <select name="deparment" class="w-full outline-none">
                                    <option value="">Choose Department</option>
                                    <option value="administrative">Administrative assistant</option>
                                    <option value="operating_officer">Chief Operating Officer</option>
                                    <option value="management">Office management</option>
                                </select>
                            </div>
                        </div>
                        <div class="grid gap-5 md:flex md:gap-x-4">
                            <div class="mx-auto w-full md:mx-0">
                                <label class="text-[1rem] font-medium text-gray-700 ">Photo <span class="text-xs text-gray-400">(Max 1mb)</span> <span class="text-red-600">*</span></label>
                                <div class="flex items-center gap-x-4">
                                    <label class="w-full bg-white md:w-[80%] border text-sm whitespace-nowrap outline-none px-[0.8rem] py-[0.5rem] rounded-full border-gray-300" for="photo">
                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" class="text-fave-500 text-lg inline-block mr-1 text-prborder-fave-500" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"></path>
                                            <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z"></path>
                                        </svg>Choose Image</label>
                                    <input type="file" name="photo" onchange="displayImage(event)" class="hidden invisible" id="photo">
                                    <div class="">
                                        <img src="https://picsum.photos/200" alt="img" id="displayImg" class="w-12 h-12 rounded-full object-contain">
                                    </div>
                                </div>
                            </div>
                            <div class="mx-auto w-full md:mx-0 "><label class="text-[1rem] font-medium text-textColor" for="">Gender <span class="text-red-600">*</span></label>
                                <div class=" text-sm px-[0.8rem] py-[0.5rem] rounded-full border border-gray-300">
                                    <select name="gender" class="w-full outline-none">
                                        <option value="">Choose Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <p class="text-sm text-red-500">Enter your gender</p>
                            </div>
                            <div class="mx-auto w-full md:mx-0 ">
                                <label class="text-[1rem] font-medium text-textColor" for="">Age <span class="text-red-600">*</span></label>
                                <input type="number" name="age" placeholder="Enter Your Age" class="w-full outline-none text-sm px-[0.8rem] py-[0.5rem] rounded-full border border-gray-300" value="">
                                <p class="text-sm text-red-500">Enter your age</p>
                            </div>
                        </div>
                        <div class="mx-auto w-full md:mx-0 "><label class="text-[1rem] font-medium text-textColor" for="">Skills <span class="text-red-600">*</span></label>
                            <textarea name="skills" rows="4" placeholder="Enter Your Skills" class="w-full outline-none text-sm px-[0.8rem] py-[0.5rem] rounded-md border border-gray-300"></textarea>
                            <p class="text-sm text-red-500">Enter your skills</p>
                        </div>
                        <div class="mx-auto w-full md:mx-0 "><label class="text-[1rem] font-medium text-textColor" for="">Why Do You Want To Join with Us <span class="text-red-600">*</span></label>
                            <textarea type="text" name="reason_of_join" rows="4" placeholder="Why Do You Want To Join with Us" class="w-full outline-none px-[0.8rem] text-sm py-[0.5rem] rounded-md border border-gray-300"></textarea>
                            <p class="text-sm text-red-500">Enter the reason of join with us</p>
                        </div>
                        <div class="mx-auto w-full md:mx-0 "><label class="text-[1rem] font-medium text-textColor" for="">Which Things Sets You Apart From Other<span class="text-red-600">*</span></label>
                            <textarea type="text" name="choos_reason" rows="4" placeholder="Which Things Sets You Apart From Other" class="w-full outline-none px-[0.8rem] text-sm py-[0.5rem] rounded-md border border-gray-300"></textarea>
                        </div>
                        <div class="mx-auto w-full md:mx-0 ">
                            <label class="text-[1rem] font-medium text-gray-700">Drop Your CV/Resume Here <span class="text-gray-400 text-sm">(max 3mb)</span>
                                <span class="text-red-600">*</span></label>
                            <div class="text-textColor placeholder-transparent rounded-md placeholder:text-3xl flex items-center gap-x-4"><label class="w-full  border text-sm whitespace-nowrap outline-none px-[0.8rem] py-[0.5rem] rounded-full border-gray-300" for="cv"><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" class="inline-block mr-1 text-prborder-fave-500" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M531.3 574.4l.3-1.4c5.8-23.9 13.1-53.7 7.4-80.7-3.8-21.3-19.5-29.6-32.9-30.2-15.8-.7-29.9 8.3-33.4 21.4-6.6 24-.7 56.8 10.1 98.6-13.6 32.4-35.3 79.5-51.2 107.5-29.6 15.3-69.3 38.9-75.2 68.7-1.2 5.5.2 12.5 3.5 18.8 3.7 7 9.6 12.4 16.5 15 3 1.1 6.6 2 10.8 2 17.6 0 46.1-14.2 84.1-79.4 5.8-1.9 11.8-3.9 17.6-5.9 27.2-9.2 55.4-18.8 80.9-23.1 28.2 15.1 60.3 24.8 82.1 24.8 21.6 0 30.1-12.8 33.3-20.5 5.6-13.5 2.9-30.5-6.2-39.6-13.2-13-45.3-16.4-95.3-10.2-24.6-15-40.7-35.4-52.4-65.8zM421.6 726.3c-13.9 20.2-24.4 30.3-30.1 34.7 6.7-12.3 19.8-25.3 30.1-34.7zm87.6-235.5c5.2 8.9 4.5 35.8.5 49.4-4.9-19.9-5.6-48.1-2.7-51.4.8.1 1.5.7 2.2 2zm-1.6 120.5c10.7 18.5 24.2 34.4 39.1 46.2-21.6 4.9-41.3 13-58.9 20.2-4.2 1.7-8.3 3.4-12.3 5 13.3-24.1 24.4-51.4 32.1-71.4zm155.6 65.5c.1.2.2.5-.4.9h-.2l-.2.3c-.8.5-9 5.3-44.3-8.6 40.6-1.9 45 7.3 45.1 7.4zm191.4-388.2L639.4 73.4c-6-6-14.1-9.4-22.6-9.4H192c-17.7 0-32 14.3-32 32v832c0 17.7 14.3 32 32 32h640c17.7 0 32-14.3 32-32V311.3c0-8.5-3.4-16.7-9.4-22.7zM790.2 326H602V137.8L790.2 326zm1.8 562H232V136h302v216a42 42 0 0 0 42 42h216v494z"></path>
                                    </svg>Choose Pdf</label>
                            <input type="file" name="cv" class="hidden invisible" id="cv">
                        </div>
                        </div>
                    </div>
                    <div class="mx-auto w-full md:mx-0  flex justify-center gap-x-4 items-center pt-10">
                        <button type="submit" class=" text-center flex justify-center items-center text-white px-7 py-2 border hover:border-fave-500 rounded-full transition-all duration-[0.3s] hover:text-fave-500 bg-fave-500 hover:bg-transparent">Submit</button></div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
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