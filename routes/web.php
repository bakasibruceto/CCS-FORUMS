<?php
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::group(['middleware' => 'role:user'], function () {
    
        Route::resource('/', UserController::class)->names([
            //method from UserController => route name
            'index' => 'user.index',
      
        ]);
        // Use the 'username' as the route name for showing user profile
        Route::get('{user:username}', [UserController::class, 'show'])->name('user.show');

    });

    Route::group(['middleware' => 'role:admin'], function () {
        Route::resource('admin', AdminController::class)->names([
            //method    route name
            'index' =>'admin.index', 

        ]);
    });

    // Create a 'dashboard' route to redirect based on the user's role
    Route::get('dashboard', function () {
        if (auth()->user()->role === 'user') {
            return redirect()->route('user.index'); // Use the named route for the 'user' resource index
        } elseif (auth()->user()->role === 'admin') {
            return redirect()->route('admin.index'); // Use the named route for the 'admin' resource index
        }
    })->name('dashboard');
});


// Handle undefined routes for all users
Route::fallback(function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    // For non-authenticated users, redirect to the login page
    return redirect()->route('login');
});
