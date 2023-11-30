<?php

namespace App\Livewire\Comment;

use App\Livewire\Traits\HighlighterJS;
use App\Livewire\Traits\MarkdownEditor;
use App\Models\UserReply;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;


class EditComment extends Component
{

    use HighlighterJS, MarkdownEditor;
    public $user;
    public $replyId;
    public $reply;
    public $getReply;
    public $parsedMarkdown;

    public function mount($replyId)
    {
        $this->user = Auth::user();
        $this->replyId = $replyId;
        $this->getReplyIdFromAuthUserId();
        $this->getReply = $this->getMarkdownFromReplyId($replyId);
    }
    public function render()
    {
        // $this->parsedMarkdown = Parsedown::instance()->text($this->getReply);
        return view('livewire.comment.edit-comment', [
            'parsedMarkdown' => $this->updatedGetReply(),
        ]);
    }

    public function getMarkdownFromReplyId($replyId)
    {
        $reply = UserReply::find($replyId);
        return $reply ? $reply->markdown : null;
    }

    public function getReplyIdFromAuthUserId()
    {
        $reply = UserReply::where('user_id', auth()->id())->first();
        return $reply ? $reply->id : null;
    }

    public function updatedGetReply()
    {
        $this->parsedMarkdown = $this->replyMarkdown($this->getReply);
    }

    public function savePost()
    {
        try {
            // Validate the input if needed
            $this->validate([
                'getReply' => 'required',
            ]);

            // Find the reply in the database
            $reply = UserReply::find($this->replyId);

            // Update the reply
            if ($reply) {
                $reply->update([
                    'markdown' => $this->getReply,
                ]);
            }

            // Fire the event to close edit comment
            $this->dispatch('editEvent', $this->replyId);
            $this->dispatch('mark', $this->replyId);

            // Reset the form fields after updating
            $this->getReply = '';


            return redirect()->route('user-post', ['id' => $this->post_id]);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
        }
    }

}
