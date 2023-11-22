<div>
    @foreach ($posts as $post)
        <x-forum-thread-list :post="$post" />
    @endforeach
</div>
