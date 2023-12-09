@extends('frontend.layouts.master_frontend')
@section('pageTitle'){{ __('About Us') }}@endsection
@section('section')
<div class="mx-auto w-full xl:container px-6 py-10">
    {{-- <div class=" py-14">
        <div class="grid items-center grid-cols-1 xl:grid-cols-2 gap-5 2xl:gap-10">
            <div class="flex items-center xl:items-start flex-col gap-5 md:gap-8">
                <h2 class="uppercase text-[20px] md:text-[22px] lg:text-[30px] xl:text-[40px] font-bold text-center lg:text-left leading-[40px] lg:leading-[60px]">
                    ABOUT US</h2>
                <p class="text-[16px] text-justify"><b class="font-semibold">VOLTME</b> believes being at the
                    forefront of
                    innovation is
                    the key to sustainability. Technology and discovery are key agents driving our world
                    forward. We
                    continue to push enginnering limits in expanding upon key technologies beyond what they can
                    do
                    and ask how can it apply to our lives, how it can affect us, and how we can make it better.
                </p>
                <img src="{{ asset('frontend/images/about-voltme.webp') }}" alt="img" class="w-full">
            </div>
            <div class="grid sm:grid-cols-2 gap-5 2xl:gap-10">
                <div class="text-center border p-5 2xl:p-10 grid gap-5 shadow-xl rounded-xl">
                    <svg width="60" height="60" viewBox="0 -0.5 25 25" fill="none" class="mx-auto bg-fave-50 p-2 rounded" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.46 1.507a2 2 0 0 1 3.084 0l1.2 1.453a2 2 0 0 0 1.735.717l1.878-.182A2 2 0 0 1 20.54 5.68l-.18 1.851a2 2 0 0 0 .722 1.741l1.441 1.181a2 2 0 0 1 0 3.094l-1.44 1.18a2 2 0 0 0-.723 1.742l.18 1.851a2 2 0 0 1-2.183 2.185l-1.878-.182a2 2 0 0 0-1.734.717l-1.2 1.453a2 2 0 0 1-3.084 0l-1.2-1.453a2 2 0 0 0-1.735-.717l-1.878.182a2 2 0 0 1-2.183-2.185l.18-1.851a2 2 0 0 0-.722-1.741l-1.44-1.181a2 2 0 0 1 0-3.094l1.44-1.18a2 2 0 0 0 .723-1.742l-.18-1.851a2 2 0 0 1 2.182-2.185l1.878.182a2 2 0 0 0 1.735-.717l1.2-1.453Z" stroke="#ff9900" stroke-width="1.5"></path>
                        <path d="m8.125 12.773 2.289 2.279a1 1 0 0 0 1.504-.107l3.962-5.262" stroke="#ff9900" stroke-width="1.5" stroke-linecap="round"></path>
                    </svg>
                    <h2 class="text-2xl font-semibold">Extended Warranty</h2>
                    <p class="">After your purchase &amp; registered your product in our website, you will receive
                        extended warranty coverage.</p>
                </div>
                <div class="text-center border p-10 grid gap-5 shadow-xl rounded-xl">
                    <svg width="60" height="60" class="mx-auto bg-fave-50 p-2 rounded" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 0s-1.677-.03-2.854 1.146l-3.5 3.5a4.045 4.045 0 0 0-.996 1.57c-.067.204-.05.226-.07.364-.138.02-.16.003-.363.07a4.045 4.045 0 0 0-1.57.996l-1 1a.5.5 0 0 0 0 .708l.544.544-5.183 5.186-1.42.662a.5.5 0 0 0-.215.193L.172 17.91a.5.5 0 0 0-.113.214.5.5 0 0 0 0 .002.5.5 0 0 0-.008.033.5.5 0 0 0 .246.547l.994.992a.5.5 0 0 0 .537.254.5.5 0 0 0 .26-.12l1.973-1.204a.5.5 0 0 0 .193-.215l.662-1.42 5.184-5.185.546.547a.5.5 0 0 0 .708 0l1-1a4.07 4.07 0 0 0 .996-1.57c.067-.204.05-.226.07-.364.138-.02.16-.003.363-.07a4.045 4.045 0 0 0 1.57-.996l3.5-3.5C20.03 3.677 20 2 20 2a.5.5 0 0 0-.146-.354l-.75-.75-.75-.75A.5.5 0 0 0 18 0zm-.18 1.027.576.577.577.576c-.016.252-.1 1.24-.827 1.966l-3.5 3.5a2.99 2.99 0 0 1-1.18.754c-.311.104-.466.1-.466.1a.5.5 0 0 0-.5.5s.004.155-.1.467a3.015 3.015 0 0 1-.754 1.18l-.646.646-1.146-1.147L8.707 9l.647-.646a2.99 2.99 0 0 1 1.18-.754c.311-.104.466-.1.466-.1a.5.5 0 0 0 .5-.5s-.004-.155.1-.467a3.01 3.01 0 0 1 .754-1.18l3.5-3.5c.726-.726 1.714-.81 1.966-.826zm-8.922 9.578.248.249.247.246-5.247 5.246a.5.5 0 0 0-.1.142l-.636 1.364-1.584.966-.644-.644.966-1.584 1.364-.637a.5.5 0 0 0 .14-.1l5.246-5.248z" style="fill:#ff9900;fill-opacity:1;stroke:none;stroke-width:0"></path>
                    </svg>

                    <h2 class="text-2xl font-semibold">Hassle-Free Repair</h2>
                    <p class="">All products purchased from VOLTME come with a hassle-free warranty. You can
                        find the precise warranty period of your product on the literature inside its box.</p>
                </div>
                <div class="text-center border p-10 grid gap-5 shadow-xl rounded-xl">
                    <svg width="60" height="60" class="mx-auto bg-fave-50 p-2 rounded" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.5 14.49v.5h.5v-.5h-.5Zm-10 0H0v.5h.5v-.5Zm14 .01v.5h.5v-.5h-.5ZM8 3.498a2.499 2.499 0 0 1-2.5 2.498v1C7.433 6.996 9 5.43 9 3.498H8ZM5.5 5.996A2.499 2.499 0 0 1 3 3.498H2a3.499 3.499 0 0 0 3.5 3.498v-1ZM3 3.498A2.499 2.499 0 0 1 5.5 1V0A3.499 3.499 0 0 0 2 3.498h1ZM5.5 1A2.5 2.5 0 0 1 8 3.498h1A3.499 3.499 0 0 0 5.5 0v1Zm5 12.99H.5v1h10v-1Zm-9.5.5v-1.995H0v1.995h1Zm2.5-4.496h4v-1h-4v1Zm6.5 2.5v1.996h1v-1.996h-1Zm-2.5-2.5a2.5 2.5 0 0 1 2.5 2.5h1a3.5 3.5 0 0 0-3.5-3.5v1Zm-6.5 2.5a2.5 2.5 0 0 1 2.5-2.5v-1a3.5 3.5 0 0 0-3.5 3.5h1ZM14 13v1.5h1V13h-1Zm.5 1H12v1h2.5v-1ZM12 11a2 2 0 0 1 2 2h1a3 3 0 0 0-3-3v1Zm-.5-3A1.5 1.5 0 0 1 10 6.5H9A2.5 2.5 0 0 0 11.5 9V8ZM13 6.5A1.5 1.5 0 0 1 11.5 8v1A2.5 2.5 0 0 0 14 6.5h-1ZM11.5 5A1.5 1.5 0 0 1 13 6.5h1A2.5 2.5 0 0 0 11.5 4v1Zm0-1A2.5 2.5 0 0 0 9 6.5h1A1.5 1.5 0 0 1 11.5 5V4Z" fill="#ff9900"></path>
                    </svg>
                    <h2 class="text-2xl font-semibold">VOLTME Expert Support</h2>
                    <p class="">We stand for fair and affordable pricing policy and we have very beneficial
                        regular discounts.</p>
                </div>
                <div class="text-center border p-10 grid gap-5 shadow-xl rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" class="mx-auto bg-fave-50 p-2 rounded" viewBox="0 0 38 32" xml:space="preserve">
                        <g fill="#ff9900">
                            <path d="M6.502 22H8v-.004c0 .002.274.002.3.001 2.018-.11 12.446-.315 18.67 5.649l.048.044c.112.108.233.203.342.315l.006.004c.983.882 2.082 1.386 3.255 1.386 4.201 0 7.37-6.319 7.37-14.698C37.991 6.319 34.822 0 30.621 0c-1.138 0-2.207.473-3.168 1.305C19.028 8.569 8.526 8.997 8.437 9H6.472C2.782 9 0 11.648 0 15.161v.196C0 18.958 2.978 22 6.502 22zm30.489-7.302c0 7.553-2.857 13.698-6.37 13.698-3.577 0-6.599-6.273-6.599-13.698C24.022 7.273 27.044 1 30.621 1c3.512 0 6.37 6.145 6.37 13.698zM8.453 10c.097 0 8.733-.348 16.772-5.745-1.368 2.645-2.203 6.32-2.203 10.443 0 4.006.793 7.581 2.093 10.207-6.424-4.175-14.8-4.006-16.684-3.905H7.369c-.373-1.291-1.546-6-.006-11h1.09zM1 15.161c0-2.894 2.281-5.076 5.324-5.147-1.402 4.784-.456 9.308.001 10.977C3.421 20.89 1 18.354 1 15.356v-.195z"></path>
                            <path d="M25.5 11H25a.5.5 0 0 0 0 1h.5c1.425 0 2.5 1.032 2.5 2.429C28 15.847 26.878 17 25.5 17H25a.5.5 0 0 0 0 1h.5c1.93 0 3.5-1.602 3.5-3.599C29 12.494 27.462 11 25.5 11zm-17 12.5a.5.5 0 0 0-.5.5v3.951C8 30.184 9.794 32 12 32s4-1.816 4-4.049V24a.5.5 0 0 0-1 0v3.951C15 29.632 13.654 31 12 31s-3-1.368-3-3.049V24a.5.5 0 0 0-.5-.5z"></path>
                        </g>
                    </svg>
                    <h2 class="text-2xl font-semibold">VIP Program</h2>
                    <p class="">Reward Program designed for VOLTME members to earn points, redeem rewards,
                        receive exclusive promotions.</p>
                </div>
            </div>
        </div>
    </div> --}}
    <div class=" py-14">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
            <div class="flex items-center xl:items-start flex-col gap-5 md:gap-8">
                <h2 class="uppercase  tracking-[.50em] font-[500] ">
                    ABOUT US
                </h2>
                <h1 class="uppercase text-[20px] md:text-[22px] lg:text-[30px] xl:text-[40px] font-bold text-center lg:text-left leading-[40px] lg:leading-[60px]">
                    We Are Shaping <br> The Future</h1>
                <p class="text-[16px] text-justify"><b class="font-semibold">VOLTME</b> believes being at the
                    forefront of
                    innovation is
                    the key to sustainability. Technology and discovery are key agents driving our world
                    forward. We
                    continue to push enginnering limits in expanding upon key technologies beyond what they can
                    do
                    and ask how can it apply to our lives, how it can affect us, and how we can make it better.
                </p>
            </div>
            <div class="">
                <img src="{{ asset('frontend/images/about-voltme.webp') }}" alt="img" class="!w-full" style="box-shadow: 12px 12px rgb(211, 211, 211)">
            </div>
        </div>
    </div>
    <div class="flex flex-wrap gap-10 py-10">
        <div class="flex flex-col gap-2 flex-1">
            <div class="flex gap-3 items-center">
                <h2 class="text-[140px] leading-none font-bold text-theme-secondary-300">1</h2>
                <div class="">
                    <h2 class="text-[25px] font-medium">PIONEER IN</h2>
                    <h2 class="text-[25px] font-medium">GaN Charger</h2>
                </div>
            </div>
            <p class="text-justify">The <b class="font-semibold">VOLTME</b> GaN chargers enable 3x faster
                charging in half
                the size and weight of
                old, slow silicon-based solutions and with up to 40% improvement in enery savings. We never
                satisfied with what it has achieved so far on charging solutions. The way towards future is
                paved
                with continuous development.</p>
        </div>
        <div class="flex flex-col gap-2 flex-1">
            <div class="flex gap-3 items-center">
                <h2 class="text-[140px] leading-none font-bold text-theme-secondary-300">2</h2>
                <div class="">
                    <h2 class="text-[25px] font-medium">V-DYNAMIC</h2>
                    <h2 class="text-[25px] font-medium">Technology</h2>
                </div>
            </div>
            <p class="text-justify"><b class="font-semibold">V-Dynamic Charging Technology</b>
                Smart Intelligent Device Detection
                The V-Dynamic (VD) smart charging chips deliver high-performance in a power efficient design,
                making it easier for any connected device to enable and optimized charging speed. This
                innovative technology works with Apple, Samsung, Huawei, and so much more.</p>
        </div>
        <div class="flex flex-col gap-2 flex-1">
            <div class="flex gap-3 items-center">
                <h2 class="text-[140px] leading-none font-bold text-theme-secondary-300">3</h2>
                <div class="">
                    <h2 class="text-[25px] font-medium ">VOLTCARE</h2>
                    <h2 class="text-[25px] font-medium">24/7 Support
                    </h2>
                </div>
            </div>
            <p class="text-justify"><b class="font-semibold">VOLTCARE</b> 24/7 has exclusive technical service
                channels
                to provide support, including online chat and call support. Your requests will be transferred to
                Voltcare service channels to provide you with express RMA &amp; technical support service. </p>
        </div>
    </div>
</div>
@endsection