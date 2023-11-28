<?php

namespace App\Livewire\Comment;
use App\Livewire\Traits\HighlighterJS;
use App\Livewire\Traits\MarkdownEditor;
use App\Models\UserReply;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;


class CreateComment extends Component
{
    use HighlighterJS, MarkdownEditor;
    public $user;
    public $post_id;
    public $replies;

    public function mount($post_id)
    {
        $this->user = Auth::user();
        $this->post_id = $post_id;
        $this->loadReplies();
    }

    public function loadReplies()
    {
        $this->replies = UserReply::getRepliesByPostId($this->post_id);
    }
    public function render()
    {
        return view('livewire.comment.create-comment', [
            'parsedMarkdown' => $this->parseMarkdown(),
        ]);
    }
    public function savePost()
    {
        try {
            // Validate the input if needed
            $this->validate([
                'markdown' => 'required',
            ]);

            // Save the post to the database
            UserReply::create([
                'user_id' => auth()->id(),
                'post_id' => $this->post_id,
                'markdown' => $this->markdown,
            ]);

            // Emit an event after the reply is saved
            $this->dispatch('replyAdded');

            // Reset the form fields after saving
            $this->markdown = '';

            return redirect()->route('user-post', ['id' => $this->post_id]);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
        }
    }
}
