<?php

namespace App\Livewire;
use App\Models\UserReply;
use Livewire\Component;

class CheckSolution extends Component
{
    public $postId;
    public $isSolved;

    public function mount($postId)
    {
        $this->postId = $postId;
        $this->isSolved = UserReply::where('post_id', $postId)->where('solution', true)->exists();
    }
    public function render()
    {
        return view('livewire.check-solution');
    }
}
