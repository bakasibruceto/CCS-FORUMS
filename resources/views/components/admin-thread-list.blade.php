{{-- <table class="bg-white shadow rounded-lg mb-5 p-3 md:w-full">
    <tr>
        <td>
            <a href="{{ route('user.show', $post->user->username) }}">
                <img class="rounded-full mr-2 ml-1 w-10 h-10" src="{{ $post->user->profile_photo_url }}" alt="">
            </a>
        </td>
        <td>
            <strong class="mr-2">{{ $post->user->username }}</strong>
        </td>
        <td class="rounded-lg pl-3 font-bold ">
            <a class="hover:underline"
                href="{{ route('user-post.show', ['postId' => $post->id]) }}">{{ $post->title }}</a>
        </td>
        <td>
            @livewire('check-solution', ['postId' => $post->id])
        </td>
        <td>
            @if ($post->categories->count() > 0)
                @foreach ($post->categories as $category)
                    <div class="inline-block bg-slate-300 text-black px-2 py-1 rounded text-sm">
                        {{ $category->tag->name }}
                    </div>
                @endforeach
            @else
                <div class="inline-block bg-slate-300 text-black px-2 py-1 rounded text-sm">
                    No categories
                </div>
            @endif
        </td>
    </tr>
</table> --}}


<tr>
    <td class="w-20">
        <a href="{{ route('user.show', $post->user->username) }}">
            <img class="rounded-full mr-2 ml-1 w-10 h-10" src="{{ $post->user->profile_photo_url }}" alt="">
        </a>
    </td>
    <td class="w-20">
        <strong class="mr-2">{{ $post->user->username }}</strong>
    </td>
    <td class="w-40">
        <a class="hover:underline" href="{{ route('user-post.show', ['postId' => $post->id]) }}">{{ $post->title }}</a>
    </td>
    <td class="w-40">
        @if ($post->categories->count() > 0)
            @foreach ($post->categories as $category)
                <div class="inline-block bg-slate-300 text-black px-2 py-1 rounded text-sm">
                    {{ $category->tag->name }}
                </div>
            @endforeach
        @else
            null
        @endif
    </td>
    <td class="w-20">
        @if ($post->user_reply->where('solution', true)->count() > 0)
            @livewire('check-solution', ['postId' => $post->id])
        @else
            unsolved
        @endif
    </td>

</tr>
