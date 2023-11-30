<?php

namespace App\Livewire\Traits;
use Parsedown;

// This trait provides Markdown parsing functionality.
trait MarkdownEditor{

    // This property will hold the Markdown text.
    public $markdown = '';

    // This property indicates whether the preview mode is enabled.
    public $previewMode = false;

    // This method parses the Markdown text into HTML.
    private function parseMarkdown()
    {
        // Create a new Parsedown instance.
        $parsedown = new Parsedown();

        // Parse the Markdown text into HTML.
        $this->parsedMarkdown = $parsedown->text($this->markdown);

        // Highlight code blocks in the parsed HTML.
        return $this->parsedMarkdown = $this->highlightCodeBlocks($this->parsedMarkdown);
    }

    // This method parses a reply in Markdown format into HTML.
    private function replyMarkdown($reply)
    {
        // Create a new Parsedown instance.
        $parsedown = new Parsedown();

        // Parse the reply into HTML.
        $this->parsedMarkdown = $parsedown->text($reply);

        // Highlight code blocks in the parsed HTML.
        return $this->parsedMarkdown = $this->highlightCodeBlocks($this->parsedMarkdown);
    }

    // This method toggles the preview mode.
    public function togglePreview()
    {
        $this->previewMode = !$this->previewMode;
    }

    // This method toggles the write mode.
    public function toggleWrite()
    {
        $this->previewMode = !$this->previewMode;
    }
}
