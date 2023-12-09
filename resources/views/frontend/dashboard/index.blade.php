@extends('frontend.layouts.master_frontend')
@section('pageTitle'){{ __('Dashboard') }}@endsection
@section('section')
    <div class="font-exo font-light text-slate-700">
        <div class="relative">
            <img src="{{ asset('frontend/images/contact-about-bg.webp') }}" alt="img"
                class="min-h-[220px] object-cover">
            <div class="absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%]">
                <h1
                    class="text-[18px] text-center sm:text-[30px] font-bold text-white bg-white/50 py-2 px-5 rounded uppercase">
                    @can('isUser')
                        User
                    @elsecan('isDealer')
                        Dealer
                    @endcan
                    Dashboard</h1>
            </div>
        </div>
        <div class="mx-auto w-full xl:container px-6 py-10">
            <!-- mobile view toggle button -->
            <div class="my-5 flex md:hidden">
                <button id="openArrow" class="md:hidden block">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                        <path
                            d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z" />
                    </svg>
                </button>

                <button id="closeArrow" class="hidden md:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                        <path
                            d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" />
                    </svg>
                </button>
            </div>
            <!-- mobile view toogle button end -->
            <div class="userDsahboard md:grid md:grid-cols-4 flex gap-5">
                <div style="z-index: 100;" class="absolute md:static bg-white shadow">
                    <div id="tabItem" class="border rounded ">
                        <div class="grid justify-center gap-3 py-5">
                            <img src="{{ asset('uploads/profile/' . $user->profile_photo) ?? asset($user->profile_photo) }}"
                                class="inline-flex items-center p-2 md:p-3 border-b w-28 h-28 mx-auto rounded-full border border-2 border-fave-500 cursor-pointer" />
                            <div>
                                <h2 class="font-medium text-center text-xl">{{ auth()->user()->name }}</h1>
                                <h2 class="font-light text-center">{{ auth()->user()->email }}</h1>
                            </div>

                        </div>
                        <ul class="text-sm font-medium tab">
                            <li class="tablinks hover:bg-gray-200" onclick="openTab(event, 'dashboard')">
                                <p class="inline-flex items-center p-2 md:p-3 border-y w-full cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-fave-500" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M12 13m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                        <path d="M13.45 11.55l2.05 -2.05"></path>
                                        <path d="M6.4 20a9 9 0 1 1 11.2 0z"></path>
                                    </svg>
                                    <span class="md:block hidden ml-2 txt whitespace-nowrap">
                                        @can('isUser')
                                            User
                                        @elsecan('isDealer')
                                            Dealer
                                        @endcan
                                        Dashboard
                                    </span>
                                </p>
                            </li>
                            <li class="tablinks hover:bg-gray-200" onclick="openTab(event, 'profile')">
                                <p class="inline-flex items-center p-2 md:p-3 border-b w-full cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-fave-500" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                        <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                                        <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855"></path>
                                    </svg>
                                    <span class="md:block hidden ml-2 txt whitespace-nowrap">My Profile</span>
                                </p>
                            </li>
                            <li class="tablinks hover:bg-gray-200" onclick="openTab(event, 'orders')">
                                <p class="inline-flex items-center p-2 md:p-3 border-b w-full cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-fave-500" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path
                                            d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z">
                                        </path>
                                        <path d="M4 12l16 0"></path>
                                        <path d="M12 4l0 16"></path>
                                    </svg>
                                    <span class="md:block hidden ml-2 txt whitespace-nowrap">My Orders</span>
                                </p>
                            </li>

                            <li class="tablinks hover:bg-gray-200" onclick="openTab(event, 'support')">
                                <p class="inline-flex items-center border-b p-2 md:p-3 w-full cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-fave-500" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path
                                            d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2">
                                        </path>
                                        <path d="M15 7l0 .01"></path>
                                        <path d="M18 7l0 .01"></path>
                                        <path d="M21 7l0 .01"></path>
                                    </svg>
                                    <span class="md:block hidden ml-2 txt whitespace-nowrap">Support Center</span>
                                </p>
                            </li>
                            <li class="tablinks hover:bg-gray-200" onclick="openTab(event, 'passwordUpdate')">
                                <p class="inline-flex items-center p-2 md:p-3 w-full cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-fave-500" width="24"
                                    height="24" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M12 17v4"></path>
                                        <path d="M10 20l4 -2"></path>
                                        <path d="M10 18l4 2"></path>
                                        <path d="M5 17v4"></path>
                                        <path d="M3 20l4 -2"></path>
                                        <path d="M3 18l4 2"></path>
                                        <path d="M19 17v4"></path>
                                        <path d="M17 20l4 -2"></path>
                                        <path d="M17 18l4 2"></path>
                                        <path d="M9 6a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                                        <path d="M7 14a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2"></path>
                                     </svg>
                                    <span class="md:block hidden ml-2 txt whitespace-nowrap">Update Password</span>
                                </p>
                            </li>
                        </ul>
                    </div>
                    <div class="flex justify-center">
                        <button class="my-5 bg-fave-500 py-2 px-3 md:px-8 rounded">
                            <p class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" width="24"
                                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path
                                        d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2">
                                    </path>
                                    <path d="M9 12h12l-3 -3"></path>
                                    <path d="M18 15l3 -3"></path>
                                </svg>
                                <span class="md:block hidden ml-2 txt whitespace-nowrap text-white font-semibold"
                                    onclick="document.getElementById('logoutForm').submit();">Logout</span>
                            </p>
                            <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                        </button>
                    </div>
                </div>
                <div class="md:col-span-3 w-full min-h-[300px] ml-14 md:ml-0">
                    <div id="dashboard" class="tabcontent">
                        <div class="grid gap-5 border rounded p-5">
                            <div class="flex justify-between">
                                <h2 class="text-2xl font-semibold">
                                    @can('isUser')
                                        User
                                    @elsecan('isDealer')
                                        Dealer
                                    @endcan
                                    Dashboard
                                </h2>
                            </div>
                            @isset($dealer)
                                @if ($dealer->status == App\Enums\StatusEnum::Pending->value)
                                    Waiting for approve ...
                                @endif
                            @endisset
                            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-5">
                                <div class="bg-[#5e35b1] h-auto w-full p-3 md:p-5 rounded-xl relative overflow-hidden">
                                    <div class="z-10 text-white">
                                        <div class="flex items-center justify-center border-b border-black/10 pb-2">
                                            <p class="text-[18px] font-medium text-center">Products in Cart</p>
                                        </div>
                                        <div class="flex justify-center items-center py-1">
                                            <h2 class="text-2xl">{{ $cart }}</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-[#1565c0] h-auto w-full p-3 md:p-5 rounded-xl relative overflow-hidden">
                                    <div class="z-10 text-white">
                                        <div class="flex items-center justify-center border-b border-black/10 pb-2">
                                            <p class="text-[18px] font-medium text-center">Products in Wishlist</p>
                                        </div>
                                        <div class="flex justify-center items-center py-1">
                                            <h2 class="text-2xl">{{ $wishlist }}</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-[#2e4a8b] h-auto w-full p-3 md:p-5 rounded-xl relative overflow-hidden">
                                    <div class="z-10 text-white">
                                        <div class="flex items-center justify-center border-b border-black/10 pb-2">
                                            <p class="text-[18px] font-medium text-center">Total Order</p>
                                        </div>
                                        <div class="flex justify-center items-center py-1">
                                            <h2 class="text-2xl">{{ Count($order) }}</h2>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div id="profile" class="tabcontent hidden">
                        <div class="grid gap-5 border rounded p-5">
                            @can('isUser')
                                <h2 class="text-2xl font-semibold">Information</h2>
                                <form action="{{ route('user.update', $user->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="grid gap-4">
                                        <div class="grid gap-2">
                                            <p class="font-medium">Your Name</p>
                                            <input type="text" placeholder=" Enter Your Name" name="name"
                                                value="{{ $user->name }}" class="w-full border p-2 outline-fave-500">
                                        </div>
                                        <div class="grid gap-2">
                                            <p class="font-medium">Phone Number</p>
                                            <input type="text" placeholder="Enter Your Number" name="phone"
                                                value="{{ $user->phone }}" class="w-full border p-2 outline-fave-500">
                                        </div>
                                        <div class="grid gap-2">
                                            <p class="font-medium">Photo</p>
                                            <input type="file" name="profile_photo"
                                                class="w-full border p-2 outline-fave-500">
                                        </div>
                                        <div>
                                            <button type="submit"
                                                class="bg-fave-500 py-3 px-5 text-white font-semibold float-right rounded">Update
                                                Profile</button>
                                        </div>
                                    </div>
                                </form>
                            @endcan
                            @can('isDealer')
                                <h2 class="text-2xl font-semibold">Business & Personal Information</h2>
                                <div class="grid gap-4">
                                    <form action="{{ route('dealer.update', $dealer->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="grid gap-2">
                                            <p class="font-medium">Your Name</p>
                                            <input type="text" placeholder=" Enter Your Name" name="name"
                                                value="{{ $user->name }}" class="w-full border p-2 outline-fave-500">
                                        </div>
                                        <div class="grid gap-2">
                                            <p class="font-medium">Phone Number</p>
                                            <input type="text" name="phone" value="{{ $user->phone }}"
                                                placeholder="Enter Your Number" class="w-full border p-2 outline-fave-500">
                                        </div>
                                        <div class="grid gap-2">
                                            <p class="font-medium">Business Name</p>
                                            <input type="text" name="business_name" value="{{ $dealer->business_name }}"
                                                placeholder="Business Name" class="w-full border p-2 outline-fave-500">
                                        </div>
                                        <div class="grid gap-2">
                                            <p class="font-medium">Business Address</p>
                                            <input type="text" name="business_address"
                                                value="{{ $dealer->business_address }}" placeholder="Business Address"
                                                class="w-full border p-2 outline-fave-500">
                                        </div>
                                        <div class="grid gap-2">
                                            <p class="font-medium">Trade License Number</p>
                                            <input type="text" value="{{ $dealer->trade_license_number }}" readonly
                                                name="trade_license_number" placeholder="Enter Your Number"
                                                class="w-full border p-2 outline-fave-500">
                                        </div>
                                        <div class="grid gap-2">
                                            <p class="font-medium">Bin Number</p>
                                            <input type="text" name="bin_number"
                                                value="{{ $dealer->bin_number ?? null }}" placeholder="BIN Number"
                                                class="w-full border p-2 outline-fave-500">
                                        </div>
                                        <div class="grid gap-2">
                                            <p class="font-medium">Tin Number</p>
                                            <input type="text" name="tin_number"
                                                value="{{ $dealer->tin_number ?? null }}" placeholder="Tin Number"
                                                class="w-full border p-2 outline-fave-500">
                                        </div>
                                        <div class="grid gap-2">
                                            <p class="font-medium">NID Number</p>
                                            <input type="text" name="nid_number"
                                                value="{{ $dealer->nid_number ?? null }}" placeholder="NID Number"
                                                class="w-full border p-2 outline-fave-500">
                                        </div>
                                        <div class="grid gap-2">
                                            <p class="font-medium">Personal Address</p>
                                            <input type="text" name="p_address" value="{{ $dealer->p_address ?? null }}"
                                                placeholder="Personal Address" class="w-full border p-2 outline-fave-500">
                                        </div>
                                        <div class="grid gap-2">
                                            <p class="font-medium">Others </p>
                                            <input type="text" name="others" value="{{ $dealer->others ?? null }}"
                                                placeholder="Others" class="w-full border p-2 outline-fave-500">
                                        </div>
                                        <div class="grid gap-2">
                                            <p class="font-medium">Attachment (NID, BIN, TIN, Trade License Photo)</p>
                                            <input type="file" name="attachment[]"
                                                class="w-full border p-2 outline-fave-500" multiple>

                                                @if (isset($dealer->attachment))
                                                    @foreach (json_decode($dealer->attachment, true) as $attachment)
                                                        <div class="product-image-thumb" id="attachment_{{ $attachment }}">
                                                            <button type="button" data-href="{{ route('delete-attachment') }}" class="btn btn-sm btn-outline-danger delete-image" data-attachment="{{ $attachment }}" data-dealer_id="{{ $dealer->id }}"> X </button>
                                                            <img src="{{ asset('uploads/dealership/' . $attachment) ?? asset($attachment) }}" width="100" alt="Dealership Attachment">
                                                        </div>
                                                    @endforeach
                                                @endif
                                        </div>
                                        <div class="grid gap-2">
                                            <p class="font-medium">Profile Photo</p>
                                            <img src="{{ asset('uploads/profile/' . $user->profile_photo) ?? asset($user->profile_photo) }}"
                                                width="40" />
                                            <input type="file" name="profile_photo"
                                                class="w-full border p-2 outline-fave-500">
                                        </div>
                                        <div>
                                            <button
                                                class="bg-fave-500 py-3 px-5 text-white font-semibold float-right rounded">Update
                                                Profile</button>
                                        </div>
                                    </form>
                                </div>
                            @endcan
                        </div>
                        <!-- <div class="border rounded p-5 mt-5"></div> -->
                    </div>
                    <div id="orders" class="tabcontent hidden">
                        <div class="grid gap-5 border rounded p-5 overflow-auto">
                            <h2 class="text-2xl font-semibold">Purchase History</h2>
                            <div class="overflow-auto">
                                <div style="width: 1000px;" class="min-w-[600px]">
                                    <div class="grid grid-cols-6 gap-1 items-center border-b py-5 font-medium">
                                        <p class="">Invoice Number</p>
                                        <p class="">Date</p>
                                        <p class="">Amount</p>
                                        <p class="">Delivery Status</p>
                                        <p class="">Payment Method</p>
                                        <p class="">Payment Status</p>
                                    </div>
                                    @foreach ($order as $item)
                                        <div class="grid grid-cols-6 gap-1 items-center border-b py-5">
                                            <a href="{{ route('download.invoice', $item->id) }}" id="downloadInvoice" class="bg-sky-500 rounded-full text-center text-white inline-block w-24" title="Download Invoice">{{ $item->invoice_number }}</a>
                                            
                                            <p class="">{{ $item->created_at->format('d-M-Y') ?? null }}</p>
                                            <p class="">&#2547;. {{ $item->grand_total }}</p>
                                            @if ($item->status == App\Enums\StatusEnum::Approved->value)
                                                <p
                                                    class="bg-blue-500 rounded-full text-center text-white inline-block w-24">
                                                    {{ __('Approved') }}
                                                </p>
                                            @elseif ($item->status == App\Enums\StatusEnum::Pending->value)
                                                <p
                                                    class="bg-stone-500 rounded-full text-center text-white inline-block w-24">
                                                    {{ __('Pending') }}
                                                </p>
                                            @elseif ($item->status == App\Enums\StatusEnum::Processing->value)
                                                <p
                                                    class="bg-fave-500 rounded-full text-center text-white inline-block w-24">
                                                    {{ __('Processing') }}
                                                </p>
                                            @elseif ($item->status == App\Enums\StatusEnum::OnWay->value)
                                                <p
                                                    class="bg-sky-500 rounded-full text-center text-white inline-block w-24">
                                                    {{ __('In Transit') }}
                                                </p>
                                            @elseif ($item->status == App\Enums\StatusEnum::Complete->value)
                                                <p
                                                    class="bg-green-500 rounded-full text-center text-white inline-block w-24">
                                                    {{ __('Completed') }}
                                                </p>
                                            @elseif ($item->status == App\Enums\StatusEnum::Rejected->value)
                                                <p
                                                    class="bg-red-500 rounded-full text-center text-white inline-block w-24">
                                                    {{ __('Rejected') }}
                                                </p>
                                            @endif
                                            <div class="">
                                                @if ($item->payment_method == 'cod')
                                                    <p
                                                        class="bg-teal-500 rounded-full text-center text-white inline-block w-24">
                                                        {{ __('Cash') }}</p>
                                                @else
                                                    <p
                                                        class="bg-sky-500 rounded-full text-center text-white inline-block w-24">
                                                        {{ __('Online') }}</p>
                                                @endif
                                            </div>
                                            <div class="">
                                                @if ($item->payment_method == 'online')
                                                    <p
                                                        class="bg-green-500 rounded-full text-center text-white font-semibold inline-block w-24">
                                                        Paid</p>
                                                @elseif ($item->status == App\Enums\StatusEnum::Complete->value)
                                                    <p
                                                        class="bg-green-500 rounded-full text-center text-white font-semibold inline-block w-24">
                                                        Paid</p>
                                                @else
                                                    <p
                                                        class="bg-red-500 rounded-full text-center text-white font-semibold inline-block w-24">
                                                        Unpaid</p>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="support" class="tabcontent hidden">
                        <div class="grid gap-5 border rounded p-5 overflow-auto">
                            <h2 class="text-2xl font-semibold">Support Center</h2>
                            <form action="{{ route('support.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <div class="grid gap-5">
                                    <div class="grid gap-2">
                                        <p class="font-medium">Subject</p>
                                        <input type="text" placeholder="Subject" name="subject"
                                            class="w-full border p-2 outline-fave-500">
                                    </div>
                                    <div class="grid gap-2">
                                        <p class="font-medium">Provide a Detailed Description</p>
                                        <textarea type="text" name="description" placeholder="Description"
                                            class="w-full min-h-[150px] border p-2 outline-fave-500"></textarea>
                                    </div>
                                    <div class="grid gap-2">
                                        <p class="font-medium">Attachment</p>
                                        <input type="file" name="attachment"
                                            class="w-full border p-2 outline-fave-500">
                                    </div>
                                </div>
                                <div>
                                    <button
                                        class="bg-fave-500 py-2 px-8 text-white font-semibold float-right rounded mt-2">Send</button>
                                </div>
                            </form>
                        </div>
                        <div class="grid gap-10 border rounded p-5 mt-5">
                            @foreach ($supports as $support)
                                <div class="grid gap-5">
                                    <div class="flex items-center gap-2">
                                        <img src="{{ asset('uploads/profile/' . $user->profile_photo) ?? asset($user->profile_photo) }}"
                                            alt="img" class="w-14 h-14 rounded-full object-contain">
                                        <div class="grid gap-1">
                                            <h2 class="text-lg font-medium">{{ $user->name }}
                                                <span>({{ $user->role }})</span>
                                            </h2>
                                            <p class="text-xs">{{ $support->created_at }}</p>
                                        </div>
                                    </div>
                                    <div class="grid gap-5">
                                        <p class="text-justify">{{ $support->subject }}</p>
                                        <p class="text-justify">{!! $support->description !!}</p>
                                        <img src="{{ asset('uploads/support/' . $support->attachment) }}" alt="img"
                                            class="w-auto object-contain w-14 h-14 object-contain">
                                    </div>
                                </div>
                                @php
                                    $replySupport = App\Models\ReplySupport::where('support_id', $support->id)->get();
                                @endphp
                                @foreach ($replySupport as $reply)
                                    <div class="grid gap-5">
                                        <div class="flex items-center gap-2">
                                            <img src="{{ asset('uploads/profile/default-profile-image.png') }}"
                                                alt="img" class="w-14 h-14 rounded-full object-contain">
                                            <div class="grid gap-1">
                                                <h2 class="text-lg font-medium"><span
                                                        class="font-bold text-fave-500">Support Center</span></h2>
                                                <p class="text-xs">{{ $reply->created_at }}</p>
                                            </div>
                                        </div>
                                        <p class="text-justify">{{ $reply->subject }}</p>
                                        <div class="grid gap-5">
                                            <p class="text-justify">{!! $reply->description !!}</p>
                                            <img src="{{ asset('uploads/support/' . $reply->attachment) }}"
                                                alt="img" class="w-auto object-contain">
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                    <div id="passwordUpdate" class="tabcontent hidden">
                        <div class="grid gap-5 border rounded px-5">
                            <h2 class="font-medium text-center text-xl mt-2">Password Change</h2>
                            <form method="post" action="{{ route('password.update') }}" class="mt-1"
                                id="updatePasswordForm">
                                @csrf
                                @method('put')
                                <div class="grid gap-4">
                                    <div class="grid gap-2">
                                        <p class="font-medium">Current Password</p>
                                        <input type="password" name="current_password" autocomplete="current-password"
                                            placeholder="Current Password" class="w-full border p-2 outline-fave-500">

                                        <div class="form-group mt-2">
                                            @if ($errors->has('updatePassword.current_password'))
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $errors->first('updatePassword.current_password') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="grid gap-2">
                                        <p class="font-medium">New Password</p>
                                        <input type="password" name="password" autocomplete="new-password"
                                            placeholder="New Password" class="w-full border p-2 outline-fave-500">

                                        <div class="form-group mt-2">
                                            @if ($errors->has('updatePassword.password'))
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $errors->first('updatePassword.password') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="grid gap-2">
                                        <p class="font-medium">Confirm Password</p>
                                        <input type="password" name="password_confirmation" autocomplete="new-password"
                                            placeholder="Confirm Password" class="w-full border p-2 outline-fave-500">
                                        <div class="form-group mt-2">
                                            @if ($errors->has('updatePassword.password_confirmation'))
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $errors->first('updatePassword.password_confirmation') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button
                                        class="bg-fave-500 py-3 px-5 text-white font-semibold float-right rounded">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).on('submit', '#updatePasswordForm', function(e) {
            e.preventDefault();
            var url = $(this).attr('action');
            var data = $(this).serialize();
            $.ajax({
                url: url,
                method: 'POST',
                data: data,
                success: function(data) {
                    toastr.success(data);
                    $('#passwordUpdate').load(location.href + " #passwordUpdate>*", "");
                },
                error: function(xhr) {
                    if (xhr.responseJSON && xhr.responseJSON.error) {
                        toastr.error(xhr.responseJSON.error);
                    } else {
                        toastr.error('The password is incorrect!.');
                    }
                }
            });
        });

        $('.delete-image').on('click', function(e) {
            e.preventDefault();
            let url = $(this).data('href');
            let attachment = $(this).data('attachment');
            let dealer_id = $(this).data('dealer_id');
            $.ajax({
                type: 'GET',
                url: url,
                data: {
                    attachment,
                    dealer_id
                },
                success: function(data) {
                    toastr.success(data.message);
                    var elementId = "attachment_" + data.attachment;
                    var element = document.getElementById(elementId);
                    if (element) {
                        element.style.display = 'none';
                    } else {
                        console.error("Element with ID " + elementId + " not found.");
                    }
                },
                error: function(data) {
                    toastr.error(data.responseJSON.message);
                }
            });
        });

        let openArrow = document.getElementById("openArrow")
        let closeArrow = document.getElementById("closeArrow");
        let tabBox = document.getElementById("tabItem");
        const tabItems = document.querySelectorAll(".tablinks");
        let texts = document.querySelectorAll(".txt");

        function setTabBoxWidth(val) {
            if (window.innerWidth <= 767) {
                tabBox.style.width = val;
                tabBox.style.overflow = "hidden";
            } else {
                tabBox.style.width = "";
            }
        }

        setTabBoxWidth('48px');
        window.addEventListener("resize", setTabBoxWidth);

        openArrow.addEventListener("click", () => {
            tabBox.classList.remove("hidden");
            openArrow.classList.add("hidden");
            closeArrow.classList.remove("hidden");
            texts.forEach(textElement => {
                textElement.classList.remove("hidden");
            });
            setTabBoxWidth('270px');
            // tabBox.style.transition = 'width 1s ease';
        });

        closeArrow.addEventListener("click", () => {
            closeArrow.classList.add("hidden");
            openArrow.classList.remove("hidden");
            texts.forEach(textElement => {
                textElement.classList.add("hidden");
            });
            setTabBoxWidth('48px');
        });


        function openTab(evt, cityName) {
            // Declare all variables
            var i, tabcontent, tablinks;

            // Get all elements with class="tabcontent" and hide them
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            // Get all elements with class="tablinks" and remove the class "active"
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            // Show the current tab, and add an "active" class to the link that opened the tab
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>
@endpush
