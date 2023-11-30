<?php

namespace App\Http\Middleware;

use App\Models\ForumPost;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserPost
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $postId = $request->route('postId');
        $post = ForumPost::withTrashed()->where('id', $postId)->first();

        if (!$post) {
            return redirect('/')->with('error', 'The post you are trying to access does not exist.');
        }

        if ($post->deleted_at !== null && auth()->user()->role !== 'admin') {
            return redirect('/')->with('error', 'The post you are trying to access has been deleted.');
        }

        if ($post->deleted_at === null && $post->user_id != auth()->id()) {
            return redirect('/')->with('error', 'You are not authorized to edit this post.');
        }

        return $next($request);
    }
}
