<?php
use App\Http\Controllers\User\ViewController;
use App\Http\Controllers\Admin\AdminViewController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::group(['middleware' => 'role:user'], function () {
        Route::resource('user', ViewController::class)->names([
            'index' => 'user.index', // Define the route name for the index action
            // You can define names for other resource actions if needed
        ]);
    });

    Route::group(['middleware' => 'role:admin'], function () {
        Route::resource('admin', AdminViewController::class)->names([
            'index' =>'admin.index', // Define the route name for the index action
            // You can define names for other resource actions if needed
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
