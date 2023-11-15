<?php

namespace App\Http\Controllers;
use App\Models\ForumPost;
use Illuminate\Http\Request;
use App\Models\User;


class PostController extends Controller
{
    public function show(Request $request)
    {
        $forumPosts = ForumPost::with('user')->latest()->get();

        return view('user-dashboard', compact('forumPosts'));
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

}
