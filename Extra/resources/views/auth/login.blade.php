<x-guest-layout>
    <div class="flex flex-col justify-center items-center py-4 bg-white border-2 border-red-500 bg-gray-200">
        <x-auth-session-status class="mb-2" :status="session('status')" />

        <div class="bg-gray-400 p-4 rounded-lg shadow-md w-80 border-2">
            <div class="mb-6" style="display: flex; justify-content: center; align-items: center;">
                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                </svg>
            </div>

            <h2 class="text-xl font-semibold text-gray-800 text-center mb-2">Welcome To Chirps</h2>
            <form method="POST" action="{{ route('login') }}">
                
                @csrf

                <!-- Email Address -->
                <div class="mb-2">
                    <x-input-label for="email" :value="__('Email')" style="color: black;" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-1" />
                </div>

                <!-- Password -->
                <div class="mb-2">
                    <x-input-label for="password" :value="__('Password')" style="color: black;" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-1" />
                </div>

                <!-- Remember Me -->
                <div class="mb-2">
                    <label for="remember_me" class="inline-flex items-center" >
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember" >
                        <span class="ml-1 text-sm" style="color: black;">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-between text-center">
                    <a class="text-sm text-red-600 hover:underline" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                </div>

                <div class="flex items-center justify-center mt-2">
                    <x-primary-button class="bg-red-600 hover:bg-red-700">
                        {{ __('LOGIN') }}
                    </x-primary-button>
                </div>

            </form>
        </div>
    </div>
</x-guest-layout>
