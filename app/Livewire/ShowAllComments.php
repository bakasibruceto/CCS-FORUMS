<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\UserReply;

class ShowAllComments extends Component
{
    public $username;

    public function mount($username)
    {
        $this->username = $username;
    }

    public function render()
    {
        $user = User::where('username', $this->username)->first();
        $replies = UserReply::where('user_id', $user->id)->with('post')->orderBy('created_at', 'desc')->paginate(5);

        return view('livewire.show-all-comments', ['replies' => $replies]);
    }
}
