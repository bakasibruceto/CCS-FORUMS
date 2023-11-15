<x-app-layout>
    <div class="flex flex-1 overflow-hidden">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-0 flex justify-between grid-cols-3 w-full">
            {{-- <x-sidebar /> --}}
            <div>
                <div class="pt-5 grid grid-cols-1 lg:grid-cols-2">
                    <div class="rounded-lg bg-gray-100">
                        <h1>Forum</h1>
                    </div>
                    <div class="rounded-lg bg-gray-100">
                        <a class="inline-block rounded border border-indigo-600 bg-indigo-600 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500"
                            href="{{ route('create-thread') }}">
                            Create Thread
                        </a>
                    </div>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-2">
                    <div class="rounded-lg bg-gray-100">
                        <h1>{{ $forumPosts->total() }} threads</h1>
                    </div>
                    <div class="rounded-lg bg-gray-100">
                        <span class="inline-flex -space-x-px overflow-hidden rounded-md border bg-white shadow-sm">
                            <button
                                class="inline-block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:relative">
                                Recent
                            </button>

                            <button
                                class="inline-block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:relative">
                                Resolved
                            </button>

                            <button
                                class="inline-block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:relative">
                                Unresolved
                            </button>
                        </span>
                        <div class="inline-flex -space-x-px overflow-hidden rounded-md border bg-white shadow-sm">
                            <button
                                class="inline-block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:relative">
                                Tag Filter
                            </button>
                        </div>

                    </div>

                </div>
                @foreach ($forumPosts as $post)
                    <div class="pt-3">
                        <div class="rounded-lg bg-gray-100 p-3">
                            <div>
                                <img src="{{ $post->user->profile_photo_url }}" alt="">
                                <strong>{{ $post->user->username }}</strong> posted
                                {{ $post->created_at->diffForHumans() }}
                            </div>
                            <div>
                                Tags: {{ $post->tags }}
                            </div>
                        </div>
                        <div class="rounded-lg bg-gray-100 p-3 mt-2 prose">
                            <a href="{{ route('user-post.show', ['postId' => $post->id]) }}">
                                <h2>Titile:{{ $post->title }}</h2>
                            </a>
                        </div>
                        <div class="rounded-lg p-3 mt-2">
                            @livewire('markdown-parser', ['markdown' => $post->markdown])
                            {{-- {!! Parsedown::instance()->text($post->markdown) !!} --}}
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
                    </div>
                @endforeach


                <div>
                    {{-- Pagination --}}
                    {{ $forumPosts->links() }}
                </div>

            </div>
            <x-left-box />
        </div>
    </div>

</x-app-layout>
