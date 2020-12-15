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
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $roles = auth()->user()->getRoleNames();

            // Check user role
            switch ($roles[0]) {
                case 'admin':
                        return redirect()->route('dashboard');
                    break;
                default:
                    return redirect()->route('homepage');
            }
            // return redirect(RouteServiceProvider::HOME);
        }

        return $next($request);
    }
}
