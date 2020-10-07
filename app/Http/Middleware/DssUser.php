<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class DssUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role_id == 2) {
            return $next($request);
        }

        //abort(403);
        // return redirect()->route('home');
        return response(view('unauthorized'));
    }
}
