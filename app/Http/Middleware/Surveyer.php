<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Surveyer
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
            return 'login';
        }

        if (Auth::user()->role_id == 3) {
            return $next($request);
        }

        //abort(403);
        // return redirect()->route('home');
        return response(view('unauthorized'));

    }
}
