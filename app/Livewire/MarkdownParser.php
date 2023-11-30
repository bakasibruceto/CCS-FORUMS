<?php

namespace App\Livewire;
use App\Livewire\Traits\HighlighterJS;
use App\Livewire\Traits\MarkdownEditor;
use Livewire\Component;

class MarkdownParser extends Component
{
    use HighlighterJS, MarkdownEditor;
    public $parsedMarkdown;

    protected $listeners = ['markdownUpdated' => 'updateMarkdown'];

    public function mount($markdown)
    {
        $this->markdown = $markdown;
        $this->parseMarkdown();
    }

    public function updateMarkdown($markdown)
    {
        $this->markdown = $markdown;
        $this->parsedMarkdown = $this->replyMarkdown($this->markdown);
    }

    public function render()
    {
        return view('livewire.markdown-parser');
    }

}
