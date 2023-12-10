<div>
    @if (!empty($posts))
        @foreach ($posts as $post)
        <x-forum-thread-list :post="$post" />
        @endforeach
        {{ $posts->links() }}
    @endif
</div>
