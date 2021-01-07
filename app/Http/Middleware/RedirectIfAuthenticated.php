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
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if ($guard == 'admin') {
                    return redirect(RouteServiceProvider::ADMIN);
                }else {
                    return redirect(RouteServiceProvider::HOME);
                }// end of else

            }// enf of if
            
        }// end of foreach

        return $next($request);
    }// end of handle
}// end of class