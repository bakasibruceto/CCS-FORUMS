<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-0 flex justify-between grid-cols-3 w-full">
        <div class="flex flex-col flex-1">
            <div class="block md:grid md:grid-flow-row-dense md:grid-cols-3 md:grid-rows-3 md:ml-6">
                {{-- <x-sidebar /> --}}
                <div class="col-span-2">
                    <div class="container mx-auto px-0 p-6">
                        <div class="flex items-center justify-between rounded-lg md:w-full mb-5 p-4 w-full">
                            <p class="font-bold text-gray-900 text-4xl pb-2">Forum</p>
                            <div class="rounded-lg bg-gray-100">
                                <a class="inline-block rounded border border-indigo-600 bg-indigo-600 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500"
                                    href="{{ route('create-thread') }}">
                                    Create Thread
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="container mx-auto px-4 p-6 -mt-16 mb-6">
                        <div class="grid grid-cols-1 lg:grid-cols-2">
                            <div class="rounded-lg font-bold text-gray-700">
                                <h1>{{ $forumPosts->total() }} Threads</h1>
                            </div>
                            <div class="rounded-lg flex gap-2 lg:justify-end">
                                <span
                                    class="inline-flex -space-x-px overflow-hidden rounded-md border shadow-sm">
                                    <button
                                        class="bg-sky-950 inline-block px-4 py-2 text-sm font-medium text-white hover:text-white hover:bg-sky-700 focus:relative active:bg-sky-950 active:text-white">
                                        Recent
                                    </button>

                                    <button
                                        class="bg-white inline-block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-slate-50 focus:relative">
                                        Resolved
                                    </button>

                                    <button
                                        class="bg-white inline-block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-slate-50 focus:relative">
                                        Unresolved
                                    </button>

                                </span>
                                <div
                                    class="inline-flex -space-x-px overflow-hidden rounded-md border bg-white shadow-sm">
                                    <button
                                        class="inline-block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-slate-50 focus:relative">
                                        Tag Filter
                                    </button>
                                </div>


                            </div>
                        </div>
                    </div>

                    @foreach ($forumPosts as $post)
                        <div class="container mx-auto px-4 p-6 -mt-12">
                            <div class="bg-white shadow rounded-lg mb-5 p-3 md:w-full">
                                <div class="flex items-center mb-3 gap-1 ">
                                    <img class="rounded-full mr-2 ml-1 w-10 h-10"
                                        src="{{ $post->user->profile_photo_url }}" alt="">
                                    <strong class="mr-2">{{ $post->user->username }}</strong> posted
                                    {{ $post->created_at->diffForHumans() }}
                                    Tags: {{ $post->tags }}
                                </div>
                                <div class="rounded-lg pl-3 text-2xl font-bold ">
                                    <a class="hover:underline"
                                        href="{{ route('user-post.show', ['postId' => $post->id]) }}">{{ $post->title }}</a>
                                </div>

                                <div class="rounded-lg p-3 -mt-3 text-slate-500">
                                    <p>{{ \Illuminate\Support\Str::limit($post->markdown, 50) }}</p>
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

{{-- <p>{{ \Illuminate\Support\Str::limit($post->markdown, 50) }}</p>
<a href="{{ route('user-post.show',['postId' => $post->id]) }}">Read more</a> --}}
