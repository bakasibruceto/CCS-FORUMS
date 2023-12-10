<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-0 flex justify-between grid-cols-3 w-full ">
        <div class="flex flex-col flex-1">
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="grid grid-cols-1 lg:grid-cols-4 lg:gap-3 p-10">
                <div class="col-span-3 -mt-10">
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
                                    @if ($selectedTag)
                                        <a
                                            href="{{ route('posts.filter', ['tag' => $selectedTag, 'status' => 'recent']) }}">
                                            <button
                                                class="inline-block px-4 py-2 text-sm font-medium text-white bg-sky-900 hover:bg-sky-950 focus:relative active:bg-sky-950 active:text-white">
                                                Recent
                                            </button>
                                        </a>

                                        <a
                                            href="{{ route('posts.filter', ['tag' => $selectedTag, 'status' => 'resolved']) }}">
                                            <button
                                                class="inline-block px-4 py-2 text-sm font-medium text-white bg-sky-900 hover:bg-sky-950 focus:relative">
                                                Resolved
                                            </button>
                                        </a>

                                        <a
                                            href="{{ route('posts.filter', ['tag' => $selectedTag, 'status' => 'unresolved']) }}">
                                            <button
                                                class="inline-block px-4 py-2 text-sm font-medium text-white bg-sky-900 hover:bg-sky-950 focus:relative">
                                                Unresolved
                                            </button>
                                        </a>
                                    @else
                                        <a href="{{ route('user.index') }}">
                                            <button
                                                class="inline-block px-4 py-2 text-sm font-medium text-white bg-sky-900 hover:bg-sky-950 focus:relative active:bg-sky-950 active:text-white">
                                                Recent
                                            </button>
                                        </a>

                                        <a href="{{ route('posts.resolved') }}">
                                            <button class="inline-block px-4 py-2 text-sm font-medium text-white bg-sky-900 hover:bg-sky-950 focus:relative">
                                                Resolved
                                            </button>
                                        </a>

                                        <a href="{{ route('posts.unresolved') }}">
                                            <button class="inline-block px-4 py-2 text-sm font-medium text-white bg-sky-900 hover:bg-sky-950 focus:relative">
                                                Unresolved
                                            </button>
                                        </a>
                                    @endif
                                </span>
                                <div
                                    class="inline-flex -space-x-px overflow-hidden rounded-md border bg-sky-900 shadow-sm">
                                    <div x-data="{ open: false }">
                                        <button @click="open = !open"
                                            class="inline-block px-4 py-2 text-sm font-medium text-white hover:bg-sky-950 focus:relative">
                                            Tag Filter
                                        </button>

                                        <div x-show="open" x-cloak @click.away="open = false"
                                            class="absolute ml-[-100px] mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                                            <div class="py-1" role="menu" aria-orientation="vertical"
                                                aria-labelledby="options-menu">
                                                @foreach ($tags as $tag)
                                                    <a href="{{ route('posts.filter', $tag) }}"
                                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                                                        role="menuitem">{{ $tag }}</a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($selectedTag)
                            <div>
                                tags:
                                <div
                                    class="inline-block bg-gray-300 rounded-md px-3 py-1 text-md font-semibold text-gray-700 -mt-0.5 mr-2 h-8">
                                    <div class="inline-block">
                                        {{ $selectedTag }}
                                        <a href="{{ route('user.index') }}">
                                            <button class="ml-0.5 hover:text-red-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="1 1 24 24" stroke="currentColor"
                                                    class="h-4 w-4 inline-block">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="container mx-auto px-4 p-6 -mt-12">
                        @foreach ($forumPosts as $post)
                            <x-forum-thread-list :post="$post" />
                        @endforeach
                        <div class="mb-10">
                            {{-- Pagination --}}
                            {{ $forumPosts->links() }}
                        </div>
                    </div>
                </div>
                <x-dashbox />
            </div>
        </div>
    </div>
</x-app-layout>
