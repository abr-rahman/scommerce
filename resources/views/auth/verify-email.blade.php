@extends('frontend.layouts.master_frontend')
@section('pageTitle'){{ __('Verify Email') }}@endsection
@section('section')
    <div class="max-w-[400px] mx-auto shadow p-5 border mx-5 my-20 rounded-lg">
        <div class="mb-4 text-sm text-gray-600 dark:text-gray-800 p-3 text-center">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400 p-3">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="mt-4 grid gap-5">
            <div class="">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <div class="grid justify-center text-gray-600 hover:text-fave-500 underline">
                        <button class="">
                            {{ __('Resend Verification Email') }}
                        </button>
                    </div>
                </form>
            </div>

            <div class="">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full p-3 bg-fave-500 rounded text-white font-bold">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400 p-3 text-justify">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400 p-3">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 grid grid-cols-2">
        <div class="">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <div>
                    <button>
                        {{ __('Resend Verification Email') }}
                    </button>
                </div>
            </form>
        </div>

        <div class="">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>

    </div>
</x-guest-layout> --}}
