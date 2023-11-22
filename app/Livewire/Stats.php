<?php

namespace App\Livewire;
use App\Models\User;
use App\Models\ForumPost;
use Livewire\Component;

class Stats extends Component
{
    public $userCount;
    public $threadCount;
    public function render()
    {
        $this->userCount = User::count();
        $this->threadCount = ForumPost::count();
        return view('livewire.stats');
    }


}
