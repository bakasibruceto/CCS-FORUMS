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
                            <a href=""
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                                role="menuitem">{{$tag}}</a>
                                {{-- {{ route('posts.filter', $tag) }} --}}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
