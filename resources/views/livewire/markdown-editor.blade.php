<div>
    @if(!$previewMode)
        <textarea wire:model="markdownText" rows="10" cols="50"></textarea>
    @endif
    <div>
        <button wire:click="togglePreviewMode">Toggle Preview</button>
        @if($previewMode)
            <button wire:click="saveMarkdown">Save</button>
        @endif
    </div>
    <div class="prose prose-slate">
        @if($previewMode)
            {!! $htmlContent !!}
        @endif
    </div>
</div>
