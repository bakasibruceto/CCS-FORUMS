<!-- resources/views/livewire/markdown-parser.blade.php -->

<div>
    <textarea wire:model="markdown" rows="5" class="w-full p-2 border"></textarea>

    <button wire:click="parseMarkdown" class="mt-2 p-2 bg-blue-500 text-white">Parse Markdown</button>

    @if($parsedMarkdown)
        <div class="mt-4 prose">
            {!! $parsedMarkdown !!}
        </div>
    @endif
</div>
