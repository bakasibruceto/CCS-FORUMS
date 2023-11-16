<div> <!-- Add a border for debugging -->
    @if($parsedMarkdown)
        <div class="prose border min-w-full">
            {!! $parsedMarkdown !!}
        </div>
    @endif
</div>
