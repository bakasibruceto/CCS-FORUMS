<?php
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\PostController;
use App\Livewire\MarkdownEditor;
use Illuminate\Support\Facades\Route;
use App\Livewire\ShowThread;
use Michelf\Markdown;

// Initial route
Route::get('/', function () {
    return view('dashboard');
});

// Check if user is logged
Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::group(['middleware' => 'role:user'], function () {
        Route::get('/', function () {

            // Reset the "previous_search" session value here
            session()->forget('previous_search');

            // return app(UserController::class)->index();

        })->name('user.index');
    });

    // Check if role is admin
    Route::group(['middleware' => 'role:admin'], function () {
        Route::get('admin', function () {

            // Reset the "previous_search" session value here
            session()->forget('previous_search');
            return app(AdminController::class)->index();

        })->name('admin.index');
    });

    // Search Bar
    Route::get('search', [SearchController::class, 'search'])->name('search');
    Route::get('/', [PostController::class, 'show'])->name('/');

    // Forum post
    // Route::get('/forumpost', function () {
    //     return view('user-post');
    // });

    Route::get('/createthread', function () {

        return view('create-thread');
    });

    Route::get('/thread/{postId}', [PostController::class, 'get'])->name('user-post.show');

    // Used the 'username' as the route name for showing user profile
    Route::get('{user:username}', [SearchController::class, 'show'])->name('user.show');

    // Route::get('/createthread', MarkdownEditor::class)->name('create-thread');
    Route::post('/createthread', [MarkdownEditor::class, 'savePost'])->name('create-thread');


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
