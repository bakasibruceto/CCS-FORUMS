<?php

namespace App\Livewire\Counter;
use App\Models\User;

use Livewire\Component;

class FollowerCounter extends Component
{
    public $totalFollowers;

    protected $listeners = ['followed' => 'updateCounter'];

    public function mount($username)
    {
        $user = User::where('username', $username)->first();
        $this->totalFollowers = $user->followers()->count();

    }

    public function render()
    {
        return view('livewire.counter.follower-counter');
    }

    public function updateCounter($userId)
    {
        $this->totalFollowers = User::find($userId)->followers()->count();
    }
}
