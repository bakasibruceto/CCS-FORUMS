<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('user-dashboard');
    }
    /**
     * Display the specified resource.
     */
    public function show($username)
    {
        $user = User::where('username', $username)->first();

        if (!$user) {
            abort(404); // Handle when the user is not found
        }

        return view('users.shows', compact('user'));
    }

    public function search(Request $request)
    {
        // input search textfield
        $search = $request->input('search');

       

        if (empty($search)) {
            return back(); // Redirect back to the previous page or perform any other action you prefer.
        }

        //Select * from User where username like userInput
        $results = User::where('username', 'like', '%' . $search . '%')->get();

        // return result
        return view('search-results', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.show', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
