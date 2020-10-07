<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

     // (...$roles) is splat or scatter operator for pass array of user role 
     // from checkRole middleware.
    
    public function handle($request, Closure $next, ...$roles)
    {
        $roleIds = ['admin' => 1, 'dssUser' => 2, 'surveyer' => 3, 'approver' => 4, 'committee' => 5, 'bstiAdmin' => 6];
        $allowedRoleIds = [];
        foreach ($roles as $role) {
            if(isset($roleIds[$role]))
            {
                $allowedRoleIds[] = $roleIds[$role];
            }
        }
        $allowedRoleIds = array_unique($allowedRoleIds);

        if(Auth::check()) {
            if(in_array(Auth::user()->role_id, $allowedRoleIds)) {
                return $next($request);
            }
        }

        return response(view('unauthorized'));
    }
}
