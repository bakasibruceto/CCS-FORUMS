<div class="w-full border border-red-500"> <!-- Add a border for debugging -->
    @if($parsedMarkdown)
        <div class="prose">
            {!! $parsedMarkdown !!}
        </div>
    @endif
</div>
