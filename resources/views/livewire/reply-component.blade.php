<div wire:poll.keep-alive.5000ms>
    @foreach ($replies as $reply)
        <div class="bg-white shadow rounded-lg mb-5 p-3 md:w-full">
            <div class="flex items-center mb-3 gap-2 ">
                <img class="rounded-full mr-3 w-10 h-10" src="{{ $reply->user->profile_photo_url }}" alt="">
                <strong>{{ $reply->user->username }}</strong> posted
                {{ $reply->created_at->diffForHumans() }}
            </div>
            <div class="border-t border-gray-200"></div>
            <div wire:poll.keep-alive.5000ms class="p-3 flex-grow w-full">
                @livewire('markdown-parser', ['markdown' => $reply->markdown], key($reply->id))
            </div>

            <div class="rounded-lg bg-gray-100 p-3 mt-2">

            </div>
        </div>
    @endforeach
</div>
