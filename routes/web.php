<?php
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\PostController;
use App\Livewire\Thread\CreateThread;
use App\Livewire\Chat\CreateChat;
use Illuminate\Support\Facades\Route;

// Initial route
Route::get('/', function () {
    return view('auth');
});

Route::get('/admin', function () {
    return view('admin-dashboard');
});

// Check if user is logged
Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::group(['middleware' => 'role:user'], function () {
        Route::get('/', [PostController::class, 'show'])->name('user.index');
        Route::get('/posts/filter/{tag}', [PostController::class, 'filterByTag'])->name('posts.filter');
        Route::get('/posts/filter/{tag}/{status?}', [PostController::class, 'filterByTagWithSolution'])->name('posts.filter');
        Route::get('/posts/resolved', [PostController::class, 'showResolved'])->name('posts.resolved');
        Route::get('/posts/unresolved', [PostController::class, 'showUnresolved'])->name('posts.unresolved');
        // Search Bar
        Route::get('search', [SearchController::class, 'search'])->name('search');

        // Create Thread
        Route::get('/createthread', function () {
            return view('create-thread');
        });

        // Single page Thread
        Route::get('/thread/{postId}', [PostController::class, 'get'])
            ->name('user-post.show');

        Route::get('/edit/thread/{postId}', [PostController::class, 'edit'])
            ->name('edit-thread')
            ->middleware('checkUserPost');
        // Used the 'username' as the route name for showing user profile
        Route::get('{user:username}', [SearchController::class, 'show'])->name('user.show');
        Route::get('{user:username}/replies ', [SearchController::class, 'show'])->name('user.replies');
        Route::post('/createthread', [CreateThread::class, 'savePost'])->name('create-thread');
    });

    // Check if role is admin
    Route::group(['middleware' => 'role:admin'], function () {
        Route::get('admin', function () {
            // Reset the "previous_search" session value here
            session()->forget('previous_search');
            return app(AdminController::class)->index();
        })->name('admin.index');

        // Search Bar
        Route::get('admin/search', [SearchController::class, 'search'])->name('admin-search');

        Route::get('/admin/user-table', function () {
            return view('admin-userTable');
        })->name('admin.userTable');

        //Used the 'username' as the route name for showing user profile
        Route::get('admin/view/{user:username}', [SearchController::class, 'show'])->name('admin.show');

    });

});

// Redirect user roles
Route::get('dashboard', function () {
    if (auth()->user()->role === 'user') {
        return redirect()->route('user.index');
    } elseif (auth()->user()->role === 'admin') {
        return redirect()->route('admin.index');
    }
})->name('dashboard');


//Handle undefined routes if user is not logged-in or route does not exist
Route::fallback(function () {
    return redirect()->route('login');
});
