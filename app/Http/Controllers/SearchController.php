<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        // not sure how this this work and how I'll user it but it works the same as this:
        // $user = auth()->user();
        // $user = auth()->forumpost()->user_id;

        $user = User::when(auth()->check(),function($query){
            $query->where('id', '!=', auth()->id());
        })->paginate();


        // Select * from forum post
        // for each
        // end foreach
        // input search textfield
        $search = $request->input('q');

        // store search value in session
        session(['previous_search' => $search]);

        if (empty($search)) {

            // Redirect back to the previous page.
            return back();
        }

        //Select * from User where username like userInput
        $results = User::where('username', 'like', '%' . $search . '%')->get();

        // return result
        return view('search-results', compact('results', 'user') );
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

        return view('users.shows', compact('user','totalFollowing',"totalFollowers"));
    }
}
