<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 ">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="">
        @csrf
        @method('patch')
        <div class="">
            <div class="">
                <label for="name" value="{{ __('Name') }}" ></label>
                <input id="name" name="name" type="text" class="form-control border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" value="{{ old('name', $user->name) }}"
                    required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <div class="">
                <div>
                    <label for="email" value="{{ __('Email') }}" ></label>
                    <input id="email" name="email" type="email" class="form-control border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm " value="{{ old('email', $user->email) }}"
                        required autocomplete="username" />
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />

                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                        <div>
                            <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                                {{ __('Your email address is unverified.') }}

                                <button form="send-verification"
                                    class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                    {{ __('Click here to re-send the verification email.') }}
                                </button>
                            </p>

                            @if (session('status') === 'verification-link-sent')
                                <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                    {{ __('A new verification link has been sent to your email address.') }}
                                </p>
                            @endif
                        </div>
                    @endif
                </div>

                <div class="flex items-center justify-end gap-4 mt-3 ">
                    <button class="py-2 px-5 rounded bg-[#007bff] text-white font-bold ">{{ __('Save') }}</button>

                    @if (session('status') === 'profile-updated')
                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </form>
</section>