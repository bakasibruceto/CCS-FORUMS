<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        if ($role == 'admin' && auth()->user()->role != 'admin') {
            // if (!$request->is('login')) {
            //     // abort(403);
            //     return redirect()->back();
            // }
            // abort(403);
            return back();
        }
        if ($role == 'user' && auth()->user()->role != 'user') {
            // if (!$request->is('login')) {
            //     // abort(403);
            //     return redirect()->back();
            // }
            
            return redirect('admin');
        }

        return $next($request);
    }
}