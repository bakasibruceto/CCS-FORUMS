<?php

namespace App\Livewire\Counter;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class UserFollow extends Component
{
    public int $userId;

    public bool $following = false;

    public function mount()
    {
        $this->following = Auth::user()->following->contains($this->userId);
    }

    public function render()
    {
        return view('livewire.user-follow');
    }

    public function follow()
    {
        if ($this->following) {
            Auth::user()->following()->detach($this->userId);
        } else {
            Auth::user()->following()->attach($this->userId);
        }

        $this->following = !$this->following;

        // $this->emit('followed', $this->userId);
    }
}
