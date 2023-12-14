<x-app-layout>
    <div class="flex flex-1 overflow-hidden">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-0 flex justify-between grid-cols-3 w-full">
            <div class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                <div class="container py-8 mx-auto md:px-8">
                    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 px-6">
                        <div class="bg-white overflow-hidden shadow-xl rounded-lg p-4">
                            <p class="font-bold text-gray-800 text-xl pb-2 border-b border-gray-200">Users</p>
                            @if ($userResults->count() > 0)
                                <ul class="item-center justify-between font-semibold pt-4">
                                    @foreach ($userResults as $result)
                                        <div class="flex p-3 items-center">
                                            <a href="{{ route('user.show', ['user' => $result->username]) }}">
                                                <img class="rounded-full mr-2 ml-1 w-10 h-10"
                                                    src="{{ $result->profile_photo_url }}" alt="">
                                            </a>
                                            <a class="text-lg"
                                                href="{{ route('user.show', ['user' => $result->username]) }}">
                                                {{ $result->username }}
                                            </a>
                                            @auth
                                                @if (auth()->user()->username != $result->username)
                                                    <div class="pl-5">
                                                        @livewire('counter.user-follow', ['userId' => $result->id])
                                                    </div>
                                                @endif
                                            @endauth
                                        </div>
                                    @endforeach
                                </ul>
                                <button
                                    class=" mt-8 bg-gray-200 hover:bg-gray-300 font-semibold text-gray-600 w-full rounded-lg py-2">
                                    see all
                                </button>
                            @else
                                <p>No results found.</p>
                            @endif


                        </div>
                    </div>

                    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 px-6 mt-4">
                        <div class="overflow-hidden mt-8">
                            <p class="font-bold text-gray-800 text-xl pl-2">Posts</p>
                        </div>
                        @if ($postResults->count() > 0)
                            <div class="mt-3">
                                @foreach ($postResults as $post)
                                    <x-forum-thread-list :post="$post" />
                                @endforeach
                            </div>
                        @else
                            <div class="bg-white overflow-hidden shadow-xl rounded-lg p-4 mt-4">
                                <p>No results found.</p>
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
