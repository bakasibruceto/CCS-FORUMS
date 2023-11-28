<?php


namespace App\Livewire;

use Livewire\Component;
use App\Models\UserReply;

class ReplyComponent extends Component
{
    public $post_id;
    public $replies;
    protected $listeners = ['replyAdded' => 'loadReplies'];

    public function mount($post_id)
    {
        $this->post_id = $post_id;
        $this->loadReplies();
    }
    public function loadReplies()
    {
        $this->replies = UserReply::getRepliesByPostId($this->post_id);
    }
    public function render()
    {
        $this->loadReplies();
        return view('livewire.reply-component');
    }
}
