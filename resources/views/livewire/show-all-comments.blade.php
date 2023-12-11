<div>
    @foreach ($replies as $reply)
        <div>
            @if(optional($reply->post)->exists() && !$reply->post->trashed())
                <p>{{ $reply->post->title }}</p>
                <p>{{ str_replace('solution', '', $reply->markdown) }}</p>
            @endif
        </div>
    @endforeach

    {{ $replies->links() }}
</div>
