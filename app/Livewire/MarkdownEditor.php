<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ForumPost;
use Illuminate\Support\Facades\Auth;

class MarkdownEditor extends Component
{
    protected $layout = 'layouts.app';
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
        return \Parsedown::instance()->text($this->markdown);
    }

    public function togglePreview()
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

}
