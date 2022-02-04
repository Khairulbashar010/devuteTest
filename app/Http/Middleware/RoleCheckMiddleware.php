<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleCheckMiddleware
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
        $roles = array_slice(func_get_args(), 2); // [default, admin, manager]
        if(Auth::check()){
            foreach ($roles as $role) {
                if (Auth::user()->role_id == $role) {
                    return $next($request);
                }
            }
            return redirect()->back();
        }else{
            return redirect('/');
        }
    }
}
