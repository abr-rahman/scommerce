{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

@extends('frontend.layouts.master_frontend')
@section('pageTitle'){{ __('Forgot Password') }}@endsection
@section('section')
<div class="max-w-[400px] mx-auto shadow p-5 border mx-5 my-20 rounded-lg">
    <div class="card-body login-card-body">
        <p class="login-box-msg">{{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}</p>

        <x-auth-session-status class="mb-4 text-success text-center text-md" :status="session('status')" />
        <div class="mt-4 grid gap-5">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="input-group mb-3">
                    <style>
                        .form-control {
                            border: 1px solid #ddd;
                            border-radius: 5px;
                            padding: 8px 5px 7px;
                            width: 100%;
                        }
                        .btn {
                            border: 1px solid #ddd;
                            padding: 10px;
                            border-radius: 5px;
                            background: #fd9423;
                            color: #fff;
                            text-decoration: inherit;
                        }
                    </style>
                    <input id="email" class="form-control" placeholder="Email" type="email" name="email" value="{{ old('email') }}" required autofocus />

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div class="row">
                    <div class="col-12 ">
                        <button type="submit" class="w-full p-3 bg-fave-500 rounded text-white font-bold">{{ __('Email Password Reset Link') }}</button>
                    </div>
                </div>
            </form>
            <div class="grid justify-center text-gray-600 hover:text-fave-500">
                <p class="mt-3 mb-1">
                    <a class="btn" href="{{ route('login') }}">Login</a>
                </p>
            </div>
            <p class="mb-0">
                <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
            </p>
        </div>
    </div>
</div>
@endsection
