<x-app-layout>
    <div class="flex flex-1 overflow-hidden">

        <div class="flex flex-col flex-1">
            <div class="block md:grid md:grid-flow-row-dense md:grid-cols-3 md:grid-rows-3 md:ml-6">
                {{-- <x-sidebar /> --}}
                    <div class="col-span-2">
                        <div class="container mx-auto px-0 p-6">
                            <div class="flex items-center justify-between rounded-lg md:w-full mb-5 p-4 w-full">
                                <p class="font-bold text-gray-900 text-3xl pb-2">Forum</p>
                                <div class="rounded-lg bg-gray-100">
                                    <a class="inline-block rounded border border-indigo-600 bg-indigo-600 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500"
                                        href="{{route('create-thread')}}">
                                            Create Thread
                                        </a>
                                </div>
                            </div>
                        </div>
                        <div class="container mx-auto px-4 p-6 -mt-16 mb-6">
                            <div class="grid grid-cols-1 lg:grid-cols-2">
                                <div class="rounded-lg font-semibold text-gray-700">
                                    <h1>{{ $forumPosts->total() }} threads</h1>
                                </div>
                                <div class="rounded-lg flex gap-2 lg:justify-end">
                                    <span class="inline-flex -space-x-px overflow-hidden rounded-md border bg-white shadow-sm">
                                        <button
                                            class="inline-block px-4 py-2 text-sm font-medium text-gray-700 hover:text-white hover:bg-sky-950 focus:relative">
                                            Recent
                                        </button>

                                        <button
                                            class="inline-block px-4 py-2 text-sm font-medium text-gray-700 hover:text-white hover:bg-sky-950 focus:relative">
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
                        </div>
                        <div class="rounded-lg bg-gray-100 p-3 mt-2 prose">
                            <a href="{{ route('user-post.show', ['postId' => $post->id]) }}">
                                <h2>Titile:{{ $post->title }}</h2>
                            </a>
                        </div>
                        <div class="rounded-lg p-3 mt-2">
                            {{-- @livewire('markdown-parser', ['markdown' => $post->markdown]) --}}
                            {{-- {!! Parsedown::instance()->text(\Illuminate\Support\Str::limit($post->markdown, 50)) !!} --}}
                            {{-- {{$post->markdown}} --}}
                            <p>{{ \Illuminate\Support\Str::limit($post->markdown, 50) }}</p>
                            <a href="{{ route('user-post.show',['postId' => $post->id]) }}">Read more</a>
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

                            @foreach ($forumPosts as $post)
                            <div class="container mx-auto px-4 p-6 -mt-12">
                                <div class="bg-white shadow rounded-lg mb-5 p-3 md:w-full">
                                    <div class="flex items-center mb-3 gap-2">
                                        <img class="rounded-full mr-3" src="{{$post->user->profile_photo_url}}" alt="">
                                        <strong>{{ $post->user->username }}</strong> posted {{ $post->created_at->diffForHumans() }}
                                    </div>
                                    <div class="pl-3">
                                        Tags: {{ $post->tags }}
                                    </div>
                                    <div class="rounded-lg p-2 pl-3">
                                        <h2>{{ $post->title }}</h2>
                                    </div>

                                    <div class="rounded-lg p-3 mt-2">
                                        {!! Parsedown::instance()->text($post->markdown) !!}
                                    </div>
                                    <div class="rounded-lg bg-gray-100 p-3 mt-2">
                                        {{-- Total Likes: {{ $post->likes->count() }} --}}
                                        {{-- Total Discussions: {{ $post->discussions->count() }} --}}
                                        {{-- @if ($post->solved)
                                            Solved
                                        @else
                                            Unsolved
                                        @endif --}}
                                    </div>
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
        </div>
    </div>

</x-app-layout>
