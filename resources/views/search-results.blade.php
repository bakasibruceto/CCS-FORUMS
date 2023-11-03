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
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Admin Dashboard') }} --}}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @if ($results->count() > 0)
                    <ul>
                        @foreach ($results as $result)
                            <a href="{{ route('user.show', ['user' => $result->username]) }}">
                                {{ $result->username }}
                            </a>
                            @auth
                                @if(auth()->user()->username != $result->username)
                                    @livewire('user-follow', ['userId' => $result->id])
                                @endif
                            @endauth
                            <br>
                        @endforeach
                    </ul>
                @else
                    <p>No results found.</p>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
