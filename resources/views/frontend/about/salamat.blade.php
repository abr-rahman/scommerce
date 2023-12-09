@extends('frontend.layouts.master_frontend')
@section('pageTitle'){{ __('About Us') }}@endsection
@section('section')
<div class="mx-auto w-full xl:container px-6 py-10">
    <div class=" sm:py-14">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
            <div class="flex items-center xl:items-start flex-col gap-5 md:gap-8">
                <h2 class="uppercase  tracking-[.50em] font-[500] ">
                    ABOUT US
                </h2>
                <h2 class="uppercase text-[20px] md:text-[22px] lg:text-[30px] xl:text-[40px] font-bold text-center lg:text-left leading-[40px] lg:leading-[60px]">"Inspired by Imagination,
                    <br>Driven by Innovation."</h2>
                <p class="text-[16px] text-justify">Salamat Innovation is a dynamic electronics distribution company headquartered in Bangladesh. Founded with a vision to bring cutting-edge technology to the fingertips of consumers, Salamat Innovation is committed to providing high-quality electronic products to meet the evolving needs of the market. <br> <br> Salamat Innovation's mission is to be a trailblazer in the electronics distribution industry in Bangladesh. We are dedicated to democratizing access to cutting-edge technology, making it available to people from all walks of life. Our aim is to empower individuals with innovative and reliable electronic products, enhancing their daily lives and fostering a culture of technological advancement. We are committed to providing a diverse range of high-quality products that inspire creativity, connectivity, and convenience.</p>
            </div>
            <div class="">
                <img src="{{ asset('frontend/images/about-salamat.webp') }}" alt="img" class="!w-full" style="box-shadow: 12px 12px rgb(211, 211, 211)">
            </div>
        </div>
    </div>
    {{-- <div class="flex flex-wrap gap-10 py-10">
        <div class="flex flex-col gap-2 flex-1">
            <div class="flex gap-3 items-center">
                <h2 class="text-[140px] leading-none font-bold text-theme-secondary-300">1</h2>
                <div class="">
                    <h2 class="text-[25px] font-medium ">PIONEER IN</h2>
                    <h2 class="text-[25px] font-medium">GaN Charger</h2>
                </div>
            </div>
            <p class="text-justify">The <b class="font-semibold">VOLTME</b> GaN chargers enable 3x faster
                charging in half
                the size and weight of
                old, slow silicon-based solutions and with up to 40% improvement in enery savings. We never
                satisfied with what it has achieved so far on charging solutions. The way towards future is
                paved
                with continuous development. </p>
        </div>
        <div class="flex flex-col gap-2 flex-1">
            <div class="flex gap-3 items-center">
                <h2 class="text-[140px] leading-none font-bold text-theme-secondary-300">2</h2>
                <div class="">
                    <h2 class="text-[25px] font-medium ">V-DYNAMIC
                    </h2>
                    <h2 class="text-[25px] font-medium">Technology
                    </h2>
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
    </div> --}}
</div>
@endsection
