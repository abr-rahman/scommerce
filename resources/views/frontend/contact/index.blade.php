@extends('frontend.layouts.master_frontend')
@section('pageTitle'){{ __('Contact') }}@endsection
@section('section')

<div class="relative">
    <img src="{{ asset('frontend/images/contact-about-bg.webp') }}" alt="img" class="min-h-[220px] object-cover">
    <div class="absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%]">
        <h2 class="text-[18px] text-center sm:text-[30px] font-bold text-white bg-white/50 py-2 px-5 rounded uppercase">CONTACT US</h2>
    </div>
</div>
<div class="mx-auto w-full xl:container px-6 py-10">
    <div class="grid lg:grid-cols-2 gap-10">
        <div class="grid gap-5">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14603.264874658285!2d90.4249061!3d23.7895579!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7bdace19033%3A0x1537c1709d64b620!2sSalamat%20Innovation!5e0!3m2!1sen!2sbd!4v1695705657651!5m2!1sen!2sbd" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <div class="grid gap-5">
                <h2 class="font-bold text-slate-700">Contact Details</h2>
                <div class="grid gap-2">
                    <div class="grid sm:flex gap-2 sm:gap-10">
                        <div class="grid grid-cols-12 sm:flex sm:items-center gap-3 ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-slate-700 col-span-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2">
                                </path>
                                <path d="M15 7a2 2 0 0 1 2 2"></path>
                                <path d="M15 3a6 6 0 0 1 6 6"></path>
                            </svg>
                            <p class="col-span-11">{{ $siteSettings->first()->phone_one }}</p>
                        </div>
                        <div class="grid grid-cols-12 sm:flex sm:items-center gap-3 ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-slate-700 col-span-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z">
                                </path>
                                <path d="M3 7l9 6l9 -6"></path>
                            </svg>
                            <p class="col-span-11">{{ $siteSettings->first()->support_email }}</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 sm:flex sm:items-center gap-3 ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-slate-700 col-span-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M4 18h9v-12l-5 2v5l-4 2v-8l9 -4l7 2v13l-7 3z"></path>
                        </svg>
                        <p class="col-span-11">{{ $siteSettings->first()->address_one }}</p>
                    </div>
                </div>
                {{-- <div class="grid sm:grid-cols-2 justify-between gap-5">
                    <div class="grid gap-3">
                        <h2 class=" font-bold text-slate-700">Opening Hours</h2>
                        <p class="">Monday to Friday: 9am-9pm</p>
                        <p class="">Saturday to Sunday: 9am-10pm</p>
                    </div>
                    <div class="grid gap-3">
                        <h2 class=" font-bold text-slate-700">Careers</h2>
                        <p class="">If you’re interested in employment please email us: {{ $siteSettings->first()->email }}</p>
                    </div>
                </div> --}}
            </div>
            <div class=""></div>
        </div>

        <div class="flex flex-col gap-5">
            <h2 class="text-2xl">Leave Us a Message
            </h2>
            <p>Your email address will not be published. Required fields are marked *
            </p>
            <div class="grid gap-3">
                <form action="{{ route('contact.store') }}" method="post">
                    @csrf
                    <div class="grid sm:grid-cols-2 gap-5">
                        <div class="grid gap-2">
                            <p>Name *</p>
                            <input type="text" placeholder="Enter Your Name" name="name" class="outline-none border p-2" required>
                        </div>
                        <div class="grid gap-2">
                            <p>Email *</p>
                            <input type="text" placeholder="Enter Your Email" name="email" class="outline-none border p-2" required>
                        </div>
                    </div>
                    <div class="grid gap-2">
                        <p>Subject </p>
                        <input type="text" placeholder="Enter Your Subject" name="subject" class="outline-none border p-2">
                    </div>
                    <div class="grid gap-2">
                        <p>Your Message </p>
                        <textarea name="message" cols="10" rows="10" placeholder="Type here..." class="outline-none border p-2 w-full"></textarea>
                    </div>
                    <div>
                        <button class="py-2 px-5 bg-fave-500 font-bold text-white rounded border-b-2 border-fave-500 hover:border-fave-700 mt-2">Send
                            Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection