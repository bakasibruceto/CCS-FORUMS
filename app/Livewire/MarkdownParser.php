<?php

namespace App\Livewire;
use App\Livewire\Traits\HighlighterJS;
use App\Livewire\Traits\MarkdownEditor;
use Livewire\Component;

class MarkdownParser extends Component
{
    use HighlighterJS, MarkdownEditor;
    public $parsedMarkdown;

    public function mount($markdown)
    {
        $this->markdown = $markdown;
        $this->parseMarkdown();
    }

    public function render()
    {
        return view('livewire.markdown-parser');
    }

}
