<?php

namespace App\Livewire\Comment;
use Livewire\Component;
use App\Models\UserReply;

class ReadComment extends Component
{
    public $post_id;

    public $editing = [];
    public $replies;
    protected $listeners = ['replyAdded' => 'loadReplies', 'editEvent' => 'toggleEdit', 'markdownUpdated' => 'refreshComment', 'mark' => 'refreshComment'];

    public $edit = false;


    public function mount($post_id)
    {
        $this->post_id = $post_id;
        $this->loadReplies();
    }
    public function loadReplies()
    {
        $this->replies = UserReply::getRepliesByPostId($this->post_id);
    }

    public function refreshComment($replyId)
    {
        // Find the index of the reply in the replies collection
        $index = $this->replies->search(function ($reply) use ($replyId) {
            return $reply->id == $replyId;
        });

        // If the reply is found in the collection, refresh it
        if ($index !== false) {
            // Reload the reply from the database
            $updatedReply = UserReply::find($replyId);

            // Update the reply in the replies collection
            $this->replies[$index] = $updatedReply;

            // Re-assign the entire collection to itself to trigger a re-render
            $this->replies = $this->replies->values();
        }
    }

    public function deleteComment($replyId)
    {
        // Find the reply
        $reply = UserReply::find($replyId);

        // Check if the current user is the author of the reply
        if (auth()->user()->id == $reply->user_id) {
            // $reply->likedBy()->delete();

            // Delete the reply
            $reply->delete();

            // Refresh the replies
            $this->loadReplies();
        }
    }

    public function render()
    {
        $this->loadReplies();
        return view('livewire.comment.read-comment');
    }

    public function toggleEdit($replyId)
    {
        $this->editing[$replyId] = !isset($this->editing[$replyId]) ? true : !$this->editing[$replyId];
    }
}
