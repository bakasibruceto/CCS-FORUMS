<x-app-layout>

    <div class="flex flex-1 overflow-hidden">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-0 flex justify-between grid-cols-3 w-full">
            <x-sidebar/>
            <div class="items-center justify-center pt-20">
                <div class=" bg-white rounded-lg mb-6 p-4 mx-5 md:mx-auto max-w-md md:max-w-xl">
                    <p class="font-semibold text-gray-700 text-sm pb-2 border-b border-gray-200">Post Something</p>
                    @csrf
                    <div class="flex items-center justify-center gap-4">
                        <img class="h-10 w-10 bg-gray-200 border rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="">
                        <div id="editor" class="w-sm md:w-11/12 max-w-[450px] min-w-[350px] min-h-[100px]"></div>
                    </div>

                    {{-- <div id="editor"></div> --}}
                    <footer class="flex justify-between mt-2">
                        <div class="flex gap-2">
                            <span
                                class="flex items-center transition ease-out duration-300 hover:bg-sky-950 hover:text-white bg-blue-100 w-8 h-8 px-2 rounded-full text-blue-400 cursor-pointer">
                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor"
                                    stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                    class="css-i6dzq1">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2">
                                    </rect>
                                    <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                    <polyline points="21 15 16 10 5 21"></polyline>
                                </svg>
                            </span>
                            <span
                                class="flex items-center transition ease-out duration-300 hover:bg-sky-950 hover:text-white bg-blue-100 w-8 h-8 px-2 rounded-full text-blue-400 cursor-pointer">
                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor"
                                    stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                    class="css-i6dzq1">
                                    <polyline points="4 17 10 11 4 5"></polyline>
                                    <line x1="12" y1="19" x2="20" y2="19"></line>
                                </svg>
                            </span>
                        </div>
                        <button id="saveButton"
                            class="flex items-center py-2 px-4 rounded-lg text-sm bg-sky-950 hover:bg-sky-800 active:bg-sky-900 text-white shadow-lg">Post
                            <svg class="ml-1" viewBox="0 0 24 24" width="16" height="16" stroke="currentColor"
                                stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="22" y1="2" x2="11" y2="13"></line>
                                <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                            </svg>
                        </button>
                    </footer>
                </div>




                <div class="flex items-center gap-2 font-semibold text-gray-800 text-sm pb-2">
                    <ion-icon class="bg-sky-950 rounded-full text-white p-2" name="chatbox-ellipses-outline"></ion-icon>
                    <p>Threads & Discussions</p>
                </div>

                @foreach ($forumPosts as $post)
                    <!-- POSTED WITH COMMENT -->
                    <div class="bg-white rounded-lg mb-6 p-4 mx-5 md:mx-auto mt-5 max-w-md md:max-w-xl">
                        <div class="flex flex-row px-2 py-3 mx-3">
                            <div class="w-auto h-auto rounded-full">
                                <img class="w-12 h-12 object-cover rounded-full shadow cursor-pointer" alt="User avatar"
                                    src="{{ $post->user->profile_photo_url }}">
                            </div>
                            <div class="flex flex-row items-center mb-2 ml-4 mt-1">
                                <div class="text-gray-600 text-sm font-semibold">{{ $post->user->username }}
                                    <span class="text-gray-400 font-thin text-xs">
                                        • {{ $post->created_at->diffForHumans() }}
                                    </span>
                                </div>
                                <div class="text-gray-500 cursor-pointer pl-60">
                                    <!-- Three-dot menu icon -->
                                    <button class="flex items-center justify-center hover:bg-gray-50 rounded-full p-1">
                                        <div class="flex space-x-0.5">
                                            <div class="w-1 h-1 bg-gray-500 rounded-full"></div>
                                            <div class="w-1 h-1 bg-gray-500 rounded-full"></div>
                                            <div class="w-1 h-1 bg-gray-500 rounded-full"></div>
                                        </div>
                                    </button>
                                    <div id="dropdownContent" class="hidden z-20 origin-top-right absolute right-0 mt-2 w-44 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                                        <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Option 1</a>
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Option 2</a>
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Option 3</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- FOR CAPTION --> <!--!! convert html tag !!-->
                        <div class="text-gray-500 text-sm mb-6 mx-3 px-2">{!! $post->text !!}</div>

                        <!-- COMMENTS AND LIKES... -->
                        <div class="flex justify-between items-center px-11 pb-3">
                            <button class="flex items-center">
                                <ion-icon class="h-4 w-4 text-red-500 items-center" name="heart-outline"></ion-icon>
                                <span class="text-gray-600 text-sm pl-2">Like</span>
                            </button>
                            <button class="flex items-center show-modal">
                                <ion-icon class="h-4 w-4 text-blue-500 items-center" name="chatbubbles-outline"></ion-icon>
                                <span class="text-gray-600 text-sm pl-2">Comment</span>
                            </button>
                            <button class="flex items-center">
                                <ion-icon class="h-4 w-4 text-blue-500 items-center" name="share-social-outline"></ion-icon>
                                <span class="text-gray-600 text-sm pl-2">Share</span>
                            </button>
                        </div>
                        <div class="flex w-full border-t border-gray-100"></div>
                        <div class="mt-2 mx-5 flex flex-row justify-start text-xs">
                            <div class="flex text-gray-700 font-normal rounded-md mb-2 mr-4 items-center">Likes: <div
                                    class="ml-1 text-gray-400 text-ms"> 30</div>
                            </div>
                            <div class="flex text-gray-700 font-normal rounded-md mb-2 mr-4 items-center">Comments:<div
                                    class="ml-1 text-gray-400 text-ms"> 10</div>
                            </div>
                        </div>
                        <!-- comment section -->
                        <div class="max-w-xl mx-auto space-x-2">
                            <!-- Main Comment -->
                            <div class="flex items-center space-x-2 p-6 -mt-6">
                                <div class="flex items-center space-x-2 space-y-2">
                                    <div class="group relative flex flex-shrink-0 self-start cursor-pointer pt-2">
                                        <img src="../Images/kai.jpg" alt="" class="h-8 w-8 object-fill rounded-full">
                                    </div>

                                    <div class="flex items-center justify-center space-x-2">
                                        <div class="block">
                                            <div class="bg-gray-100 w-auto rounded-xl px-2 pb-2">
                                                <div class="font-medium">
                                                    <a href="#" class="hover:underline text-sm">
                                                        <small>Hasan Muhammad</small>
                                                    </a>
                                                </div>
                                                <div class="text-xs">
                                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Expedita, maiores!
                                                </div>
                                            </div>

                                            <div class="flex justify-start items-center text-xs w-full">
                                                <div class="font-semibold text-gray-700 px-2 flex items-center justify-center space-x-1">
                                                    <a href="#" class="hover:underline">
                                                        <small>Like</small>
                                                    </a>
                                                    <small class="self-center">.</small>
                                                    <a href="#" class="hover:underline">
                                                        <small>Reply</small>
                                                    </a>
                                                    <small class="self-center">.</small>
                                                    <a href="#" class="hover:underline">
                                                        <small>15 hour</small>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Sub-comments -->
                            <div class="ml-4">
                                <!-- Sub-comment 1 -->
                                <div class="p-8 -mt-12">
                                    <div class="flex items-center space-x-2 space-y-2">
                                        <div class="group relative flex flex-shrink-0 self-start cursor-pointer pt-2">
                                            <img src="../Images/kai.jpg" alt="" class="h-8 w-8 object-fill rounded-full">
                                        </div>

                                        <div class="flex items-center justify-center space-x-2">
                                            <div class="block">
                                                <div class="bg-gray-100 w-auto rounded-xl px-2 pb-2">
                                                    <div class="font-medium">
                                                        <a href="#" class="hover:underline text-sm">
                                                            <small>Hasan Muhammad</small>
                                                        </a>
                                                    </div>
                                                    <div class="text-xs">
                                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Expedita, maiores!
                                                    </div>
                                                </div>

                                                <div class="flex justify-start items-center text-xs w-full">
                                                    <div class="font-semibold text-gray-700 px-2 flex items-center justify-center space-x-1">
                                                        <a href="#" class="hover:underline">
                                                            <small>Like</small>
                                                        </a>
                                                        <small class="self-center">.</small>
                                                        <a href="#" class="hover:underline">
                                                            <small>Reply</small>
                                                        </a>
                                                        <small class="self-center">.</small>
                                                        <a href="#" class="hover:underline">
                                                            <small>15 hour</small>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="flex justify-end items-end pr-5 -top-10 text-xs text-gray-500">
                            <button class="show-modal">View more comments</button>
                        </div>


                        <div class="relative flex items-center self-center w-full max-w-xl p-4 overflow-hidden text-gray-600 focus-within:text-gray-400">
                            <img class="w-8 h-8 object-cover rounded-full shadow mr-2 cursor-pointer" alt="User avatar"  src="{{ Auth::user()->profile_photo_url }}">
                            <span class="absolute inset-y-0 right-0 flex items-center pr-6">
                                <button type="submit" class="p-1 focus:outline-none focus:shadow-none hover:text-blue-500">
                                    <svg class="w-6 h-6 transition ease-out duration-300 hover:text-blue-500 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </button>
                            </span>
                                <input type="search" class="w-full py-2 pl-4 pr-10 text-sm bg-gray-100 border border-transparent appearance-none rounded-tg placeholder-gray-400" style="border-radius: 25px" placeholder="Post a comment..." autocomplete="off">
                        </div>

                    </div>

                @endforeach

                </div>
            <x-left-box/>
        </div>
    </div>
</x-app-layout>
