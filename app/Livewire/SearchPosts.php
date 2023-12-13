<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ForumPost;
use App\Models\Tags;

class SearchPosts extends Component
{
    public $searchTerm;
    public $selected;
    public $tag;

    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';

        $forumPosts = ForumPost::query()
            ->when($this->tag, function ($query) {
                $query->whereHas('tags', function ($query) {
                    $query->where('id', $this->tag);
                });
            })
            ->where('title', 'like', $searchTerm)
            ->latest()
            ->get();

        $trashedPosts = ForumPost::onlyTrashed()
            ->when($this->tag, function ($query) {
                $query->whereHas('tags', function ($query) {
                    $query->where('id', $this->tag);
                });
            })
            ->where('title', 'like', $searchTerm)
            ->get();

        $tags = Tags::all();

        return view('livewire.search-posts', [
            'forumPosts' => $forumPosts,
            'trashedPosts' => $trashedPosts,
            'tags' => $tags,
        ]);
    }
}
