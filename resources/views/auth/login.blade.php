<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600" style="color: #866C35;">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" style="background-color: #222; color: #866C35; padding: 20px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); text-align: center;">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" style="color: #fff;" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" style="background-color: #333; color: #fff; border: 1px solid #555; border-radius: 5px; padding: 10px; margin-top: 4px;" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" style="color: #fff;" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" style="background-color: #333; color: #fff; border: 1px solid #555; border-radius: 5px; padding: 10px; margin-top: 4px;" />
            </div>

            <div class="block mt-4">
    <label for="remember_me" class="flex items-center" style="color: #fff;">
        <x-checkbox id="remember_me" name="remember" />
        <span class="ml-2 text-sm text-white">{{ __('Remember me') }}</span>
    </label>
</div>

            <div class="flex items-center justify-center mt-4"> <!-- Center the login button -->
                <x-button class="ml-4" style="background-color: #866C35; color: #fff; border: none; border-radius: 5px; padding: 10px 20px; cursor: pointer; transition: background-color 0.3s;">
                    {{ __('Log in') }}
                </x-button>
            </div>

            <div class="text-center mt-4"> <!-- Center the "Forgot your password?" link -->
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-#ffffff hover:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}" style="color: #ff9900;">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
