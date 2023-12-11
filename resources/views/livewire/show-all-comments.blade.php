<div>
    @foreach ($replies as $reply)
        @if (optional($reply->post)->exists() && !$reply->post->trashed())
            <x-forum-reply-list :reply="$reply" />
        @endif
    @endforeach
    {{ $replies->links() }}
</div>
