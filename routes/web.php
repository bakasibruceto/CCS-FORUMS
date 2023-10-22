<?php
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    //Check if role is user
    Route::group(['middleware' => 'role:user'], function () {
    
        Route::resource('/', UserController::class)->names([
            //method => route name
            'index' => 'user.index',
      
        ]);
        
        // Used the 'username' as the route name for showing user profile
        Route::get('{user:username}', [UserController::class, 'show'])->name('user.show');

    });

    //Check if role is admin
    Route::group(['middleware' => 'role:admin'], function () {
        Route::resource('admin', AdminController::class)->names([
            //method    route name
            'index' =>'admin.index', 

        ]);
    });

    // Create a 'dashboard' route to redirect based on the user's role
    Route::get('dashboard', function () {
        if (auth()->user()->role === 'user') {

            // Use the named route for the 'user' resource index
            return redirect()->route('user.index'); 

        } elseif (auth()->user()->role === 'admin') {

            // Use the named route for the 'admin' resource index
            return redirect()->route('admin.index'); 
        }
    })->name('dashboard');
});


// Handle undefined routes for all users
Route::fallback(function () {
    // For authenticated users, redirect to dashboard page
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }

    // For non-authenticated users, redirect to login page
    return redirect()->route('login');
});
