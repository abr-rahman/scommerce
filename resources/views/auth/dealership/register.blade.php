@extends('frontend.layouts.master_frontend')
@section('pageTitle'){{ __('Become A Dealer') }}@endsection
@section('section')
    <div class="relative">
        <img src="{{ asset('frontend/images/contact-about-bg.webp') }}" alt="img" class="min-h-[220px] object-cover">
        <div class="absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%]">
            <h2 class="text-[18px] text-center sm:text-[30px] font-bold text-white bg-white/50 py-2 px-5 rounded uppercase">Become A Dealer</h2>
        </div>
    </div>
    <div class="mx-auto w-full max-w-screen-lg px-6 py-10 ">
        <div class="">
            <div class="grid items-start gap-10 border p-5">
                <form method="POST" action="{{ route('register.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="grid md:flex items-start gap-10">
                        <div class=" flex-1 grid gap-5">
                            <div class="grid gap-2">
                                <p class="font-semibold">Name <span class="text-red-600">*</span></p>
                                <input type="text" name="name" value="{{ old('name') }}" placeholder="Name" class="w-full border p-2 outline-fave-500 rounded">
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback text-red-600">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="grid gap-2">
                                <p class="font-semibold">Email <span class="text-red-600">*</span></p>
                                <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" class="w-full border p-2 outline-fave-500 rounded">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback text-red-600">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="grid gap-2">
                                <p class="font-semibold">Phone Number <span class="text-red-600">*</span></p>
                                <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Phone Number" class="w-full border p-2 outline-fave-500 rounded">
                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback text-red-600">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="grid gap-2">
                                <p class="font-semibold">Organization Name <span class="text-red-600">*</span></p>
                                <input type="text" name="business_name" value="{{ old('business_name') }}" placeholder="Organization Name" class="w-full border p-2 outline-fave-500 rounded">
                                @if ($errors->has('business_name'))
                                    <span class="invalid-feedback text-red-600">
                                        <strong>{{ $errors->first('business_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="grid gap-2">
                                <p class="font-semibold">Address <span class="text-red-600">*</span></p>
                                <input type="text" name="business_address" value="{{ old('business_address') }}" placeholder="Address" class="w-full border p-2 outline-fave-500 rounded">
                                @if ($errors->has('business_address'))
                                    <span class="invalid-feedback text-red-600">
                                        <strong>{{ $errors->first('business_address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="flex-1 grid gap-2 relative">
                            <div class="grid gap-2">
                                <p class="font-semibold">Trade License Number <span class="text-red-600">*</span></p>
                                <input type="text" name="trade_license_number" value="{{ old('trade_license_number') }}" placeholder="Trade License Number" class="w-full border p-2 outline-fave-500 rounded">
                                @if ($errors->has('trade_license_number'))
                                    <span class="invalid-feedback text-red-600">
                                        <strong>{{ $errors->first('trade_license_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <p class="text-center font-semibold">Upload Your File</p>
                            <div class="grid gap-5">
                                <div class="grid gap-2">
                                    <div class="border hover:bg-slate-100 cursor-pointer">
                                        <label for="file" class="cursor-pointer ">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto pt-5" width="50" height="50" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                                <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                                                <path d="M12 11v6"></path>
                                                <path d="M9.5 13.5l2.5 -2.5l2.5 2.5"></path>
                                            </svg>
                                            <p class="pb-5 text-center font-semibold">Select File</p>
                                            <input type="file" name="attachment[]" id="file" class="cursor-pointer" multiple>
                                        </label>
                                    </div>
                                    <p> Trade Licence / NID / TIN / BIN</p>
                                </div>
                            </div>
                            <div class="grid gap-2">
                                <p class="font-semibold">Password <span class="text-red-600">*</span></p>
                                <input type="password" name="password" placeholder="••••••••"  class="w-full border p-2 outline-fave-500 rounded"  required autocomplete="current-password">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback text-red-600">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="grid gap-2">
                                <p class="font-semibold">Password Confirmation <span class="text-red-600">*</span></p>
                                <input type="password" name="password_confirmation" placeholder="••••••••"  class="w-full border p-2 outline-fave-500 rounded"  required autocomplete="password_confirmation">
                                @if ($errors->has('password_confirmation'))
                                    <span class="invalid-feedback text-red-600">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="mx-auto flex items-center justify-center pt-2">
                        <button class="font-semibold bg-fave-500 text-white py-2 px-5 rounded min-w-[200px]">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- <div class="mx-auto w-full xl:container px-6 py-10">
        <section class="">
            <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto lg:py-0">
                <div class="w-full bg-white rounded-lg shadow-lg border md:mt-0 sm:max-w-md xl:p-0 ">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h2 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-3xl ">
                            Sign up to your account
                        </h2>
                        <form method="POST" action="{{ route('register.store') }}" class="space-y-4 md:space-y-6">
                            @csrf
                            <div>
                                <label for="business_name" class="block mb-2 text-sm font-medium text-gray-900 ">{{ __('Business Name') }}</label>
                                <input type="name" name="business_name" id="business_name" value="{{ old('business_name') }}" required  autofocus autocomplete="username" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Business Name" required="">

                                @if ($errors->has('business_name'))
                                    <span class="invalid-feedback text-red-600">
                                        <strong>{{ $errors->first('business_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div>
                                <label for="business_address" class="block mb-2 text-sm font-medium text-gray-900 ">{{ __('Business Address') }}</label>
                                <input type="business_address" name="business_address" id="business_address" value="{{ old('business_address') }}" required  autofocus autocomplete="username" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Business Address" required="">

                                @if ($errors->has('business_address'))
                                    <span class="invalid-feedback text-red-600">
                                        <strong>{{ $errors->first('business_address') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div>
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Your Name</label>
                                <input type="name" name="name" id="name" value="{{ old('name') }}" required  autofocus autocomplete="username" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Full Name" required="">

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback text-red-600">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Your email</label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" required  autofocus autocomplete="username" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="name@company.com" required="">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback text-red-600">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div>
                                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 ">Your Phone</label>
                                <input type="phone" name="phone" id="phone" value="{{ old('phone') }}" required  autofocus autocomplete="username" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Phone" required="">

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback text-red-600">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div>
                                <label for="trade_license_number" class="block mb-2 text-sm font-medium text-gray-900 ">Trade License Number</label>
                                <input type="text" name="trade_license_number" id="trade_license_number" value="{{ old('trade_license_number') }}" required  autofocus autocomplete="username" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Trade License Number" required="">

                                @if ($errors->has('trade_license_number'))
                                    <span class="invalid-feedback text-red-600">
                                        <strong>{{ $errors->first('trade_license_number') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div>
                                <label for="trade_license_number" class="block mb-2 text-sm font-medium text-gray-900 ">{{ __('Attachment (NID, TIN, Trade (Photos))') }}</label>
                                <input type="file" name="attachment" value="{{ old('attachment') }}" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Trade License Number">
                            </div>

                            <div>
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
                                <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required autocomplete="current-password">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback text-red-600">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div>
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Password Confirmation</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required autocomplete="password_confirmation">
                                @if ($errors->has('password_confirmation'))
                                    <span class="invalid-feedback text-red-600">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <button type="submit" class="w-full text-white bg-primary-600 bg-slate-700 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Sign up</button>
                            <p class="text-sm font-light text-gray-500 ">
                                I have an already account! <a href="{{ route('login') }}" class="font-medium text-primary-600 hover:underline">Sign in</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div> --}}
@endsection
