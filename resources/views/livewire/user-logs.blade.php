<div wire:poll>
    <ul>
        @foreach ($logs as $log)
            <p>{{ $log->created_at }} {{ $log->user_id }} {{ $log->user->username }} {{ $log->actions }}</p>
        @endforeach
    </ul>
</div>
