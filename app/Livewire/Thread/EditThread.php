<?php

namespace App\Livewire\Thread;

use App\Livewire\Traits\HighlighterJS;
use App\Livewire\Traits\MarkdownEditor;
use Livewire\Component;
use App\Models\ForumPost;
use Illuminate\Support\Facades\Auth;

class EditThread extends Component
{
    use HighlighterJS, MarkdownEditor;

    public $subject = '';
    public $tags = '';
    public $user;

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function render()
    {
        return view('livewire.thread.edit-thread', [
            'parsedMarkdown' => $this->parseMarkdown(),
        ]);
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
            return redirect()->to('/');

        } catch (\Exception $e) {
            // Log the exception for debugging
            \Log::error($e);

            // session()->flash('error', 'An error occurred while saving the post.');
            return redirect()->back();
            // return redirect()->route('/');
        }
    }



}
