<?php
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

// Initial route
Route::get('/', function () {
    return view('dashboard');
});

// Check if user is logged
Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    // Check if role is user
    Route::group(['middleware' => 'role:user'], function () {
        Route::get('/', [UserController::class, 'index'])->name('user.index');
    });

    // Check if role is admin
    Route::group(['middleware' => 'role:admin'], function () {
        Route::resource('admin', AdminController::class)->names('admin');
    });

    // Search Bar
    Route::get('search', [SearchController::class, 'search'])->name('search');

    // Used the 'username' as the route name for showing user profile
    Route::get('{user:username}', [SearchController::class, 'show'])->name('user.show');
});

// Redirect user roles
Route::get('dashboard', function () {
    if (auth()->user()->role === 'user') {
        return redirect()->route('user.index');
    } elseif (auth()->user()->role === 'admin') {
        return redirect()->route('admin.index');
    }
})->name('dashboard');


// Handle undefined routes if user is not logged-in
Route::fallback(function () {
    return redirect()->route('login');
});
