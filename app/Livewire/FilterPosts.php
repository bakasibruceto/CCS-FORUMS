<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ForumPost;
use App\Models\UserReply;

class FilterPosts extends Component
{
    public $showSolved = false;
    public $filter;

    public function toggleShowSolved()
    {
        $this->showSolved = !$this->showSolved;
        $this->emitTo('filter-posts', 'filterByTag', [$this->filter, $this->showSolved]);
    }

    public function render()
    {
        $query = ForumPost::query();

        if ($this->showSolved) {
            $query->whereHas('replies', function ($query) {
                $query->where('solution', true);
            });
        }

        if ($this->filter) {
            // Apply your filter logic here
        }

        $posts = $query->get();

        return view('livewire.filter-posts', ['posts' => $posts]);
    }
}
