<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class ViewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      

        //check the search value with out database
        // $search = User::orderby('created_at','desc')->paginate(10);

        //check if there is a search
        // if(request()->has('search')){
        //     $search = $search->where('content','like','%'.request()->get('search'.'').'%');

        // }

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
