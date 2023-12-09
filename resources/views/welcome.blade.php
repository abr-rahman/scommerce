@extends('frontend.layouts.master_frontend')
@section('section')
    <!-- hero slider -->

    <div class="mx-auto w-full xl:container px-6 -z-10">
        <!-- Swiper -->
        <div class="swiper heroSlider select-none ">
            <div class="swiper-wrapper py-10 sm:py-5 !h-auto sm:!h-[60vh] text-gray-700">
                @foreach ($sliders as $slider)
                    <div class="swiper-slide grid sm:!flex items-center gap-5 lg:gap-10 hidden sm:block">
                        <div class="flex-1">
                            <h2 style="line-height: 120%"
                                class="slider-sub-title uppercase text-[24px] font-[400] md:text-[34px] xl:text-[40px] animate__animated animate__bounce">
                                {{ $slider->heading }}
                                {{-- <br> Our <span class="font-semibold text-fave-500">Product</span> --}}
                            </h2>
                            <p class="slider-descriptions text-justify py-5 font-[200]">{!! $slider->paragraph !!}</p>
                            <a href="{{ $slider->url }}"
                                class="slider-button bg-fave-500 py-2 px-5 hover:shadow-lg hover:shadow-fave-100 rounded border-b-2 border-fave-700 text-white font-semibold">
                                @if ($slider->button_type == 1)
                                    Shop Now
                                @else
                                    Coming Soon
                                @endif
                            </a>
                        </div>
                        <div class="flex-1 w-full h-full block">
                            <img src="{{ asset('uploads/slider/' . $slider->image) ?? asset($slider->image) }}"
                                alt="img" class="w-full h-full object-contain">
                        </div>
                    </div>
                    <div class="swiper-slide grid items-center justify-center gap-5 lg:gap-10 block sm:hidden">
                        <h2 style="line-height: 120%"
                            class="slider-sub-title text-center uppercase text-[24px] font-[400] md:text-[34px] xl:text-[40px] animate__animated animate__bounce">
                            {{ $slider->heading }}
                            {{-- <br> Our <span class="font-semibold text-fave-500">Product</span> --}}
                        </h2>
                        <div class="flex-1 w-full h-full block">
                            <img src="{{ asset('uploads/slider/' . $slider->image) ?? asset($slider->image) }}"
                                alt="img" class="w-full h-full object-contain">
                        </div>
                        <p class="slider-descriptions text-center py-5 font-[200]">{!! $slider->paragraph !!}</p>
                        <div class="grid justify-center">
                            <a href="{{ $slider->url }}"
                                class="slider-button bg-fave-500 py-2 px-5 hover:shadow-lg hover:shadow-fave-100 rounded border-b-2 border-fave-700 text-white font-semibold">
                                @if ($slider->button_type == 1)
                                    Shop Now
                                @else
                                    Coming Soon
                                @endif
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <div class="mx-auto w-full xl:container px-6 my-10 text-gray-700">
        <div class="max-w-[800px] mx-auto">
            <h2 class="text-center text-[26px] sm:text-[36px]">Featured Items</h2>
            <p class="text-center font-Exo">Stay charged on the go with our powerful, fast-charging mobile solutions. Power
                up your life with convenience and style!</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-y-10 mt-10">
            @foreach ($products as $product)
                <div class="bg-white pb-5 sm:p-5 grid gap-2 border-b sm:border-b-0 sm:border-r ">
                    <div class="flex justify-between">
                        <a href="{{ route('categories.wise_page', $product->category->id) }}"
                            class="text-sm hover:text-fave-500">{{ $product->category->name }}</a>
                        @if ($product->status != App\Enums\ProductStatus::Comming->value)
                            <form action="{{ route('add.wishlist', $product->id) }}" method="post" id="addWishList">
                                @csrf
                                <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="hover:text-fave-500" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="1.3" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path
                                            d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572">
                                        </path>
                                    </svg>
                                </button>
                            </form>
                        @endif
                    </div>
                    <a href="{{ route('frontend.product.details', ['slug' => $product->slug, 'id' => $product->id]) }}">
                        @if ($product->product_image == 'default-product-image.png')
                            <img src="{{ asset('default/' . $product->product_image) }}" alt="product-img"
                                class="w-full max-h-[220px] object-contain">
                        @else
                            <img src="{{ asset('uploads/product/' . $product->product_image) }}" alt="product-img"
                                class="w-full max-h-[220px] object-contain">
                        @endif
                    </a>
                    <div class="flex">
                        @php
                            $ratings = App\Models\Review::where('product_id', $product->id)
                                ->where('status', App\Enums\StatusEnum::Active->value)
                                ->pluck('rating');
                            $averageRating = $ratings->isEmpty() ? 0 : $ratings->avg();
                        @endphp
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $averageRating)
                                <svg xmlns="http://www.w3.org/2000/svg" class="text-yellow-300" width="16"
                                    height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path
                                        d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"
                                        stroke-width="0" fill="currentColor"></path>
                                </svg>
                            @endif
                        @endfor
                    </div>
                    <a href="{{ route('frontend.product.details', ['slug' => $product->slug, 'id' => $product->id]) }}"
                        class="line-clamp-2 text-sm hover:text-fave-500 cursor-pointer">{{ $product->product_name }}</a>
                    @if ($product->status == App\Enums\ProductStatus::Comming->value)
                        <button
                            class="slider-button bg-fave-500 px-5 py-2 hover:shadow-lg hover:shadow-fave-100 rounded border-b-2 border-fave-700 text-black font-semibold">Coming
                            Soon </button>
                    @else
                        <div class="flex justify-between">
                            <div class="flex items-center gap-3">
                                <p class="font-semibold text-lg">TK.{{ $product->userPrice->discount_fixed }}</p>
                                <div class="flex items-center gap-2 text-sm">
                                    @if ($product->userPrice->discount_fixed != $product->userPrice->regular_price)
                                        <del class="text-slate-500">TK.{{ $product->userPrice->regular_price }}</del>
                                        <span>{{ $product->userPrice->discount_percentage }}%</span>
                                    @endif
                                </div>
                                {{-- @can('isDealer')
                                    <p class="font-semibold text-lg">TK.{{ $product->dealerPrice->dealer_dis_fixed }}</p>
                                    <div class="flex items-center gap-2 text-sm">
                                        @if ($product->dealerPrice->dealer_dis_fixed != $product->dealerPrice->dealer_price)
                                            <del class="text-slate-500">TK.{{ $product->dealerPrice->dealer_price }}</del>
                                            <span>{{ $product->dealerPrice->dealer_dis_percentage }}%</span>
                                        @endif
                                    </div>
                                @endcan --}}
                            </div>
                            <form action="{{ route('add.cart', $product->id) }}" method="post" id="addCart">
                                @csrf
                                <input type="hidden" name="quantity" value="1">
                                @can('isUser')
                                    <input type="hidden" name="price" value="{{ $product->userPrice->discount_fixed }}">
                                @endcan
                                @can('isAdmin')
                                    <input type="hidden" name="price" value="{{ $product->userPrice->discount_fixed }}">
                                @endcan
                                <button type="submit"
                                    class="bg-slate-100 hover:bg-fave-500 hover:text-white p-2 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="1.3" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                        <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                        <path d="M17 17h-11v-14h-2"></path>
                                        <path d="M6 5l14 1l-1 7h-13"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>

    <div class="mt-16">
        <div class="grid lg:flex items-center justify-between bg-fave-500"
            style="background: url('{{ asset('frontend/images/bg-pattarn.jpg') }}')">
            <div class="flex-1 text-white">
                <div class="w-full lg:max-w-[600px] mx-auto grid gap-2 p-5 sm:p-14 xl:px-5">
                    <h2 style="color: #000; font-weight: 600;"
                        class="text-[24px]  md:text-[34px] xl:text-[40px] text-center sm:text-left">ABOUT VOLTME
                    </h2>
                    <p style="color: #000;  font-weight: 400;" class=" aboutVoltme">VOLTME believes being
                        at the forefront of innovation is the key to sustainability. Technology and discovery are key agents
                        driving our world forward. We continue to push enginnering limits in expanding upon key technologies
                        beyond what they can do and ask how can it apply to our lives, how it can affect us, and how we can
                        make it better.</p>
                </div>
            </div>
            <div class="flex-1">
                <img src="{{ asset('frontend/images/gan.jpeg') }}" alt="img"
                    class="w-full sm:h-[500px] object-cover">
            </div>
        </div>
    </div>

    <!-- Swiper -->
    <div class="swiper heroSlider select-none ">
        <div class="swiper-wrapper">
            @if ($arrivals == null)
                <div class="swiper-slide">
                    <div class="relative overflow-hidden text-gray-700 w-full bg-fixed bg-contain">
                        <div class=" py-10 w-full h-full grid items-center">
                            <div class="mx-auto w-full xl:max-w-screen-xl px-6">
                                <div class="grid lg:flex items-center lg:gap-10 justify-between ">
                                    <div class="flex-1">
                                        <img src="{{ asset('default/default-arrival.jpg') }}" alt="img"
                                                class="object-cover"
                                                data-aos="fade-right">
                                    </div>
                                    <div class="flex-1 bg-white/70 backdrop-blur-sm p-5 sm:p-8 xl:py-10 xl:px-16 grid gap-2 rounded"
                                        data-aos="fade-left">
                                        <div class="block grid justify-center sm:hidden">
                                            <span style="font-weight: 600"
                                                class="text-[24px] md:text-[34px] xl:text-[40px]font-semibold bg-fave-500 py-2 px-5 rounded">New
                                                Arrival</span>
                                        </div>
                                        <div class="block hidden sm:block">
                                            <span style="font-weight: 600"
                                                class="text-[24px] md:text-[34px] xl:text-[40px]font-semibold bg-fave-500 py-2 px-5 rounded">New
                                                Arrival</span>
                                        </div>
                                        <p style="font-weight: 400;"
                                            class="text-center sm:text-left text-lg sm:text-xl font-semibold ">Voltme Hypercore 10K Portable Power Bank</p>
                                        <p class="aboutVoltMeDetails line-clamp-[7] lg:line-clamp-5 !font-[200]">
                                            Voltme Hypercore 10K Portable Power Bank, is a cutting-edge solution to keep your devices charged and ready to go, wherever life takes you. With a robust battery capacity of 10000mAh, it offers reliable power support for your gadgets, ensuring you stay connected on the move.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                @foreach ($arrivals as $arrival)
                <div class="swiper-slide">
                    <div class="relative overflow-hidden text-gray-700 w-full bg-fixed bg-contain">
                        <div class=" py-10 w-full h-full grid items-center">
                            <div class="mx-auto w-full xl:max-w-screen-xl px-6">
                                <div class="grid lg:flex items-center lg:gap-10 justify-between ">
                                    <div class="flex-1">
                                        @if (isset($arrival->product_image))
                                            <img src="{{ asset('uploads/product/' . $arrival->product_image) }}"
                                                alt="img"
                                                class="object-cover"
                                                data-aos="fade-right">
                                        @else
                                            <img src="{{ asset('default/default-slider.jpeg') }}" alt="img"
                                                class="object-cover"
                                                data-aos="fade-right">
                                        @endif
                                    </div>
                                    <div class="flex-1 bg-white/70 backdrop-blur-sm p-5 sm:p-8 xl:py-10 xl:px-16 grid gap-2 rounded"
                                        data-aos="fade-left">
                                        <div class="block grid justify-center sm:hidden">
                                            <span style="font-weight: 600"
                                                class="text-[24px] md:text-[34px] xl:text-[40px]font-semibold bg-fave-500 py-2 px-5 rounded">New
                                                Arrival</span>
                                        </div>
                                        <div class="block hidden sm:block">
                                            <span style="font-weight: 600"
                                                class="text-[24px] md:text-[34px] xl:text-[40px]font-semibold bg-fave-500 py-2 px-5 rounded">New
                                                Arrival</span>
                                        </div>
                                        <p style="font-weight: 400;"
                                            class="text-center sm:text-left text-lg sm:text-xl font-semibold ">
                                            {{ $arrival->product_name ?? 'Voltme Hypercore 10k' }}</p>
                                        <p class="aboutVoltMeDetails line-clamp-[7] lg:line-clamp-5 !font-[200]">
                                            {!! Str::limit(strip_tags($arrival->long_description), 200, '...') !!}</p>
                                            <div class="grid justify-center sm:hidden">
                                                <a href="{{ route('frontend.product.details', ['slug' => $arrival->slug, 'id' => $arrival->id]) }}"
                                                    class="text-center sm:text-left bg-fave-500 py-2 px-5 hover:shadow-lg hover:shadow-fave-100 rounded border-b-2 border-fave-700 text-white font-semibold max-w-[150px] text-center mt-2">
                                                    Details
                                                </a>
                                            </div>
                                            <div class="hidden sm:block">
                                                <a href="{{ route('frontend.product.details', ['slug' => $arrival->slug, 'id' => $arrival->id]) }}"
                                                    class="text-center sm:text-left bg-fave-500 py-2 px-5 hover:shadow-lg hover:shadow-fave-100 rounded border-b-2 border-fave-700 text-white font-semibold max-w-[150px] text-center mt-2">
                                                    Details
                                                </a>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
        <div class="swiper-pagination"></div>
    </div>
@endsection
