@extends('frontend.layouts.master_frontend')
@section('pageTitle'){{ __('Search Result') }}@endsection
@section('section')
<div class="mx-auto w-full xl:container px-6 py-10 text-slate-700">
    <div class="grid xl:flex items-start gap-10">
        <div class="flex-1 grid gap-5">
            <div class="">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-y-10 mt-10">
                    @foreach ($results as $product)
                        <div class="bg-white pb-5 sm:p-5 grid gap-2 border-b sm:border-b-0 sm:border-r">
                            <div class="flex justify-between">
                                <span class="text-sm hover:text-fave-500">{{ $product->category->name }}</span>
                                @if ($product->status == App\Enums\ProductStatus::Comming->value)
                                @else
                                <form action="{{ route('add.wishlist', $product->id) }}" method="post" id="addWishList">
                                    @csrf
                                    <button type="submit" class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="hover:text-fave-500" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.3" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572">
                                            </path>
                                        </svg>
                                    </button>
                                </form>
                                @endif
                            </div>
                            <a href="{{ route('frontend.product.details', ['slug' => $product->slug, 'id' => $product->id]) }}">
                                <img src="{{ asset('uploads/product/'.$product->product_image) ?? asset($product->product_image) }}" alt="product-img" class="w-full max-h-[220px] object-contain">
                            </a>
                            <div class="flex">
                            @php 
                                $ratings = App\Models\Review::where('product_id', $product->id)->where('status', App\Enums\StatusEnum::Active)->pluck('rating');
                                $averageRating = $ratings->isEmpty() ? 0 : $ratings->avg();
                            @endphp

                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $averageRating)
                                <svg xmlns="http://www.w3.org/2000/svg" class="text-yellow-300" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" stroke-width="0" fill="currentColor"></path>
                                </svg>
                                @endif
                            @endfor
                            </div>
                            <p class="line-clamp-2 text-sm hover:text-fave-500 cursor-pointer">{{ $product->product_name }}</p>
                            <div class="flex justify-between">
                            @if ($product->status == App\Enums\ProductStatus::Comming->value)
                                <button class="slider-button bg-fave-500 px-2 hover:shadow-lg hover:shadow-fave-100 rounded border-b-2 border-fave-700 text-white font-semibold">Coming Soon </button> 
                            @else
                                <div class="flex items-center gap-3">
                                    <p class="font-semibold text-lg">TK.{{ $product->userPrice->discount_fixed }}</p>
                                    @if ($product->userPrice->discount_fixed != $product->userPrice->regular_price)
                                        <del class="text-slate-400 text-sm">TK.{{ $product->userPrice->regular_price }}</del>
                                        <span>{{ $product->userPrice->discount_percentage }}%</span>
                                    @endif
                                </div>
                                <form action="{{ route('add.cart', $product->id) }}" method="post" id="addCart">
                                    @csrf
                                    <input type="hidden" name="quantity" value="1">
                                    <input type="hidden" name="price" value="{{ $product->userPrice->discount_fixed }}">
                                    <button type="submit" class="bg-slate-100 hover:bg-fave-500 hover:text-white p-2 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.3" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                            <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                            <path d="M17 17h-11v-14h-2"></path>
                                            <path d="M6 5l14 1l-1 7h-13"></path>
                                        </svg>
                                    </button>
                                </form>
                            @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection