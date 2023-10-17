<?php

use App\Http\Controllers\User\ViewController;
use App\Http\Controllers\Admin\AdminViewController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified', 'auth'])->group(function () {
    Route::group(['middleware' => 'role:user'], function () {
        Route::get('user-dashboard', [ViewController::class, 'index']);
    });

    Route::group(['middleware' => 'role:admin'], function () {
        Route::get('admin-dashboard', [AdminViewController::class, 'index']);
    });
});



// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });




// Handle undefined routes for all users
// Route::fallback(function () {
//     if (auth()->check()) {
//         return redirect()->route('dashboard');
//     }
//     // For non-authenticated users, redirect to the login page
//     return redirect()->route('login');
// });