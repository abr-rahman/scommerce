<nav role="navigation" class="bg-white/80 backdrop-blur border-b xl:block hidden top-0">
    <!-- <span class="inline-block w-1/2 absolute h-4 bg-gradient-to-l "></span> -->
    {{-- <div class="text-white bg-red-500 p-2 font-bold text-center text-2xl">This Website is Under Construction</div> --}}
    <div class="mx-auto container px-6">
        <div class="flex items-center justify-between">
            <div class="inset-y-0 left-0 flex items-center xl:hidden">
                <div class="inline-flex items-center justify-center  hover:text-gray-100">
                    <div class="visible xl:hidden">
                        <svg onclick="MenuHandler(this,true)" aria-haspopup="true" aria-label="Main Menu"
                            xmlns="http://www.w3.org/2000/svg" class="show-m-menu icon icon-tabler icon-tabler-menu"
                            width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z"></path>
                            <line x1="4" y1="8" x2="20" y2="8"></line>
                            <line x1="4" y1="16" x2="20" y2="16"></line>
                        </svg>
                    </div>

                    <div class="" onclick="MenuHandler(this,false)">
                        <svg aria-label="Close" xmlns="http://www.w3.org/2000/svg" width="70" height="70"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <line x1="18" y1="6" x2="6" y2="18" />
                            <line x1="6" y1="6" x2="18" y2="18" />
                        </svg>
                    </div>
                </div>
            </div>
            <a href="/" class="w-[180px]">
                <img src="{{ asset('uploads/logo/'. $siteSettings->first()->logo) ?? asset('frontend/images/logo.png')  }}" alt="logo">
            </a>
            <ul class="hidden xl:flex md:mr-6 xl:mr-16">
                <li>
                    <a href="{{ route('frontend.index') }}"
                        class="focus:text-fave-500 hover:text-fave-500 flex px-5 items-center py-8">Home</a>
                </li>

                <li class="relative group">
                    <div class="focus:text-fave-500 hover:text-fave-500 flex px-5 items-center py-8 cursor-pointer ">
                        <span>Shop</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-down"
                            width="18" height="18" viewBox="0 0 24 24" stroke-width="1.7" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M6 9l6 6l6 -6"></path>
                        </svg>
                    </div>
                    <ul
                        class="absolute bg-white opacity-0 invisible group-hover:visible group-hover:opacity-100 mt-4 group-hover:mt-0 duration-200 shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] whitespace-nowrap min-w-[200px]">
                        @php
                            $categories = App\Models\Category::select('id', 'name')->where('status', App\Enums\StatusEnum::Active->value)
                                ->orderBy('created_at', 'desc')
                                ->get();
                        @endphp
                        @foreach ($categories as $category)
                            <li class="hover:bg-slate-100 focus:text-fave-500 hover:text-fave-500">
                                <a href="{{ route('categories.wise_page', $category->id) }}"
                                    class="p-4 block font-[400] text-[15px]">{{ $category->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                <li class="relative group">
                    <a class="focus:text-fave-500 hover:text-fave-500 flex px-5 items-center py-8" href="{{ route('frontend.outlets') }}">Outlets</a>
                </li>
                <li>
                    <a href="{{ route('forntend.news') }}"
                        class="focus:text-fave-500 hover:text-fave-500 flex px-5 items-center py-8">News</a>
                </li>
                <li>
                    <a href="{{ route('about.salamat') }}"
                        class="focus:text-fave-500 hover:text-fave-500 flex px-5 items-center py-8">About us</a>
                </li>
                {{-- <li class="relative group">
                    <div
                        class="focus:text-fave-500 hover:text-fave-500 flex px-5 items-center py-8 cursor-pointer whitespace-nowrap">
                        <span>About Us</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-down"
                            width="18" height="18" viewBox="0 0 24 24" stroke-width="1.7"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M6 9l6 6l6 -6"></path>
                        </svg>
                    </div>
                    <ul
                        class="absolute bg-white opacity-0 invisible group-hover:visible group-hover:opacity-100 mt-4 group-hover:mt-0 duration-200 shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] whitespace-nowrap min-w-[200px]">
                        <li class="hover:bg-slate-100 focus:text-fave-500 hover:text-fave-500 "><a
                                href="{{ route('about.salamat') }}" class="p-4 block font-[400] text-[15px]">About
                                Salamat
                                Innovation</a></li>
                        <li class="hover:bg-slate-100 focus:text-fave-500 hover:text-fave-500 "><a
                                href="{{ route('about.volt_me') }}" class="p-4 block font-[400] text-[15px]">About
                                Voltme</a></li>
                    </ul>
                </li> --}}
                <li>
                    <a href="{{ route('contact') }}"
                        class="focus:text-fave-500 hover:text-fave-500 flex px-5 items-center py-8 whitespace-nowrap">Contact Us</a>
                </li>
            </ul>
            <div class="flex items-center gap-5">
                <form method="POST" action="{{ route('search') }}" >
                    @csrf
                    <div class="flex items-center border border-fave-500 search-bar">
                        <input type="search" name="query" id="search_product"  placeholder="Search..." class="p-2 outline-none" >
                        <button class="bg-fave-500 text-white p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                                <path d="M21 21l-6 -6"></path>
                            </svg>
                        </button>

                    </div>
                </form>
                <a href="{{ route('index.wishlist') }}" class="" id="wishlistReload">
                    <div class="relative cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-700 hover:text-fave-500"
                            width="28" height="28" viewBox="0 0 24 24" stroke-width="1.3"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572">
                            </path>
                        </svg>
                        @php
                            $wishList = App\Models\Wishlist::select('id','user_id')->where('user_id', auth()->id())->get();
                            $cart = App\Models\Cart::select('id','user_id')->where('user_id', auth()->id())->get();
                        @endphp
                        <span
                            class="absolute w-5 h-5 text-center text-sm -bottom-2 -right-2 bg-fave-500 rounded-full text-white">{{ $wishList->count() }}</span>
                    </div>
                </a>
                <a href="{{ route('cart.details') }}" class="">
                    <div class="relative cursor-pointer" id="cartQuantity">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-700 hover:text-fave-500"
                            width="28" height="28" viewBox="0 0 24 24" stroke-width="1.1"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                            <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                            <path d="M17 17h-11v-14h-2"></path>
                            <path d="M6 5l14 1l-1 7h-13"></path>
                        </svg>

                        <span
                            class="absolute w-5 h-5 text-center text-sm -bottom-2 -right-2 bg-fave-500 rounded-full text-white">{{ $cart->count() }}</span>
                    </div>
                    <div class=""></div>
                </a>
                @guest
                    <a href="{{ route('login') }}" class="" target="blank">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-700 hover:text-fave-500" width="28"
                            height="28" viewBox="0 0 24 24" stroke-width="1.3" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                        </svg>
                    </a>
                @else
                @can('isAdmin')
                    <a href="{{ route('admin.dashboard') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-700 group-hover:text-white"
                            width="28" height="28" viewBox="0 0 24 24" stroke-width="1.3"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 13m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                            <path d="M13.45 11.55l2.05 -2.05"></path>
                            <path d="M6.4 20a9 9 0 1 1 11.2 0z"></path>
                        </svg>
                    </a>
                @else
                    <a href="{{ route('user.dashboard') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-700 group-hover:text-white"
                            width="28" height="28" viewBox="0 0 24 24" stroke-width="1.3"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 13m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                            <path d="M13.45 11.55l2.05 -2.05"></path>
                            <path d="M6.4 20a9 9 0 1 1 11.2 0z"></path>
                        </svg>
                    </a>
                @endcan
                    
                @endguest
            </div>
        </div>
    </div>
</nav>
