{{-- <table class="bg-white shadow rounded-lg mb-5 p-3 md:w-full">
    <tr>
        <td class="bg-white">
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
    <td class="w-20 px-5 py-5 border-b border-gray-200 bg-white text-sm">
        <a href="{{ route('user.show', $post->user->username) }}">
            <img class="rounded-full mr-2 ml-1 w-10 h-10" src="{{ $post->user->profile_photo_url }}" alt="">
        </a>
    </td>
    <td class="w-60 px-5 py-5 border-b border-gray-200 bg-white text-sm">
        <strong class="mr-2">{{ $post->user->username }}</strong>
    </td>
    <td class="w-40 px-5 py-5 border-b border-gray-200 bg-white text-sm">
        <a class="hover:underline" href="{{ route('user-post.show', ['postId' => $post->id]) }}">{{ $post->title }}</a>
    </td>
    <td class="w-60 px-5 py-5 border-b border-gray-200 bg-white text-sm">
        @if ($post->categories->count() > 0)
            @foreach ($post->categories as $category)
                <div class="inline-block bg-slate-300 text-black px-2 py-1 rounded text-sm">
                    {{ $category->tag->name }}
                </div>
            @endforeach
        @else
            <p class="italic text-slate-500">null</p>
        @endif
    </td>
    <td class="w-40 px-5 py-5 border-b border-gray-200 bg-white text-sm">
        @if ($post->user_reply->where('solution', true)->count() > 0)
            @livewire('check-solution', ['postId' => $post->id])
        @else
            <p class="italic text-slate-500">unsolved</p>
        @endif
    </td>
    <td class="w-40 px-5 py-5 border-b border-gray-200 bg-white text-sm">
        {{ $post->created_at->format('Y-m-d') }}
    </td>
    <td class="w-20 px-5 py-5 border-b border-gray-200 bg-white text-sm">
        @if ($post->trashed())
            <form action="{{ route('post.restore', $post->id) }}" method="POST">
                @csrf
                <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">Restore</button>
            </form>
        @else
            <form action="{{ route('post.trash', $post->id) }}" method="POST">
                @csrf
                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded">Trash</button>
            </form>
        @endif
    </td>
</tr>
