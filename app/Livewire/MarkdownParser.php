<?php

namespace App\Livewire;

use Livewire\Component;
use Parsedown;

class MarkdownParser extends Component
{
    public $markdown;
    public $parsedMarkdown;

    public function render()
    {
        return view('livewire.markdown-parser');
    }

    public function parseMarkdown()
    {
        $parsedown = new Parsedown();
        $this->parsedMarkdown = $parsedown->text($this->markdown);
    }
}
