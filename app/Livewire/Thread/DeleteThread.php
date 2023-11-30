<?php

namespace App\Livewire\Thread;

use App\Models\ForumPost;
use Livewire\Component;

class DeleteThread extends Component
{
    public $postId;

    public function mount($postId)
    {
        $this->postId = $postId;
    }

    public function render()
    {
        return view('livewire.thread.delete-thread');
    }

    public function delete()
    {
        $post = ForumPost::find($this->postId);
        $post->delete();
    }
}
