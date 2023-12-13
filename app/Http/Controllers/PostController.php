<?php

namespace App\Http\Controllers;

use App\Models\ForumPost;
use App\Models\UserReply;
use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class PostController extends Controller
{
    public function show(Request $request)
    {
        // If the user is an admin, redirect to the admin dashboard


        //resets previous search
        session()->forget('previous_search');

        $forumPosts = ForumPost::with('user')->latest()->paginate(5);

        $forumPost = ForumPost::with('user')->get();

        $trashedPosts = ForumPost::onlyTrashed()->get();

        $getTag = Tags::get();

        $tags = $getTag->pluck('name');

        $selectedTag = null; // No selected tag

        if (Auth::check() && Auth::user()->role == 'admin') {
            return view('admin-threads', compact('forumPost', 'tags', 'selectedTag', 'trashedPosts'));
        }
        return view('user-dashboard', compact('forumPosts', 'tags', 'selectedTag'));
    }

    public function filterByTag($tag)
    {
        $query = ForumPost::whereHas('categories.tag', function ($query) use ($tag) {
            $query->where('name', $tag);
        });

        $forumPosts = $query->with('user')->latest()->paginate(5);

        $tags = Tags::pluck('name');

        $selectedTag = $tag; // Assign the selected tag

        return view('user-dashboard', compact('forumPosts', 'tags', 'selectedTag'));
    }

    public function filterByTagWithSolution($tag = null, $status = null)
    {
        $query = ForumPost::query();

        if ($status === 'recent') {

        }

        if ($status === 'resolved') {
            $query->whereHas('user_reply', function ($query) {
                $query->where('solution', true);
            });
        }

        if ($status === 'unresolved') {
            $query->whereHas('user_reply', function ($query) {
                $query->where('solution', false);
            });
        }

        if ($tag) {
            $query->whereHas('categories.tag', function ($query) use ($tag) {
                $query->where('name', $tag);
            });
        }

        $forumPosts = $query->with('user')->latest()->paginate(5);

        $tags = Tags::pluck('name');

        $selectedTag = $tag; // Assign the selected tag

        return view('user-dashboard', compact('forumPosts', 'tags', 'selectedTag'));
    }

    public function showResolved()
    {

        $forumPosts = ForumPost::whereHas('user_reply', function ($query) {
            $query->where('solution', true);
        })->with('user')->latest()->paginate(5);

        $getTag = Tags::get();

        $tags = $getTag->pluck('name');

        $selectedTag = null; // No selected tag

        return view('user-dashboard', compact('forumPosts', 'selectedTag', 'tags'));
    }

    public function showUnresolved()
    {
        $forumPosts = ForumPost::with('user')->latest()->paginate(5);

        $getTag = Tags::get();

        $tags = $getTag->pluck('name');

        $selectedTag = null; // No selected tag

        return view('user-dashboard', compact('forumPosts', 'selectedTag', 'tags'));
    }

    public function trashPost($postId)
    {
        $post = ForumPost::find($postId);

        if ($post) {
            $post->delete();
        }

        return redirect()->back();
    }

    public function restorePost($postId)
    {
        $post = ForumPost::onlyTrashed()->find($postId);

        if ($post) {
            $post->restore();
        }

        return redirect()->back();
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

        $tags = $getTag->pluck('name'); // Fetch the tags that have an ID in the tagIds array

        return view('edit-user-post', ['post' => $post, 'tags' => $tags]);
    }

}
