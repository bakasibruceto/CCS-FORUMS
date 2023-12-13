<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-3xl text-gray-800 leading-tight flex">
            <a href="{{ '/' }}" class="hover:underline"> CSS FORUM</a>
            <div class="p-2 pl-3 pr-3">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                </svg>
            </div>

            {{ $post->title }}
        </h1>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-0 flex justify-between grid-cols-3 w-full">
        <div class="flex flex-col flex-1">
            <div class="grid grid-cols-1 lg:grid-cols-4 lg:gap-3 p-10">
                <div class="col-span-3">
                    <div class="container mx-auto">
                        <div class="bg-white shadow rounded-lg mb-5 p-3 md:w-full">
                            <div class="flex items-center mb-3 gap-1 justify-between">
                                <div class="flex items-center gap-1">
                                    <img class="rounded-full mr-2 ml-1 w-10 h-10 hover:ring-2 hover:ring-blue-600"
                                        src="{{ $post->user->profile_photo_url }}" alt="">
                                    <strong class="mr-2">{{ $post->user->username }}</strong> posted
                                    {{ $post->created_at->diffForHumans() }}
                                </div>
                                <div class="flex">
                                    <div>
                                        @foreach ($post->categories as $category)
                                            <div class="inline-block bg-slate-300 text-black px-2 py-1 rounded text-sm">
                                                {{ $category->tag->name }}
                                            </div>
                                        @endforeach
                                    </div>
                                    <div x-data="{ open: false }" class="relative">
                                        <button @click="open = !open" class="focus:outline-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor" class="h-6 w-6 text-gray-500">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                            </svg>
                                        </button>

                                        <div x-show="open" x-cloak @click.away="open = false"
                                            class="absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                                            <div class="py-1" role="menu" aria-orientation="vertical"
                                                aria-labelledby="options-menu">
                                                @if ($post->user_id == auth()->id())
                                                    <a href="{{ route('edit-thread', ['postId' => $post->id]) }}"
                                                        class="px-4 py-2 text-sm hover:bg-gray-100 flex items-center"
                                                        role="menuitem">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                            height="20" fill="currentColor" class="bi bi-pencil"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                                        </svg>
                                                        <p class="pl-3">edit</p>
                                                    </a>
                                                    <div x-data="{ open: false }">
                                                        <div @click="open = true"
                                                            class="px-4 py-2 text-sm text-red-500 hover:bg-gray-100 hover:text-red-700 flex items-center"
                                                            role="menuitem">
                                                            <svg class="-ml-1" width="24" height="24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M17 6V5C17 3.89543 16.1046 3 15 3H9C7.89543 3 7 3.89543 7 5V6H4C3.44772 6 3 6.44772 3 7C3 7.55228 3.44772 8 4 8H5V19C5 20.6569 6.34315 22 8 22H16C17.6569 22 19 20.6569 19 19V8H20C20.5523 8 21 7.55228 21 7C21 6.44772 20.5523 6 20 6H17ZM15 5H9V6H15V5ZM17 8H7V19C7 19.5523 7.44772 20 8 20H16C16.5523 20 17 19.5523 17 19V8Z"
                                                                    fill="currentColor" />
                                                            </svg>
                                                            <p class="pl-3">delete</p>
                                                        </div>
                                                        <!-- Modal -->
                                                        <div x-show="open" x-cloak
                                                            class="fixed z-10 inset-0 overflow-y-auto"
                                                            aria-labelledby="modal-title" role="dialog"
                                                            aria-modal="true">
                                                            <div
                                                                class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                                                <!-- Background overlay, show/hide based on modal state. -->
                                                                <div x-show="open"
                                                                    x-transition:enter="ease-out duration-300"
                                                                    x-transition:enter-start="opacity-0"
                                                                    x-transition:enter-end="opacity-100"
                                                                    x-transition:leave="ease-in duration-200"
                                                                    x-transition:leave-start="opacity-100"
                                                                    x-transition:leave-end="opacity-0"
                                                                    class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                                                                    @click="open = false"></div>


                                                                <!-- Modal -->
                                                                <div x-show="open"
                                                                    x-transition:enter="ease-out duration-300"
                                                                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                                                    x-transition:leave="ease-in duration-200"
                                                                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                                                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                                    class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                                                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                                                        <div class="sm:flex sm:items-start">
                                                                            <div
                                                                                class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                                                <h3 class="text-lg leading-6 font-medium text-gray-900"
                                                                                    id="modal-title">
                                                                                    Delete Post
                                                                                </h3>
                                                                                <div class="mt-2">
                                                                                    <p class="text-sm text-gray-500">
                                                                                        Are you sure you want to delete
                                                                                        this post? This action cannot be
                                                                                        undone.
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                                                        @livewire('thread.delete-thread', ['postId' => $post->id])
                                                                        <button type="button"
                                                                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                                                                            @click="open = false">
                                                                            Cancel
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <a href="#">Mark as spam</a>
                                                @endif


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border-t border-gray-200"></div>
                            <div class="p-3  flex-grow w-full">
                                @livewire('markdown-parser', ['markdown' => $post->markdown])
                            </div>
                            <div class="pl-3">
                                @livewire('counter.like-component', ['post_id' => $post->id])
                            </div>
                        </div>
                        @livewire('comment.read-comment', ['post_id' => $post->id])
                        @livewire('comment.create-comment', ['post_id' => $post->id])
                    </div>
                </div>
                <div class="hidden md:block lg:block w-65 ">
                    <div class="flex flex-col justify-center items-center h-52 my-8">
                        <div
                            class="relative flex flex-col items-center shadow rounded-lg w-full mx-auto p-4 bg-white bg-clip-border shadow-3xl shadow-shadow-500 dark:!bg-navy-800 dark:text-white dark:!shadow-none">
                            <div class="relative flex h-28 w-full justify-center rounded-xl bg-cover">
                                <!-- for cover photo? -->
                                @if (auth()->user()->bg_photo_path)
                                    <img src="{{ asset('storage/' . auth()->user()->bg_photo_path) }}" alt=""
                                        class="absolute flex h-28 w-full justify-center rounded-xl bg-cover">
                                @endif

                                <div
                                    class="absolute -bottom-12 flex h-28 w-28 items-center justify-center rounded-full border-[4px] border-white dark:!border-navy-700">
                                    <img class="h-full w-full rounded-full hover:ring-2 hover:ring-blue-600"
                                        src="{{ $post->user->profile_photo_url }}" alt="" />
                                </div>
                            </div>
                            <div class="mt-14 flex flex-col items-center">
                                <h1 class="text-gray-800 font-bold">{{ $post->user->username }}</h1>
                                <p class="text-base font-semibold text-gray-500">{{ $post->user->name }}</p>
                                <p class="text-base font-normal text-gray-600 pt-4">Joined
                                    {{ $post->user->created_at->format('d M Y') }}</p>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="bg-white shadow rounded-lg mt-16 p-4 w-full h-52">

                        <p class="font-semibold text-gray-800 text-sm pb-2 border-b border-gray-200">Events</p>
                    </div> --}}

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
