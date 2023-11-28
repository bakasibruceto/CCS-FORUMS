<?php

namespace App\Livewire\Counter;
use Livewire\Component;
use App\Models\UserReply;
class CountComment extends Component
{
    public $post_id;
    public $totalReplies;
    protected $listeners = ['replyAdded' => 'loadReplies'];

    public function mount($post_id)
    {
        $this->post_id = $post_id;
    }

    public function loadReplies()
    {
        $this->totalReplies = UserReply::where('post_id', $this->post_id)->count();
    }
    public function render()
    {
        $this->loadReplies();
        return view('livewire.counter.comment-component');
    }
}
