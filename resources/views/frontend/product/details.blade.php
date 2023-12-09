@extends('frontend.layouts.master_frontend')

@push('css')
    <style>
        .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
        }

        .rate:not(:checked)>input {
            position: absolute;
            /* top: -9999px; */
            display: none;
        }

        .rate:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .rate:not(:checked)>label:before {
            content: '★ ';
        }

        .rate>input:checked~label {
            color: #ffc700;
        }

        .rate:not(:checked)>label:hover,
        .rate:not(:checked)>label:hover~label {
            color: #deb217;
        }

        .rate>input:checked+label:hover,
        .rate>input:checked+label:hover~label,
        .rate>input:checked~label:hover,
        .rate>input:checked~label:hover~label,
        .rate>label:hover~input:checked~label {
            color: #c59b08;
        }
    </style>
@endpush
@section('pageTitle'){{ __('Product Details') }}@endsection
@section('section')
    <div class="font-exo font-light text-slate-700">
        <div class="relative">
            <img src="{{ asset('frontend/images/contact-about-bg.webp') }}" alt="img"
                class="min-h-[220px] object-cover">
            <div class="absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%]">
                <h2
                    class="text-[18px] text-center sm:text-[30px] font-bold text-white bg-white/50 py-2 px-5 rounded uppercase">
                    Product Details</h2>
            </div>
        </div>
        <div class="mx-auto w-full xl:max-w-screen-xl px-6 py-10">
            <div>
                <div class="grid md:grid-cols-2 gap-10">
                    <div class="w-full">
                        <img src="{{ asset('uploads/product/' . $product->product_image) ?? asset($product->product_image) }}"
                            alt="img" class="parentImg w-full max-h-[400px] object-contain border">

                        <div class="grid grid-cols-4 w-full">
                            @if (isset($product->thumbnail_image) == 'default-product-image.png')
                            <img onclick="productDetailsImg(this)" src="{{ asset('uploads/product/' . $product->product_image) ?? asset($product->product_image) }}"
                            alt="img" class="w-full  max-h-[120px] object-contain border p-1">
                                @foreach (json_decode($product->thumbnail_image, true) as $thumbnail)
                                    <img onclick="productDetailsImg(this)"
                                        src="{{ asset('uploads/product/' . $thumbnail) }}" alt="img"
                                        class="w-full  max-h-[120px] object-contain border p-1">
                                @endforeach
                            @else
                                @foreach (json_decode($product->thumbnail_image, true) as $thumbnail)
                                    <div class="product-image-thumb"><img src="{{ asset('default/' . $thumbnail) }}"
                                            alt="Product Featured Image"></div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="flex flex-col gap-5">
                        <div class="text-xl  grid gap-3 font-semibold pb-5 border-b">
                            <h2 class="leading-7">{{ $product->product_name }}</h2>
                            <div class="flex items-center gap-2">
                                @if ($product->status == App\Enums\ProductStatus::Comming->value)
                                    <button>Coming Soon </button>  
                                @else
                                    <h2>&#2547;. {{ $product->userPrice->discount_fixed }}</h2>
                                    @if ($product->userPrice->discount_fixed != $product->userPrice->regular_price)
                                        <del class="text-base font-normal bg-fave-500 text-white px-1 rounded">&#2547;.
                                            {{ $product->userPrice->regular_price }}</del>
                                        <span>{{ $product->userPrice->discount_percentage }}%</span>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="grid gap-5">
                            <div class="flex items-center gap-2">
                                <div class="flex">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $averageRating)
                                            <svg xmlns="http://www.w3.org/2000/svg" class="text-yellow-300" width="16"
                                                height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path
                                                    d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"
                                                    stroke-width="0" fill="currentColor"></path>
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" class="text-slate-300" width="16"
                                                height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path
                                                    d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"
                                                    stroke-width="0" fill="currentColor"></path>
                                            </svg>
                                        @endif
                                    @endfor
                                </div>
                                <span>({{ $reviews->count() }} customer review)</span>
                            </div>
                            <p class="">{!! $product->short_description !!}</p>
                            @if ($inventory && isset($inventory->quantity))
                                @if ($inventory->quantity > 5)
                                    <span style="color: #08c551; font-weight: 600">Stock In ({{ $inventory->quantity > 30 ? 30 : $inventory->quantity }})</span>
                                @else
                                    <span style="color: #c51e08; font-weight: 600">Stock Out</span>
                                @endif
                            @else
                                <span style="color: #c51e08; font-weight: 600">Stock Not Available</span>
                            @endif

                            {{-- @if ($inventory->quantity > 5)
                            <span style="color: #08c551; font-weight: 600">Stock In ({{ $inventory->quantity }})</span>
                            @else
                            <span style="color: #c51e08; font-weight: 600">Stock Out</span>
                            @endif --}}
                            <div class="grid sm:flex items-center gap-5 sm:gap-0">
                                <div>
                                    <form action="{{ route('add.cart', $product->id) }}" method="post" id="addCart"
                                        class="flex items-center justify-between gap-5 border pl-2">
                                        @csrf
                                        <span>Quantity</span>
                                        <div class="flex items-center">
                                            <div id="decBtn">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="cursor-pointer"
                                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M15 6l-6 6l6 6"></path>
                                                </svg>
                                            </div>
                                            <input type="text" class="w-10 p-1 outline-none text-center"
                                                @if (isset($cart->quantity)) value="{{ $cart->quantity }}" @endif
                                                value="1" name="quantity" id="quantity">
                                            <div id="incBtn">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="cursor-pointer"
                                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M9 6l6 6l-6 6"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <input type="hidden" name="price" value="{{ $product->userPrice->discount_fixed }}">
                                        @if ($product->status == App\Enums\ProductStatus::Comming->value)
                                        <span
                                            class="border border-bg-fave-500 font-semibold text-white py-3 px-8 bg-fave-500">
                                            Coming Soon </span>
                                        @else
                                            <button type="submit"
                                            class="border border-bg-fave-500 font-semibold text-white py-3 px-8 bg-fave-500">Add
                                            To Cart</button>
                                        @endif
                                    </form>
                                </div>
                            </div>
                                @if ($product->status == App\Enums\ProductStatus::Comming->value)
                                    <span>Coming Soon </span>
                                @else
                                <form action="{{ route('add.wishlist', $product->id) }}" method="post" id="addWishList">
                                    @csrf
                                    <button type="submit" class="flex items-center gap-2 group hover:text-fave-500">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="text-gray-700 group-hover:text-fave-500" width="28" height="28"
                                        viewBox="0 0 24 24" stroke-width="1.3" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path
                                            d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572">
                                        </path>
                                    </svg>
                                        <span>Add To Wishlist</span>
                                    </button>
                                </form>
                                @endif
                            <div class="grid gap-1 mt-5">
                                {{-- <div class="flex items-center gap-2">
                                    <span class="font-semibold">SKU:</span>
                                    <span class="">{{ $product->sku }}</span>
                                </div> --}}
                                <div class="flex items-center gap-2">
                                    <span class="font-semibold">Category:</span>
                                    <span class="">{{ $product->category->name }}</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    @php
                                        $keywords = array_slice(explode(' ', $product->tag), 0);
                                    @endphp
                                    <span class="font-semibold">Tags:</span>
                                    @foreach ($keywords as $keyword)
                                        <span
                                            class="bg-slate-100 px-1 border border-slate-300 rounded">#{{ $keyword }}</span>
                                    @endforeach
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="font-semibold">Warranty:</span>
                                    <span class="">{{ round($months) }} Months</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- des-rev --}}
                <div class="py-10">
                    <ul class="flex items-center gap-5">
                        <li
                            class="tab_btn active cursor-pointer py-2 px-5 rounded bg-fave-500 text-white font-semibold shadow-[rgba(50,50,93,0.25)_0px_6px_12px_-2px,_rgba(0,0,0,0.3)_0px_3px_7px_-3px]">
                            Description</li>
                        <li class="tab_btn cursor-pointer py-2 px-5 rounded bg-fave-500 text-white font-semibold">Reviews
                        </li>
                    </ul>
                    <div class="mt-5 border">
                        <div class="tab_content active p-3 sm:p-5 text-justify">
                            <p>{!! $product->long_description !!}</p>
                        </div>
                        <div class="tab_content hidden">
                            <diV class="grid md:grid-cols-2 lg:gap-5">
                                <diV class="grid gap-5 p-3 sm:p-5">
                                    <p class="text-xl sm:text-2xl font-semibold">
                                        {{ $product->product_name }}
                                    </p>
                                    <form action="{{ route('review.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <div class="grid gap-2">
                                            <p>Your Rating *</p>
                                            <div class="flex">
                                                <div class="rate">
                                                    <input type="radio" id="star5" name="rating"
                                                        value="5" />
                                                    <label for="star5" title="text">5 stars</label>
                                                    <input type="radio" id="star4" name="rating"
                                                        value="4" />
                                                    <label for="star4" title="text">4 stars</label>
                                                    <input type="radio" id="star3" name="rating"
                                                        value="3" />
                                                    <label for="star3" title="text">3 stars</label>
                                                    <input type="radio" id="star2" name="rating"
                                                        value="2" />
                                                    <label for="star2" title="text">2 stars</label>
                                                    <input type="radio" id="star1" name="rating"
                                                        value="1" />
                                                    <label for="star1" title="text">1 star</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid gap-2">
                                            <p>Name *</p>
                                            <input type="text" name="name" placeholder="Enter Your Name"
                                                value="{{ auth()->user()->name ?? 'Jone Doe' }}"
                                                class="w-full border outline-fave-500 p-2 mb-1 rounded">
                                        </div>
                                        <div class="grid gap-2">
                                            <p>Email *</p>
                                            <input type="email" name="email" placeholder="Enter Your Email"
                                                value="{{ auth()->user()->email ?? 'jone@example.com' }}"
                                                class="w-full border outline-fave-500 p-2 mb-1 rounded">
                                        </div>
                                        <div class="grid gap-2">
                                            <p>Your Review *</p>
                                            <textarea placeholder="Comment..." cols="30" rows="10" name="comment"
                                                class="w-full border outline-fave-500 p-2 mb-1 rounded"></textarea>
                                        </div>
                                        <div class="mt-3">
                                            @guest
                                                <a href="{{ route('login') }}" target="blank"
                                                    class="border border-bg-fave-500 font-semibold text-white py-3 px-8 bg-fave-500 rounded-md">
                                                    Login
                                                </a>
                                            @else
                                                @isset($orderList)
                                                    <button type="submit"
                                                        class="border border-bg-fave-500 font-semibold text-white py-3 px-8 bg-fave-500 rounded-md">
                                                        Add Review
                                                    </button>
                                                @else
                                                <button type="submit"
                                                    class="border border-bg-fave-500 font-semibold text-white py-3 px-8 bg-fave-500 rounded-md" disabled>
                                                    Add Review
                                                </button>
                                                @endisset
                                            @endguest
                                        </div>
                                    </form>
                                </diV>
                                <diV class="p-3 sm:p-5">
                                    <h2 class="text-xl sm:text-2xl font-semibold mb-5">Customer Reviews</h2>
                                    <div class="grid gap-2 max-h-[600px] overflow-auto">
                                        @foreach ($reviews as $review)
                                            <div class="grid gap-3 border rounded p-5">
                                                <div>
                                                    <h4 class="font-medium text-[20px]">{{ $review->name }}</h4>
                                                    <div class="flex">
                                                        @for ($star = 1; $star <= $review->rating; $star++)
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="text-yellow-400 cursor-pointer" width="15"
                                                                height="15" viewBox="0 0 24 24" stroke="currentColor"
                                                                fill="none" stroke-linecap="round"
                                                                stroke-linejoin="round">
                                                                <path d="M0 0h24v24H0z" stroke="none" />
                                                                <path
                                                                    d="M8.433 6H3l-.114.006a1 1 0 0 0-.743 1.508L4.833 12l-2.69 4.486-.054.1A1 1 0 0 0 3 18h5.434l2.709 4.514.074.108a1 1 0 0 0 1.64-.108L15.565 18H21l.114-.006a1 1 0 0 0 .743-1.508L19.166 12l2.691-4.486.054-.1A1 1 0 0 0 21 6h-5.434l-2.709-4.514a1 1 0 0 0-1.714 0L8.433 6z"
                                                                    fill="currentColor" stroke="none" />
                                                            </svg>
                                                        @endfor
                                                    </div>
                                                </div>
                                                <p class="">{{ $review->comment }}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                </diV>
                            </diV>
                        </div>
                    </div>
                </div>

                <div class="">
                    <div class="border-b">
                        <h2 class="py-5 border-b-2 border-fave-500 inline-block text-xl font-semibold">Related Products
                        </h2>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-y-10 mt-10">
                        @foreach ($relatedProducts as $relatedProduct)
                            <div class="bg-white pb-5 sm:p-5 grid gap-2 border-b sm:border-b-0 sm:border-r">
                                <div class="flex justify-between">
                                    <a href="{{ route('categories.wise_page', $relatedProduct->category->id) }}"
                                        class="text-sm hover:text-fave-500">{{ $relatedProduct->category->name }}</a>
                                    @if ($relatedProduct->status == App\Enums\ProductStatus::Comming->value)
                                    <button>Coming Soon </button>
                                    @else
                                    <form action="{{ route('add.wishlist', $relatedProduct->id) }}" method="post"
                                        id="addWishList">
                                        @csrf
                                        <button type="submit" class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="hover:text-fave-500"
                                                width="24" height="24" viewBox="0 0 24 24" stroke-width="1.3"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path
                                                    d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572">
                                                </path>
                                            </svg>
                                        </button>
                                    </form>
                                    @endif
                                </div>
                                <a
                                    href="{{ route('frontend.product.details', ['slug' => $relatedProduct->slug, 'id' => $relatedProduct->id]) }}">
                                    <img src="{{ asset('uploads/product/' . $relatedProduct->product_image) ?? asset($relatedProduct->product_image) }}"
                                        alt="product-img" class="w-full max-h-[220px] object-contain">
                                </a>
                                <div class="flex">
                                    @php
                                        $ratings = App\Models\Review::where('product_id', $relatedProduct->id)
                                            ->where('status', App\Enums\StatusEnum::Active->value)
                                            ->pluck('rating');
                                        $averageRating = $ratings->isEmpty() ? 0 : $ratings->avg();
                                    @endphp
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $averageRating)
                                            <svg xmlns="http://www.w3.org/2000/svg" class="text-yellow-300"
                                                width="16" height="16" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path
                                                    d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"
                                                    stroke-width="0" fill="currentColor"></path>
                                            </svg>
                                        @endif
                                    @endfor
                                </div>
                                <a href="{{ route('frontend.product.details', ['slug' => $relatedProduct->slug, 'id' => $relatedProduct->id]) }}" class="line-clamp-2 text-sm hover:text-fave-500 cursor-pointer">
                                    {{ $relatedProduct->product_name }}</a>
                                <div class="flex justify-between">
                                    @if ($relatedProduct->status == App\Enums\ProductStatus::Comming->value)
                                    <button class="slider-button bg-fave-500 px-2 hover:shadow-lg hover:shadow-fave-100 rounded border-b-2 border-fave-700 text-white font-semibold">Coming Soon </button>
                                    @else
                                    <div class="flex items-center gap-3">                                       
                                        <p class="font-semibold text-lg">&#2547;. {{ $relatedProduct->userPrice->discount_fixed }}</p>
                                        @if ($relatedProduct->userPrice->discount_fixed != $relatedProduct->userPrice->regular_price)
                                            <del
                                                class="text-slate-400 text-sm">&#2547;. {{ $relatedProduct->userPrice->regular_price }}</del>
                                            <span>{{ $relatedProduct->userPrice->discount_percentage }}%</span>
                                        @endif                                            
                                    </div>
                                    <form action="{{ route('add.cart', $relatedProduct->id) }}" method="post"
                                        id="addCart">
                                        @csrf
                                        <input type="hidden" name="quantity" value="1">
                                        <input type="hidden" name="price" value="{{ $relatedProduct->userPrice->discount_fixed }}">
                                        <button type="submit"
                                            class="bg-slate-100 hover:bg-fave-500 hover:text-white p-2 rounded-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="1.3"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
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

@push('js')
    <script>
        const tab_btn = document.querySelectorAll('.tab_btn');
        const tab_content = document.querySelectorAll('.tab_content');

        tab_btn.forEach((tab, index) => {
            tab.addEventListener('click', () => {
                tab_btn.forEach((tabs) => {
                    tabs.classList.remove(
                        'shadow-[rgba(50,50,93,0.25)_0px_6px_12px_-2px,_rgba(0,0,0,0.3)_0px_3px_7px_-3px]'
                    );
                })
                tab.classList.add(
                    'shadow-[rgba(50,50,93,0.25)_0px_6px_12px_-2px,_rgba(0,0,0,0.3)_0px_3px_7px_-3px]');

                tab_content.forEach((tabCon) => {
                    tabCon.classList.remove('block');
                    tabCon.classList.add('hidden');
                })
                tab_content[index].classList.add('block');
                tab_content[index].classList.remove('hidden');
            });
        });

        $('#incBtn').click(function() {
            var incVal = $('#quantity').val();
            var intValue = parseInt(incVal);
            var product_id = {{ $product->id }};
            if (!isNaN(intValue)) {
                intValue++;
                $.ajax({
                    type: 'POST',
                    url: "{{ route('increment.quantity') }}",
                    data: {
                        product_id: product_id
                    },
                    success: function(data) {
                        toastr.success(data);
                    }
                });
                $('#quantity').val(intValue);
            }
        });

        $('#decBtn').click(function() {
            var decVal = $('#quantity').val();
            var intValue = parseInt(decVal);
            var product_id = {{ $product->id }};

            if (!isNaN(intValue) && intValue > 1) {
                intValue--;
                $.ajax({
                    type: 'POST',
                    url: "{{ route('decrement.quantity') }}",
                    data: {
                        product_id: product_id
                    },
                    success: function(data) {
                        toastr.success(data);
                    }
                });
                $('#quantity').val(intValue);
            }
        });


        const productDetailsImg = (smallImg) => {
            const parentImg = document.querySelector('.parentImg');
            parentImg.src = smallImg.src;
        }
    </script>
@endpush
