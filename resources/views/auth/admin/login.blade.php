@extends('frontend.layouts.master_frontend')
@section('pageTitle'){{ __('Login') }}@endsection
@section('section')
    <!-- Session Status -->
    <x-auth-session-status class="mt-4 text-center text-success text-lg" :status="session('status')" />

    <div class="mx-auto w-full xl:container px-6 py-10">
        <section class="">
            <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto lg:py-0">
                <div class="w-full bg-white rounded-lg shadow-lg border md:mt-0 sm:max-w-md xl:p-0 ">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h2 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-3xl ">
                            Sign in to your account
                        </h2>
                        <form method="POST" action="{{ route('admin.login_store') }}" class="space-y-4 md:space-y-6">
                            @csrf
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
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="remember" name="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="remember" class="text-gray-500">Remember me</label>
                                    </div>
                                </div>
                                @if (Route::has('password.request'))
                                    <a class="text-sm font-medium text-primary-600 hover:underline"  href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
                                @endif
                            </div>
                            <button type="submit" class="w-full text-white bg-primary-600 bg-slate-700 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Sign in</button>
                            <p class="text-sm font-light text-gray-500 ">
                                Don’t have an account yet? <a href="{{ route('register') }}" class="font-medium text-primary-600 hover:underline">Sign up</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
