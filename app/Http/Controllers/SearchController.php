<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        // input search textfield
        $search = $request->input('q');

        if (empty($search)) {
            
            // Redirect back to the previous page.
            return back(); 
        }

        //Select * from User where username like userInput
        $results = User::where('username', 'like', '%' . $search . '%')->get();

        // return result
        return view('search-results', compact('results'));
    }

    public function show($username)
    {
        $user = User::where('username', $username)->first();
        $role = auth()->user()->role; // Get the role of the user

        if (!$user) {
            if ($role == 'user') {

                // Handle when the user is not found
                return back(); 

            } elseif ($role == 'admin') {

                // Redirect to the admin view if the user's role is "admin"
                return view('admin-dashboard'); 

            } else {

                // Redirect back if the user's role is neither "user" nor "admin"
                return back(); 
            }
        }

        return view('users.shows', compact('user'));
    }
}
