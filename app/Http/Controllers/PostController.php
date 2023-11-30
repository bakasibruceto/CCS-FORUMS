<?php

namespace App\Http\Controllers;

use App\Models\ForumPost;
use App\Models\Tags;
use Illuminate\Http\Request;
use App\Models\User;


class PostController extends Controller
{
    public function show(Request $request)
    {
        //resets previous search
        session()->forget('previous_search');

        $forumPosts = ForumPost::with('user')->latest()->paginate(5);

        $getTag = Tags::get();

        $tags = $getTag->pluck('name');

        return view('user-dashboard', compact('forumPosts', 'tags'));
    }

    public function filterByTag($tag)
    {
        $forumPosts = ForumPost::whereHas('categories.tag', function ($query) use ($tag) {
            $query->where('name', $tag);
        })->with('user')->latest()->paginate(5);

        $tags = Tags::pluck('name');

        return view('user-dashboard', compact('forumPosts', 'tags'));
    }

    public function get($id)
    {
        $post = ForumPost::find($id);

        if (!$post) {
            // Handle the case when the post with the given ID is not found
            abort(404);
        }

        return view('user-post', ['post' => $post]);
    }

    public function edit($id)
    {
        $post = ForumPost::find($id);

        if (!$post) {
            // Handle the case when the post with the given ID is not found
            abort(404);
        }

        $categories = $post->categories; // Fetch the categories associated with the post
        $tagIds = $categories->pluck('tag_id'); // Fetch the tag_ids associated with these categories

        $getTag = Tags::whereIn('id', $tagIds)->get();

        $tags = $getTag->pluck('name');// Fetch the tags that have an ID in the tagIds array

        return view('edit-user-post', ['post' => $post, 'tags' => $tags]);
    }

}
