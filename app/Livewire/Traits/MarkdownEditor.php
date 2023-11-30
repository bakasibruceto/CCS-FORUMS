<?php

namespace App\Livewire\Traits;
use Highlight\Highlighter;
use Parsedown;
trait MarkdownEditor{

    public $markdown = '';
    public $previewMode = false;
    private function parseMarkdown()
    {
        $parsedown = new Parsedown();

        // Parse Markdown content
        $this->parsedMarkdown = $parsedown->text($this->markdown);

        // Highlight code blocks using Highlight.js
        return $this->parsedMarkdown = $this->highlightCodeBlocks($this->parsedMarkdown);
    }

    private function replyMarkdown($reply)
    {
        $parsedown = new Parsedown();

        // Parse Markdown content
        $this->parsedMarkdown = $parsedown->text($reply);

        // Highlight code blocks using Highlight.js
        return $this->parsedMarkdown = $this->highlightCodeBlocks($this->parsedMarkdown);
    }
    public function togglePreview()
    {
        $this->previewMode = !$this->previewMode;
    }

    public function toggleWrite()
    {
        $this->previewMode = !$this->previewMode;
    }
}
