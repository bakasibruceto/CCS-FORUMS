<?php

namespace App\Livewire;
use App\Models\ForumPost;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserLikes extends Component
{
    public $post_id;
    public $liked = false;

    public function mount($post_id)
    {
        $this->post_id = $post_id;
        $this->liked = Auth::user()->likes->contains($this->post_id);
    }

    public function render()
    {
        // $this->post_id = $post_id;
        // $this->liked = Auth::user()->likes->contains($this->post_id);
        $totalLikes = ForumPost::find($this->post_id)->likedBy->count();
        // $this->like();
        return view('livewire.user-likes', ['totalLikes' => $totalLikes]);
    }

    public function like()
    {
        if ($this->liked) {
            Auth::user()->likes()->detach($this->post_id);
        } else {
            Auth::user()->likes()->attach($this->post_id);
        }

        $this->liked = !$this->liked;
    }
}
