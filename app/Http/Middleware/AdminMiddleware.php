<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is logged in and is an admin
        if (Auth::check() && Auth::user()->usertype != 'admin') {
            return redirect('/dashboard'); // If not admin, redirect to user dashboard
        }

        return $next($request); // Allow admin access
    }
}
