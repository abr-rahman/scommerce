<div class="bg-fave-500">
    <div class="mx-auto w-full xl:container px-6 text-white py-10">
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
            <div class="rounded bg-white flex items-center gap-5 backdrop-blur-sm p-2">
                <div class="">
                    <svg  style="color: #000" xmlns="http://www.w3.org/2000/svg" class="w-10 sm:w-16" width="70" height="70"
                        viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M4 14v-3a8 8 0 1 1 16 0v3"></path>
                        <path d="M18 19c0 1.657 -2.686 3 -6 3"></path>
                        <path d="M4 14a2 2 0 0 1 2 -2h1a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-1a2 2 0 0 1 -2 -2v-3z">
                        </path>
                        <path d="M15 14a2 2 0 0 1 2 -2h1a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-1a2 2 0 0 1 -2 -2v-3z">
                        </path>
                    </svg>
                </div>
                <div class="grid" style="color: #000">
                    <a href="tel:{{ $siteSettings->first()->phone_one }}"
                        class="text-[18px] md:text-[25px] xl:text-[30px] hover:underline">{{ $siteSettings->first()->phone_one }}</a>
                </div>
            </div>
            <div class="rounded bg-white bg-white flex items-center gap-5 backdrop-blur-sm pl-2 pr-2 py-4 sm:p-2">
                <div class="">
                    {{-- <svg  style="color: #000" xmlns="http://www.w3.org/2000/svg" class="w-10 sm:w-16" width="70" height="70"
                        viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path
                            d="M11.5 21h-2.926a3 3 0 0 1 -2.965 -2.544l-1.255 -8.152a2 2 0 0 1 1.977 -2.304h11.339a2 2 0 0 1 1.977 2.304l-.5 3.248">
                        </path>
                        <path d="M9 11v-5a3 3 0 0 1 6 0v5"></path>
                        <path d="M15 19l2 2l4 -4"></path>
                    </svg> --}}
                    <img src="{{ asset("frontend/images/free-shipping.png") }}" alt="img" class="w-12 sm:w-16">
                </div>
                <div class=""  style="color: #000">
                    <p class="text-[18px] md:text-[25px] xl:text-[30px]">Authentic Product.</p>
                </div>
            </div>
            <div class="rounded bg-white bg-white flex items-center gap-5 backdrop-blur-sm p-2">
                <div class="">
                    <svg  style="color: #000" xmlns="http://www.w3.org/2000/svg" class="w-10 sm:w-16" width="70" height="70"
                        viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M10 20.777a8.942 8.942 0 0 1 -2.48 -.969"></path>
                        <path d="M14 3.223a9.003 9.003 0 0 1 0 17.554"></path>
                        <path d="M4.579 17.093a8.961 8.961 0 0 1 -1.227 -2.592"></path>
                        <path d="M3.124 10.5c.16 -.95 .468 -1.85 .9 -2.675l.169 -.305"></path>
                        <path d="M6.907 4.579a8.954 8.954 0 0 1 3.093 -1.356"></path>
                        <path d="M9 12l2 2l4 -4"></path>
                    </svg>
                </div>
                <div class=""  style="color: #000">
                    <a href="{{ route('warranty.index') }}"
                        class="text-[18px] md:text-[25px] xl:text-[30px]">24 Months
                        Warranty</a>
                </div>
            </div>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5 py-10" style="color: #000;">
            <div>
                <h2 class="text-[18px] pb-8 font-semibold">Corporate Office</h2>
                <div class="grid gap-3">
                    <div class="grid grid-cols-12 gap-5 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="col-span-1" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M4 18h9v-12l-5 2v5l-4 2v-8l9 -4l7 2v13l-7 3z"></path>
                        </svg>
                        <a href="https://maps.app.goo.gl/EmerxnDLt34uufcC7" target="_blank" class="col-span-11">
                            <p>{{ $siteSettings->first()->address_one }}</p>
                        </a>
                    </div>
                    <div class="grid grid-cols-12 gap-5 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="col-span-1" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path
                                d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2">
                            </path>
                            <path d="M15 7a2 2 0 0 1 2 2"></path>
                            <path d="M15 3a6 6 0 0 1 6 6"></path>
                        </svg>
                            <a class="col-span-11" href="https://wa.me/+8801897715225" target="_blank">
                                <p>{{ $siteSettings->first()->phone_one }}</p>
                            </a>
                    </div>
                    <div class="grid grid-cols-12 gap-5 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="col-span-1" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z">
                            </path>
                            <path d="M3 7l9 6l9 -6"></path>
                        </svg>
                        <a href="mailto:{{ $siteSettings->first()->support_email }}" target="_blank" class="col-span-11">
                            <p>{{ $siteSettings->first()->support_email }}</p>
                        </a>
                    </div>
                    <div class="flex items-center gap-2">
                        <a href="{{ $siteSettings->first()->fb_link }}" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" class="hover:text-white" width="24"
                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3">
                                </path>
                            </svg>
                        </a>
                        <a href="{{ $siteSettings->first()->insta_link }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="hover:text-white" width="24"
                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M4 4m0 4a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z">
                                </path>
                                <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                                <path d="M16.5 7.5l0 .01"></path>
                            </svg>
                        </a>
                        <a href="{{ $siteSettings->first()->youtube_link }}" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" class="hover:text-white" width="24"
                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M2 8a4 4 0 0 1 4 -4h12a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-12a4 4 0 0 1 -4 -4v-8z">
                                </path>
                                <path d="M10 9l5 3l-5 3z"></path>
                            </svg>
                        </a>
                        <a href="{{ $siteSettings->first()->linkedin_link }}" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" class="hover:text-white" width="24"
                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z">
                                </path>
                                <path d="M8 11l0 5"></path>
                                <path d="M8 8l0 .01"></path>
                                <path d="M12 16l0 -5"></path>
                                <path d="M16 16v-3a2 2 0 0 0 -4 0"></path>
                            </svg>
                        </a>
                        <a href="{{ $siteSettings->first()->tiktok_link }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="hover:text-white" width="24"
                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M21 7.917v4.034a9.948 9.948 0 0 1 -5 -1.951v4.5a6.5 6.5 0 1 1 -8 -6.326v4.326a2.5 2.5 0 1 0 4 2v-11.5h4.083a6.005 6.005 0 0 0 4.917 4.917z">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="">
                <h2 class="text-[18px] pb-8 font-semibold">Important Link</h2>
                <div class="grid gap-3">
                    <a href="{{ route('dealerships.register') }}" class="hover:text-white">Become A Dealer</a>
                    {{-- <a href="{{ route('product.verify') }}" class="hover:text-white">Verify Your Product</a> --}}
                    <a href="{{ route('frontend.refund.policy') }}" class="hover:text-white">Return & Refund Policy</a>
                    <a href="{{ route('frontend.warranty.policy') }}" class="hover:text-white">Warranty Policy</a>
                    <a href="{{ route('warranty.index') }}" class="hover:text-white">Claim a Warranty</a>
                    <a href="{{ route('frontend.privacy.policy') }}" class="hover:text-white">Privacy Policy</a>
                    <a href="{{ route('frontend.terms') }}" class="hover:text-white">Terms & Conditions</a>
                    <a href="{{ route('frontend.career.index') }}" class="hover:text-white">Careers</a>
                </div>
            </div>
            <div class="">
                <h2 class="text-[18px] pb-3 sm:pb-8 font-semibold text-center sm:text-left">Location</h2>
                {{-- <img src="{{ asset('frontend/images/we-accept.jpg') }}" alt="" srcset=""> --}}
                <iframe
                    src="{{ $siteSettings->first()->location_link }}"
                    width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
        <div class="flex flex-wrap items-center justify-center gap-5 md:justify-between">
            <p class="text-xs text-center">© 2023 Salamat Innovation | All Rights Reserved. Trade Lisence No- TRAD/DNCC/013835/2022 DBID No- Applied. | Developed By
                <a href="https://www.zealtechbd.com/" target="__blank"
                    class="underline font-semibold">ZealtechBD</a>
            </p>
        </div>
    </div>
</div>
