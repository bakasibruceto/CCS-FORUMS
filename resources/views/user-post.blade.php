{{-- <x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-0 flex justify-between grid-cols-3 w-full">

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
                </div>

                <div>

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

    </x-app-layot> --}}

<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-3xl text-gray-800 leading-tight ">
            CSS FORUM > {{ $post->title }}
        </h1>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-0 flex justify-between grid-cols-3 w-full">
        <div class="flex flex-col flex-1">
            <div class="block md:grid md:grid-flow-row-dense md:grid-cols-3 md:grid-rows-3 md:ml-6">

                <div class="col-span-2">
                    <div class="container mx-auto px-4 p-6 mt-5">
                        <div class="bg-white shadow rounded-lg mb-5 p-3 md:w-full">
                            <div class="flex items-center mb-3 gap-2 ">
                                <img class="rounded-full mr-3 w-10 h-10" src="{{ $post->user->profile_photo_url }}" alt="">
                                <strong>{{ $post->user->username }}</strong> posted {{ $post->created_at->diffForHumans() }}
                                <div>
                                    {{ $post->tags }}
                                </div>
                            </div>


                            <div class="border-t border-gray-200"></div>

                            <div class="p-3 flex-grow w-full">
                                @livewire('markdown-parser', ['markdown' => $post->markdown])
                            </div>

                            <div class="rounded-lg bg-gray-100 p-3 mt-2">

                            </div>
                        </div>
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
