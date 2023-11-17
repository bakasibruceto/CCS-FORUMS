<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ForumPost;
use Highlight\Highlighter;
use Illuminate\Support\Facades\Auth;
use Parsedown;

class MarkdownEditor extends Component
{
    public $markdown = '';
    public $subject = '';
    public $tags = '';
    public $previewMode = false;
    public $user;

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function render()
    {

        return view('livewire.markdown-editor', [
            'parsedMarkdown' => $this->parseMarkdown(),
        ]);
    }

    private function parseMarkdown()
    {
        $parsedown = new Parsedown();
        $parsedown->setSafeMode(true);

        // Parse Markdown content
        $this->parsedMarkdown = $parsedown->text($this->markdown);

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

    public function savePost()
    {
        try {
            // Validate the input if needed
            $this->validate([
                'subject' => 'required|max:255',
                'tags' => 'required|max:255',
                'markdown' => 'required',
            ]);

            // Save the post to the database
            ForumPost::create([
                'user_id' => $this->user->id,
                'title' => $this->subject,
                'tags' => $this->tags,
                'markdown' => $this->markdown,
            ]);

            // Reset the form fields after saving
            $this->subject = '';
            $this->tags = '';
            $this->markdown = '';

            // Optionally, you can redirect the user after saving
            // session()->flash('success', 'Post saved successfully!');
            return redirect()->route('/');

        } catch (\Exception $e) {
            // Log the exception for debugging
            \Log::error($e);

            // session()->flash('error', 'An error occurred while saving the post.');
            return redirect()->back();
            // return redirect()->route('/');
        }
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
                $language = strtolower($langMatches[1]);
            }

            // If language is not specified, attempt to auto-detect it
            if (empty($language)) {
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

    private function isValidLanguage($highlighter, $language)
    {
        // List of commonly used language identifiers
        $commonLanguages = ['c', 'cpp', 'java', 'python', 'php', 'javascript', 'typescript', 'html', 'css', 'ruby', 'csharp', 'swift'];

        // Normalize the language identifier (replace special characters)
        $normalizedLanguage = $this->normalizeLanguage($language);

        // Check if the normalized language is in the list of commonly used languages
        return in_array($normalizedLanguage, $commonLanguages);
    }

    private function normalizeLanguage($language)
    {
        // Replace special characters in the language identifier
        return str_replace(['+', '#'], '', $language);
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
