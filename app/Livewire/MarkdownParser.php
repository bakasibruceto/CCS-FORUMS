<?php

namespace App\Livewire;

use Livewire\Component;
use Parsedown;
use Highlight\Highlighter;

class MarkdownParser extends Component
{

    public $markdown;
    public $parsedMarkdown;

    public function mount()
    {
        $this->parseMarkdown();
    }

    public function render()
    {
        return view('livewire.markdown-parser');
    }

    public function parseMarkdown()
    {
        // Create Parsedown instance
        $parsedown = new Parsedown();

        // Parse Markdown content
        $this->parsedMarkdown = $parsedown->text($this->markdown);

        // Highlight code blocks using Highlight.js
        $this->parsedMarkdown = $this->highlightCodeBlocks($this->parsedMarkdown);
    }

    private function highlightCodeBlocks($content)
    {
        // Use Highlight.js for syntax highlighting
        $highlighter = new Highlighter();

        // Find and replace code blocks
        $content = preg_replace_callback('/<pre><code(.*?)>(.*?)<\/code><\/pre>/s', function ($matches) use ($highlighter) {
            $attributes = $matches[1];
            $code = $matches[2];
            $language = '';

            // Check if the language is specified in the attributes
            if (preg_match('/class=".*?language-(.*?)(?: .*?)?"/', $attributes, $langMatches)) {
                $language = $langMatches[1];
            }

            // If language is not specified, attempt to auto-detect it
            if (empty($language)) {
                $autoDetect = $this->autoDetectLanguage($code, $highlighter);
                $language = $autoDetect;
            }

            // Highlight the code
            $highlighted = $highlighter->highlight($language, $code);

            // Return the highlighted code block
            return '<pre><code class="hljs language-' . $highlighted->language . '">' . $highlighted->value . '</code></pre>';
        }, $content);

        return $content;
    }

    private function autoDetectLanguage($code, $highlighter)
    {
        // You can implement your own logic for auto-detection here
        // This is just a simple example, and you may need to improve it based on your requirements
        $languages = $highlighter->listLanguages();

        foreach ($languages as $lang) {
            $result = $highlighter->highlight($lang, $code);
            if ($result->language !== 'plaintext') {
                return $lang;
            }
        }

        // Default to plaintext if no suitable language is found
        return 'plaintext';
    }
}
