<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::user())
            return redirect("login");

        if (\Auth::user()->level == '1')
            return $next($request);
        else
            return redirect('home')->with('error', "You don't have access to this page!");
    }
}
