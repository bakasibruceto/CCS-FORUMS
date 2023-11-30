<?php

namespace App\Livewire\Traits;

use Highlight\Highlighter;

trait HighlighterJS
{
    private function highlightCodeBlocks($content)
    {
        // Use Highlight.js for syntax highlighting
        $highlighter = new Highlighter();

        // Find and replace code blocks
        $content = preg_replace_callback('/<pre><code(.*?)>(.*?)<\/code><\/pre>/s', function ($matches) use ($highlighter) {
            $attributes = $matches[1];
            $code = $matches[2];
            $language = '';

            if (preg_match('/class=".*?language-(.*?)(?: .*?)?"/', $attributes, $langMatches)) {
                // Check if the language is specified in the attributes
                $language = strtolower($langMatches[1]);
            }


            if (empty($language)) {
                // If language is not specified, attempt to auto-detect it
                $autoDetect = $this->autoDetectLanguage($code, $highlighter);
                $language = $autoDetect;
            }

            if (!$this->isValidLanguage($highlighter, $language)) {
                // If not valid, default to plaintext or any other default language
                $language = 'plaintext';
            }

            // Decode HTML entities before highlighting
            $code = html_entity_decode($code, ENT_QUOTES, 'UTF-8');

            // Highlight the code
            $highlighted = $highlighter->highlight($language, $code);

            // Return the highlighted code block
            return '<pre><code class="hljs language-' . $highlighted->language . '">' . $highlighted->value . '</code></pre>';
        }, $content);

        return $content;
    }

    // This method checks if the given language is a valid language for syntax highlighting.
    private function isValidLanguage($highlighter, $language)
    {
        // List of commonly used language identifiers
        $commonLanguages = ['c', 'cpp', 'java', 'python', 'php', 'javascript', 'typescript', 'html', 'css', 'ruby', 'csharp', 'swift'];

        // Normalize the language identifier (replace special characters)
        $normalizedLanguage = $this->normalizeLanguage($language);

        // Check if the normalized language is in the list of commonly used languages
        return in_array($normalizedLanguage, $commonLanguages);
    }
    // This method normalizes a language identifier by replacing special characters.
    private function normalizeLanguage($language)
    {
        // Replace special characters in the language identifier
        return str_replace(['+', '#'], '', $language);
    }
    // This method attempts to auto-detect the language of a code block.
    private function autoDetectLanguage($code, $highlighter)
    {
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
