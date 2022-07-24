<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsUser
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
           if(Auth::user()->role == 2) {
              return $next($request);
            } else {
                Auth::logout();
                return redirect('login')->with('dismiss',__('You are not eligible for login in this panel'));
            }

          return redirect('home')->with('error','You have not admin access');
    }
}
