<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-0 flex justify-between grid-cols-3 w-full">
        {{-- <x-sidebar /> --}}
        <div>



            <div class="pt-3">
                <div class="rounded-lg bg-gray-100 p-3">
                    <div>
                        <img src="{{ $post->user->profile_photo_url }}" alt="">
                        <strong>{{ $post->user->username }}</strong> posted {{ $post->created_at->diffForHumans() }}
                    </div>
                    <div>
                        Tags: {{ $post->tags }}
                    </div>
                </div>
                <div class="rounded-lg bg-gray-100 p-3 mt-2">
                    <a href="{{ route('user-post.show', ['postId' => $post->id]) }}">
                        <h2>{{ $post->title }}</h2>
                    </a>
                </div>
                <div class="rounded-lg p-3 mt-2">
                    @livewire('markdown-parser', ['markdown' => $post->markdown])
                </div>
                <div class="rounded-lg bg-gray-100 p-3 mt-2">
                    Total Likes:
                    {{-- {{ $post->likes->count() }} --}}
                    Total Discussions:
                    {{-- {{ $post->discussions->count() }} --}}
                    {{-- @if ($post->solved)
                        Solved
                    @else
                        Unsolved
                    @endif --}}
                </div>
                {{-- foreach --}}
                {{-- replies --}}
                <div>
                    {{-- if reply is marked as solution include checkmark --}}
                    profilepic name timestamp tags triple checkmark solution dot
                </div>
                <div>
                    content
                    <br>
                    <br>
                    last updated
                    <br>
                    <br>
                    likes Solution selected by @ moderater
                </div>
                <div>
                    Write a replay
                    <div>
                        write preview
                    </div>
                    <div>
                        textbox
                    </div>
                    <div>
                        reply button
                    </div>

                </div>
            </div>
        </div>
        <x-left-box />
    </div>

    </x-app-layot>
