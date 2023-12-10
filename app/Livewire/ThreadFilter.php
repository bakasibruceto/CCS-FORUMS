<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ForumPost;
use App\Models\Tags;

class ThreadFilter extends Component
{
    public $forumPosts;
    public $tags;

    public function mount()
    {
        $this->forumPosts = ForumPost::latest()->paginate(5);
        $this->tags = Tags::pluck('name');
    }
    public function render()
    {
        return view('livewire.thread-filter');
    }
}
