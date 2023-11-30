<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\ForumPost;

class ShowAllUserthreads extends Component
{
    public $username;

    public function mount($username)
    {
        $this->username = $username;
    }

    public function render()
    {
        $user = User::where('username', $this->username)->first();
        $posts = ForumPost::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(5);

        return view('livewire.show-all-userthreads', ['posts' => $posts]);
    }
}
