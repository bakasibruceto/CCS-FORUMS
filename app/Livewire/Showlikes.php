<?php

namespace App\Livewire;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Showlikes extends Component
{
    public int $userId;

    public bool $like = false;

    public function mount()
    {
        $this->like = Auth::user()->like->contains($this->userId);
    }

    public function render()
    {

        return view('livewire.showlikes');
    }

    public function follow()
    {
        if ($this->like) {
            Auth::user()->following()->detach($this->userId);
        } else {
            Auth::user()->following()->attach($this->userId);
        }

        $this->like = !$this->like;
    }

}
