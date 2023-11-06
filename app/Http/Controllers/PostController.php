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
}
