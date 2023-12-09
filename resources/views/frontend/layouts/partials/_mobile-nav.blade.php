<div class="w-full h-full transform -translate-x-full xl:hidden fixed top-0 z-[991]" id="mobile-nav">
    <div class="bg-gray-800 opacity-50 w-full h-full" onclick="sidebarHandler(false)"></div>
    <div
        class="w-[310px] z-40 fixed overflow-y-auto top-0 bg-fave-500 shadow h-full flex-col justify-between xl:hidden pb-4 transition duration-150 ease-in-out">
        <div class="h-full">
            <div class="flex flex-col justify-between h-full w-full">
                <div>
                    <div class="flex w-full items-center justify-between border-b px-5 py-2 bg-slate-100">
                        <div class="flex items-center justify-between w-full py-4 sm:py-5">
                            <a href="/" class="w-[140px]">
                                <img src="{{ asset('uploads/logo/' . $siteSettings->first()->logo) ?? asset('frontend/images/logo.png') }}"
                                    alt="logo">
                            </a>
                            <button id="cross" aria-label="close menu"
                                class="focus:outline-none focus:ring-2 rounded-md " onclick="sidebarHandler(false)">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z"></path>
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <ul class="f-m-m">
                        <li>
                            <a href="{{ route('frontend.index') }}" tabindex="0"
                                class="py-1 px-2 m-1 hover:bg-fave-500 hover:text-white block rounded">
                                Home</a>
                        </li>
                        <li class="">
                            <div
                                class="parent_menu focus:outline-none focus:text-fave-600  xl:text-base md:text-lg text-base px-3 flex items-center justify-between hover:bg-fave-500 hover:text-white py-1 my-1 md:py-1 md:my-2 cursor-pointer">
                                <span>Shop</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 md:w-6 md:h-6" width="18"
                                    height="18" viewBox="0 0 24 24" stroke-width="1.7" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M6 9l6 6l6 -6"></path>
                                </svg>
                            </div>
                            <div class="child_menu">
                                <ul class="my-2 text-base md:text-lg">
                                    @php
                                        $categories = App\Models\Category::select('id', 'name')
                                            ->where('status', App\Enums\StatusEnum::Active->value)
                                            ->orderBy('created_at', 'desc')
                                            ->get();
                                    @endphp
                                    @foreach ($categories as $category)
                                        <li><a href="{{ route('categories.wise_page', $category->id) }}"
                                                class="py-1 px-2 m-1 hover:bg-fave-500 hover:text-white block rounded">{{ $category->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="{{ route('frontend.outlets') }}" tabindex="0"
                                class="py-1 px-2 m-1 hover:bg-fave-500 hover:text-white block rounded">Outlets</a>
                        </li>
                        <li>
                            <a href="{{ route('forntend.news') }}" tabindex="0"
                                class="py-1 px-2 m-1 hover:bg-fave-500 hover:text-white block rounded">News</a>
                        </li>
                        {{-- <li class="">
                            <div
                                class="parent_menu focus:outline-none focus:text-fave-600  xl:text-base md:text-lg text-base px-3 flex items-center justify-between hover:bg-fave-500 hover:text-white py-1 my-1 md:py-1 md:my-2 cursor-pointer">
                                <span>About Us</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 md:w-6 md:h-6" width="18"
                                    height="18" viewBox="0 0 24 24" stroke-width="1.7" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M6 9l6 6l6 -6"></path>
                                </svg>
                            </div>
                            <div class="child_menu">
                                <ul class="py-2 text-base md:text-lg">
                                    <li><a href="{{ route('about.salamat') }}"
                                            class="py-1 px-2 m-1 hover:bg-fave-500 hover:text-white block rounded">About
                                            Salamat Innovation</a>
                                    </li>
                                    <li><a href="{{ route('about.volt_me') }}"
                                            class="py-1 px-2 m-1 hover:bg-fave-500 hover:text-white block rounded">About
                                            Voltme</a></li>
                                </ul>
                            </div>
                        </li> --}}
                        <li>
                            <a href="{{ route('about.salamat') }}" tabindex="0"
                                class="py-1 px-2 m-1 hover:bg-fave-500 hover:text-white block rounded">About Us</a>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}" tabindex="0"
                                class="py-1 px-2 m-1 hover:bg-fave-500 hover:text-white block rounded">
                                Contact Us</a>
                        </li>
                    </ul>
                </div>
                <div class="">
                    <form method="POST" action="{{ route('search') }}">
                        @csrf
                        <div class="flex items-center border search-bar">
                            <input type="search" name="query" id="search_product" placeholder="Search..."
                                class="w-full p-2 outline-none">
                            <button class="bg-fave-500 text-white p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                                    <path d="M21 21l-6 -6"></path>
                                </svg>
                            </button>
                        </div>
                    </form>
                    <div class="w-full flex justify-between items-center border">
                        <div class="border-r p-4 w-full grid justify-center hover:bg-fave-500 group ">
                            <a href="#" class=" ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="text-white group-hover:text-white"
                                    width="28" height="28" viewBox="0 0 24 24" stroke-width="1.3"
                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                                    <path d="M21 21l-6 -6"></path>
                                </svg>
                            </a>
                        </div>
                        <div class=" border-r p-4 w-full  grid justify-center hover:bg-fave-500 group ">
                            <a href="{{ route('cart.details') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="text-white group-hover:text-white"
                                    width="28" height="28" viewBox="0 0 24 24" stroke-width="1.3"
                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                    <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                    <path d="M17 17h-11v-14h-2"></path>
                                    <path d="M6 5l14 1l-1 7h-13"></path>
                                </svg>
                            </a>
                        </div>
                        <div class=" border-r p-4 w-full grid justify-center hover:bg-fave-500 group ">
                            <a href="{{ route('index.wishlist') }}" class="" id="">
                                <svg xmlns="http://www.w3.org/2000/svg" class="text-white group-hover:text-white"
                                    width="28" height="28" viewBox="0 0 24 24" stroke-width="1.3"
                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path
                                        d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572">
                                    </path>
                                </svg>
                            </a>
                        </div>
                        @guest
                            <div class="p-4 w-full grid justify-center hover:bg-fave-500 group">
                                <a href="{{ route('login') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-white group-hover:text-white"
                                        width="28" height="28" viewBox="0 0 24 24" stroke-width="1.3"
                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                    </svg>
                                </a>
                            </div>
                        @else
                            <div class="p-4 w-full grid justify-center hover:bg-fave-500 group">
                                <a href="{{ route('user.dashboard') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-white group-hover:text-white"
                                        width="28" height="28" viewBox="0 0 24 24" stroke-width="1.3"
                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M12 13m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                        <path d="M13.45 11.55l2.05 -2.05"></path>
                                        <path d="M6.4 20a9 9 0 1 1 11.2 0z"></path>
                                    </svg></a>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
