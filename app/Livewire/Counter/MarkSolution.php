<?php

namespace App\Livewire\Counter;

use App\Models\UserReply;
use Livewire\Component;

class MarkSolution extends Component
{
    public $postId;
    public $replyId;

    public $reply;

    public function mount($postId, $replyId)
    {
        $this->postId = $postId;
        $this->replyId = $replyId;
        $this->reply = UserReply::find($replyId);
    }

    public function markAsSolution()
    {
        // Set the solution field of all replies to false
        UserReply::where('post_id', $this->postId)->update(['solution' => false]);

        // Find the reply
        $reply = UserReply::find($this->replyId);

        // Set the solution field to true
        $reply->solution = true;

        // Save the reply
        $reply->save();

        return redirect()->to('/thread/' . $this->postId);
    }
    public function render()
    {
        return view('livewire.counter.mark-solution');
    }
}
