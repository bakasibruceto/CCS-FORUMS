<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User-Dashboard') }}
        </h2>
    </x-slot>


    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <main class="container mx-auto p-4">
                        <div class="text-center">
                            <!-- Display user's profile picture -->
                            <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}"
                                class="w-32 h-32 rounded-full mx-auto mb-4">

                            <!-- Display user's name -->
                            <h1 class="text-2xl font-bold">{{ $user->username }}</h1>
                            @auth
                                @if (auth()->user()->username != $user->username)
                                    @livewire('user-follow', ['userId' => $user->id])
                                @endif

                            @endauth

                            <p>following {{ $totalFollowing }} </p>
                            <p>follower {{ $totalFollowers }}</p>
                        </div>


                </main>
            </div>
        </div>
    </div>
</x-app-layout>




