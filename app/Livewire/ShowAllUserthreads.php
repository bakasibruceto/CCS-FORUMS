<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\ForumPost;

class ShowAllUserthreads extends Component
{
    public $posts;

    public function mount($username)
    {
        $user = User::where('username', $username)->first();
        $this->posts = ForumPost::where('user_id', $user->id)->get();
    }

    public function render()
    {
        return view('livewire.show-all-userthreads', ['posts' => $this->posts]);
    }

}
