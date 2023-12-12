<x-guest-layout>
    <x-authentication-card>
        {{-- <div>
            <div>
                testing
            </div>
            <div>
                testing
            </div>
        </div> --}}
        <x-slot name="logo" >
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <div class="flex flex-col space-y-2 text-center mb-5">
            <h1 class="text-gray-800 font-bold text-3xl">Hello, Clever Fox!</h1>
            <p class="text-sm">Join the Fox-clusive Student Forum: Where Curiosity Meets Cunning!</p>
        </div>
        <div class="test">
            <h1>Testing</h1>
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="flex items-center">
                <x-input id="email" class="block mt-1 w-full " type="text" placeholder="Email / Username"
                    name="login" :value="old('login')" autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-input id="password" class="block mt-1 w-full" type="password" placeholder="Password" name="password"
                    autocomplete="current-password" />
            </div>

            <div class="mt-4 grid grid-cols-2 gap-36">

                <div>
                    <label for="remember_me" class="flex items-center ">
                        <x-checkbox id="remember_me" name="remember" />
                        <span class="ml-2 text-sm dark:text-gray-300">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="justify-end">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-blue-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            href="{{ route('password.request') }}">
                            {{ __('Forget Password?') }}
                        </a>
                    @endif
                </div>


            </div>

            <div class="flex items-center justify-center mt-7">
                <x-buttonGuest class="font-bold w-full">
                    {{ __('Sign in') }}
                </x-buttonGuest>
            </div>
            <div class="flex items-center justify-center mt-4">
                <p>
                    Don't have an account?&nbsp;
                </p>
                <a class="underline text-sm font-bold text-gray-600 hover:text-blue-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('register') }}">
                    {{ __('Register') }}
                </a>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>

