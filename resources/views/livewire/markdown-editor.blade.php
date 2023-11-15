<div class="prose">
    <p>Create a new thread...</p>
    <form wire:submit.prevent="savePost">
        <div>
            <x-label for="subject" value="{{ __('Subject') }}" />
            <x-input wire:model="subject" id="subject" class="block mt-1 w-full" type="text" name="subject" autofocus />
        </div>
        <div>
            <x-label for="tags" value="{{ __('Tags') }}" />
            <x-input wire:model="tags" id="tags" class="block mt-1 w-full" type="text" name="tags" />
        </div>

        <div>
            <button wire:click.prevent="togglePreview">Toggle Preview</button>
        </div>

        @if ($previewMode)
            <div>{!! $parsedMarkdown !!}</div>
        @else
            <textarea wire:model="markdown"></textarea>
        @endif
        <button type="submit">Create Thread</button>
    </form>
</div>
