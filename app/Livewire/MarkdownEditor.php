<?php

namespace App\Livewire;

use Livewire\Component;

class MarkdownEditor extends Component
{
    public $markdown = '';
    public $previewMode = false;

    public function render()
    {
        return view('livewire.markdown-editor', [
            'parsedMarkdown' => $this->parseMarkdown(),
        ]);
    }

    private function parseMarkdown()
    {
        return \Parsedown::instance()->text($this->markdown);
    }

    public function togglePreview()
    {
        $this->previewMode = !$this->previewMode;
    }
}
