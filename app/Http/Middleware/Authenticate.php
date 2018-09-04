<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if((Auth::user()->role) && Auth::user()->role == 'admin'){
                return redirect('/tableAdd');
            }elseif ((Auth::user()->role) && Auth::user()->role == 'user'){
                return redirect('/treatList');
            }
        }else{
            return redirect('/login');
        }
    }
}

