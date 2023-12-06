<?php

namespace App\Livewire\Counter;

use App\Models\UserReply;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LikeReply extends Component
{
    public $reply_id;
    public $liked = false;

    public function mount($reply_id)
    {
        $this->post_id = $reply_id;
        $this->liked = Auth::user()->Replylikes->contains($this->post_id);
    }

    public function render()
    {
        // $this->post_id = $post_id;
        // $this->liked = Auth::user()->likes->contains($this->post_id);
        $totalLikes = UserReply::find($this->reply_id)->likedBy->count();
        // $this->like();
        return view('livewire.counter.like-reply', ['totalLikes' => $totalLikes]);
    }

    public function like()
    {
        if ($this->liked) {
            Auth::user()->Replylikes()->detach($this->reply_id);
        } else {
            Auth::user()->Replylikes()->attach($this->reply_id);
        }

        $this->liked = !$this->liked;
    }

}
