<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */

        // if (Auth::guard($guard)->check()) {
        //     return redirect(RouteServiceProvider::HOME);
        // }

        // return $next($request);
      /*  switch ($guard) {
            case 'admin':
              if (Auth::guard($guard)->check()) {
                return redirect()->route('admin.dashboard');
              }

            default:
              if (Auth::guard($guard)->check()) {
                  return redirect('/');
              }
              break;
          }
          return $next($request);
    }*/
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check() && Auth::user()->hasRole(['admin'])) {
            return redirect()->route('admin');
        } elseif(Auth::guard($guard)->check() && Auth::user()->hasRole(['admin','employee'])){
            return redirect()->route('');
        } else {
            return $next($request);
        }
    }


}
