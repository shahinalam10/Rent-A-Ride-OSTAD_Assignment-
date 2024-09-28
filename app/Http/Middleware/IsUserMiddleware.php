<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsUserMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is logged in and is not admin
        if (Auth::check() && Auth::user()->usertype == 'admin') {
            return redirect('/admin/dashboard'); // If admin, redirect to admin dashboard
        }

        return $next($request); // Allow normal user access
    }
}
