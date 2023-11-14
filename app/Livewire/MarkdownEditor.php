<?php

namespace App\Livewire;

use Livewire\Component;
use Michelf\Markdown;
use Parsedown;

class MarkdownEditor extends Component
{
    public $markdownText = '';
    public $previewMode = false;

    public function render()
    {
        $htmlContent = $this->previewMode ? Markdown::defaultTransform($this->markdownText) : '';

        return view('livewire.markdown-editor', ['htmlContent' => $htmlContent]);
    }
    public function togglePreviewMode()
    {
        $this->previewMode = !$this->previewMode;
    }


}
