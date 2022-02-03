<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{

    public function handle(Request $request, Closure $next, ...$guards)
    {
        if (Auth::guard($guards)->check() && Auth::user()->role_id == 2){
            return redirect()->route('user.dashboard');
        }elseif (Auth::guard($guards)->check() && Auth::user()->role_id == 1){
            return redirect()->route('admin.dashboard');
        }else{
            return $next($request);
        }
    }
}
