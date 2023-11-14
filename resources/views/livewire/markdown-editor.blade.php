<div class="prose">
    <div>
        <button wire:click="togglePreview">Toggle Preview</button>
    </div>

    @if($previewMode)
        <div>{!! $parsedMarkdown !!}</div>
    @else
        <textarea wire:model="markdown"></textarea>
    @endif
</div>
