<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}" style="background-color: #222; color: #866C35; padding: 20px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); text-align: center;">

            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" style="color: #fff;" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" style="background-color: #333; color: #fff; border: 1px solid #555; border-radius: 5px; padding: 10px; margin-top: 4px;" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" style="color: #fff;" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" style="background-color: #333; color: #fff; border: 1px solid #555; border-radius: 5px; padding: 10px; margin-top: 4px;" />
            </div>

            <div class="mt-4">
                <x-label for="phone" value="{{ __('Phone') }}" style="color: #fff;" />
                <x-input id="phone" class="block mt-1 w-full" type="number" name="phone" :value="old('phone')" required style="background-color: #333; color: #fff; border: 1px solid #555; border-radius: 5px; padding: 10px; margin-top: 4px;" />
            </div>

            <div>
                <x-label for="address" value="{{ __('Address') }}" style="color: #fff;" />
                <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required style="background-color: #333; color: #fff; border: 1px solid #555; border-radius: 5px; padding: 10px; margin-top: 4px;" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" style="color: #fff;" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" style="background-color: #333; color: #fff; border: 1px solid #555; border-radius: 5px; padding: 10px; margin-top: 4px;" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" style="color: #fff;" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" style="background-color: #333; color: #fff; border: 1px solid #555; border-radius: 5px; padding: 10px; margin-top: 4px;" />
            </div>

            <div class="flex items-center justify-center mt-4">
                <x-button class="ml-4" style="background-color: #866C35; color: #fff; border: none; border-radius: 5px; padding: 10px 20px; cursor: pointer; transition: background-color 0.3s;">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>

        <div class="mt-4 text-center">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
        </div>
    </x-authentication-card>
</x-guest-layout>
