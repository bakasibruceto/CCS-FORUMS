{{-- @extends('layouts.app')

@section('content')
    <h1>Search Results</h1>

    @if ($results->count() > 0)
        <ul>
            @foreach ($results as $result)
                <li>{{ $result->name }}</li>
            @endforeach
        </ul>
    @else
        <p>No results found.</p>
    @endif
@endsection --}}

<x-app-layout>
    <div class="flex flex-1 overflow-hidden">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-0 flex justify-between grid-cols-3 w-full">
            {{-- <x-searchresult-sidebar /> --}}
                <div class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                    <div class="container py-8 mx-auto md:px-8">
                        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 px-6">
                            <div class="bg-white overflow-hidden shadow-xl rounded-lg p-4">
                                <p class="font-bold text-gray-800 text-xl pb-2 border-b border-gray-200">Users</p>
                                @if ($results->count() > 0)
                                    <ul class="flex item-center justify-between font-semibold pt-4">
                                        @foreach ($results as $result)
                                            <a class="text-lg" href="{{ route('user.show', ['user' => $result->username]) }}">
                                                {{ $result->username }}
                                            </a>
                                                @auth
                                                @if(auth()->user()->username != $result->username)
                                                    @livewire('counter.user-follow', ['userId' => $result->id])
                                                @endif
                                            @endauth
                                            <br>
                                        @endforeach
                                    </ul>
                                @else
                                    <p>No results found.</p>
                                @endif

                                <button class=" mt-8 bg-gray-200 hover:bg-gray-300 font-semibold text-gray-600 w-full rounded-lg py-2">
                                    see all
                                </button>
                            </div>
                         </div>

                         <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 px-6 mt-4">
                            <div class="bg-white overflow-hidden shadow-xl rounded-lg p-4">
                                <p class="font-bold text-gray-800 text-xl pb-2 border-b border-gray-200">Posts</p>

                            </div>
                         </div>

                    </div>
                </div>
        </div>
    </div>
</x-app-layout>
