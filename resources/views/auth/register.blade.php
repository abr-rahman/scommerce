@extends('frontend.layouts.master_frontend')
@section('pageTitle'){{ __('Register') }}@endsection
@section('section')
    <div class="relative">
        <img src="{{ asset('frontend/images/contact-about-bg.webp') }}" alt="img" class="min-h-[220px] object-cover">
        <div class="absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%]">
            <h2 class="text-[18px] text-center sm:text-[30px] font-bold text-white bg-white/50 py-2 px-5 rounded uppercase">Register account</h2>
        </div>
    </div>
    <div class="mx-auto w-full xl:container px-6 py-10">
        <section class="">
            <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto lg:py-0">
                <div class="w-full bg-white rounded-lg shadow-lg border md:mt-0 sm:max-w-md xl:p-0 ">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h2 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-3xl ">
                            Sign up to your account
                        </h2>
                        <form method="POST" action="{{ route('register') }}" class="space-y-4 md:space-y-6">
                            @csrf
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
    </div>
@endsection
