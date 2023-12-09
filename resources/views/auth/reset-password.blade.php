{{-- <x-guest-layout> --}}
{{-- <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form> --}}

{{-- <html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Recover Password</title>
    <link rel="stylesheet" href="/asset/dist/css/adminlte.min.css?v=3.2.0">
</head>

<body class="login-page" style="min-height: 386.781px;">
    <div class="login-box">
        <div class="login-logo">
            <a href="/"><b>Sa</b>Lamat</a>
        </div>

        <div class="card">

        </div>
    </div>
</body>

</html>
</x-guest-layout> --}}

@extends('frontend.layouts.master_frontend')
@section('pageTitle'){{ __('Reset Password') }}@endsection
@section('section')
    <div class="max-w-[400px] mx-auto shadow p-5 border mx-5 my-20 rounded-lg">

            <div class="card-body login-card-body">
                <p class="login-box-msg">You are only one step a way from your new password, recover your password now.
                </p>
                <form method="POST" action="{{ route('password.store') }}">
                    @csrf
                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
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
                    <div class="input-group my-3">
                        <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                    </div>
                    <div class="input-group mb-3">
                        <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" placeholder="New Password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
                    </div>
                    <div class="input-group mb-3">
                        <x-text-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password"/>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-danger" />
                    </div>
                    <div class="row">
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary bg-primary btn-block">Reset password</button>
                        </div>
                    </div>
                </form>
            </div>
    </div>
@endsection
