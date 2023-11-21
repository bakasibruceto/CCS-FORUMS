<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-0 flex justify-between grid-cols-3 w-full">
        <div class="flex flex-col flex-1">
            <div class="grid grid-cols-1 lg:grid-cols-4 lg:gap-3 p-10">
                <div class="col-span-3">
                    {{-- <x-sidebar /> --}}
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
                                <span class="inline-flex -space-x-px overflow-hidden rounded-md border shadow-sm">
                                    <button
                                        class="inline-block px-4 py-2 text-sm font-medium text-white bg-sky-900 hover:bg-sky-950 focus:relative active:bg-sky-950 active:text-white">
                                        Recent
                                    </button>

                                    <button
                                        class="inline-block px-4 py-2 text-sm font-medium text-white bg-sky-900 hover:bg-sky-950 focus:relative">
                                        Resolved
                                    </button>

                                    <button
                                        class="inline-block px-4 py-2 text-sm font-medium text-white bg-sky-900 hover:bg-sky-950 focus:relative">
                                        Unresolved
                                    </button>

                                </span>
                                <div
                                    class="inline-flex -space-x-px overflow-hidden rounded-md border bg-sky-900 shadow-sm">
                                    <button
                                        class="inline-block px-4 py-2 text-sm font-medium text-white hover:bg-sky-950 focus:relative">
                                        Tag Filter
                                    </button>
                                </div>


                            </div>
                        </div>
                    </div>


                    <div class="container mx-auto px-4 p-6 -mt-12">
                        @foreach ($forumPosts as $post)
                            <div class="bg-white shadow rounded-lg mb-5 p-3 md:w-full">
                                <div class="flex items-center mb-3 gap-1 justify-between">
                                    <div class="flex items-center gap-1">
                                        <img class="rounded-full mr-2 ml-1 w-10 h-10"
                                            src="{{ $post->user->profile_photo_url }}" alt="">
                                        <strong class="mr-2">{{ $post->user->username }}</strong> posted
                                        {{ $post->created_at->diffForHumans() }}
                                    </div>
                                    <div class="inline-block bg-slate-300 text-black px-2 py-1 rounded text-sm">
                                        {{ $post->tags }}
                                    </div>
                                </div>
                                <div class="rounded-lg pl-3 text-2xl font-bold ">
                                    <a class="hover:underline"
                                        href="{{ route('user-post.show', ['postId' => $post->id]) }}">{{ $post->title }}</a>
                                </div>

                                <div class="rounded-lg p-3 -mt-3 text-slate-500">
                                    <p>{{ \Illuminate\Support\Str::limit(strip_tags((new Parsedown())->text($post->markdown)), 150) }}
                                    </p>
                                </div>
                                <div class="rounded-lg p-3 mt-2">
                                    <ion-icon name="heart-outline" class="text-2xl p-1 -pr-1"></ion-icon>
                                    <ion-icon name="chatbubble-ellipses-outline" class="text-2xl p-1"></ion-icon>
                                </div>
                            </div>
                        @endforeach
                        <div class="mb-10">
                            {{-- Pagination --}}
                            {{ $forumPosts->links() }}
                        </div>
                    </div>
                </div>
                <x-left-box />
            </div>
        </div>
        <x-footer/>
    </div>
</x-app-layout>

{{-- <p>{{ \Illuminate\Support\Str::limit($post->markdown, 50) }}</p>
<a href="{{ route('user-post.show',['postId' => $post->id]) }}">Read more</a> --}}
