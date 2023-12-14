<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ForumPost;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $user = User::when(auth()->check(),function($query){
            $query->where('id', '!=', auth()->id());
        })->paginate();

        $search = $request->input('q');

        session(['previous_search' => $search]);

        if (empty($search)) {
            // Redirect back to the previous page.
            return back();
        }

        // Select * from User where username like userInput
        $userResults = User::where('username', 'like', '%' . $search . '%')->get();

        // Select * from ForumPost where title or content like userInput
        $postResults = ForumPost::where('title', 'like', '%' . $search . '%')
                    ->orWhere('markdown', 'like', '%' . $search . '%')
                    ->orWhereHas('user', function ($query) use ($search) {
                        $query->where('username', 'like', '%' . $search . '%');
                    })
                    ->get();

        // return result
        return view('search-results', compact('userResults', 'postResults', 'user'));
    }

    public function show($username)
    {
        $user = User::where('username', $username)->first();

        // Get the role of the user
        $role = auth()->user()->role;

        // Check if the user exists
        if (!$user) {
            if ($role == 'user') {
                // Handle when the user is not found
                return back();
            } if ($role == 'admin') {
                // Redirect to the admin view if the user's role is "admin"
                return view('admin-dashboard');
            } else {
                // Redirect back if the user's role is neither "user" nor "admin"
                return back();
            }
        }

        $totalFollowing = $user->following->count();
        $totalFollowers = $user->followers->count();
        $postCount = $user->posts->count();

        return view('users.shows',['username' => $username], compact('user','totalFollowing',"totalFollowers", "postCount"));
    }
}
