<?php

namespace App\Livewire;

use App\Livewire\Traits\HighlighterJS;
use App\Livewire\Traits\MarkdownEditor;
use Livewire\Component;

class MarkdownParser extends Component
{
    // Use the HighlighterJS and MarkdownEditor traits.
    use HighlighterJS, MarkdownEditor;

    // This property will hold the parsed Markdown.
    public $parsedMarkdown;

    // Listen for the 'markdownUpdated' event and call the 'updateMarkdown' method when it's fired.
    protected $listeners = ['markdownUpdated' => 'updateMarkdown'];

    // It sets the initial Markdown and parses it.
    public function mount($markdown)
    {
        $this->markdown = $markdown;
        $this->parseMarkdown();
    }

    // The 'updateMarkdown' method is called when the 'markdownUpdated' event is fired.
    // It updates the Markdown and parses it.
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
