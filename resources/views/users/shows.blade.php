<x-app-layout>
    <div class="-mt-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-5">
            <main class="container mx-auto p-4">
                <div x-data="{ tab: 'threads' }" class="container mx-auto px-4 p-6">
                    <div class="w-full h-[250px]">
                        <img src="{{ $user->bg_photo_path ? asset('storage/' . $user->bg_photo_path) : asset('abstract.jpg') }}" class="w-full h-full rounded-tl-lg rounded-tr-lg">
                    </div>
                    <div class="relative flex flex-col min-w-0 break-words bg-white w-full h-full mb-6 rounded-lg -mt-1">
                        <div class="px-6">
                            <div class="flex flex-wrap justify-center items-center">
                                <div class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center">
                                    <div class="relative flex flex-col items-center top-4 -mt-28 ">
                                        <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}"
                                            class="w-32 h-32 border-4 border-white rounded-full">
                                        <span
                                            class="flex items-center justify-center mb-4 text-xl font-semibold">{{ $user->username }}</span>
                                    </div>
                                </div>
                                <div class="w-full lg:w-4/12 px-4 lg:order-1">
                                    <div class="flex justify-center py-4 lg:pt-1 pt-0 font-semibold ">
                                        <div class="lg:mr-4 p-3 text-center hover:bg-sky-100 rounded-lg">
                                            <a href="">
                                                <span
                                                    class="text-sm block tracking-wide text-black">{{ $postCount }}</span>
                                                <span class="text-gray-600">post</span>
                                            </a>
                                        </div>
                                        <div class="lg:mr-4 p-3 text-center hover:bg-sky-100 rounded-lg">
                                            <span
                                                class="text-sm block tracking-wide text-black">{{ $totalFollowing }}</span>
                                            <span class="text-gray-600">following</span>
                                        </div>
                                        @livewire('counter.follower-counter', ['username' => $user->username])
                                    </div>
                                </div>
                                <div class="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right">
                                    <div class="py-6 px-3 -mt-10 sm:mt-0">
                                        @auth
                                            @if (auth()->user()->username != $user->username)
                                                @livewire('counter.user-follow', ['userId' => $user->id])
                                            @else
                                            <a href="{{ route('profile.show') }}">
                                                <button
                                                class="bg-sky-950 hover:bg-sky-800 active:bg-sky-900 text-white hover:shadow-md shadow text-sm px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150"
                                                type="button">
                                                edit profile
                                            </button>
                                            </a>

                                            @endif
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex mt-6">
                            <div class="w-1/2 justify-center flex">
                                <button @click="tab = 'threads'" :class="{ 'border-blue-500': tab === 'threads' }"
                                    class="w-full font-bold text-blue-500 border-b-2 transition duration-300 ease-in-out">
                                    Thread posted
                                </button>
                            </div>
                            <div class="w-1/2 justify-center flex">
                                <button @click="tab = 'replies'" :class="{ 'border-blue-500': tab === 'replies' }"
                                    class="w-full font-bold text-blue-500 border-b-2 transition duration-300 ease-in-out">
                                    Replies posted
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="-mt-1">
                        <div x-show="tab === 'threads'">
                            @livewire('show-all-userthreads', ['username' => $username])
                        </div>
                        <div x-show="tab === 'replies'">
                            @livewire('show-all-comments', ['username' => $username])
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>
