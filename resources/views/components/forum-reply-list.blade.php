<div class="bg-white shadow rounded-lg mb-5 p-3 md:w-full">
    <div class="flex items-center mb-3 gap-1 justify-between">
        <div class="flex items-center gap-1">
            <a href="{{ route('user.show', $post->user->username) }}">
                <img class="rounded-full mr-2 ml-1 w-10 h-10" src="{{ $post->user->profile_photo_url }}" alt="">
            </a>
            <strong class="mr-2">{{ $post->user->username }}</strong> posted
            {{ $post->created_at->diffForHumans() }}
        </div>
        <div>
            @foreach ($post->categories as $category)
                <div class="inline-block bg-slate-300 text-black px-2 py-1 rounded text-sm">
                    {{ $category->tag->name }}
                </div>
            @endforeach
        </div>

    </div>
    <div class="rounded-lg pl-3 text-2xl font-bold ">
        <a class="hover:underline" href="{{ route('user-post.show', ['postId' => $post->id]) }}">{{ $post->title }}</a>
    </div>

    <div class="rounded-lg p-3 -mt-3 text-slate-500">
        <p>
            {{ \Illuminate\Support\Str::limit(strip_tags((new Parsedown())->text($post->markdown)), 150) }}
        </p>
    </div>
    <div class="rounded-lg p-3 mt-2 flex gap-3 justify-between">
        <div class="flex">
            @livewire('counter.like-component', ['post_id' => $post->id])
            <a class="hover:text-green-500 hover:fill-current"
                href="{{ route('user-post.show', ['postId' => $post->id]) }}">
                @livewire('counter.count-comment', ['post_id' => $post->id])</a>
        </div>
        @livewire('check-solution', ['postId' => $post->id])
    </div>
</div>
