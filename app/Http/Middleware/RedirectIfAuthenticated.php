<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    private const GUARD_USER = 'users';
    private const GUARD_OWNER = 'owners';
    private const GUARD_ADMIN = 'admin';
    private const GUARD_MYDATA = 'mydatas';
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if (Auth::guard(self::GUARD_USER)->check() && $request->routeIs('user.*')) {
            return redirect(RouteServiceProvider::HOME);
        }

        if (Auth::guard(self::GUARD_OWNER)->check() && $request->routeIs('owner.*')) {
            return redirect(RouteServiceProvider::OWNER_HOME);
        }

        if (Auth::guard(self::GUARD_ADMIN)->check() && $request->routeIs('admin.*')) {
            return redirect(RouteServiceProvider::ADMIN_HOME);
        }

        if (Auth::guard(self::GUARD_MYDATA)->check() && $request->routeIs('mydata.*')) {
            return redirect(RouteServiceProvider::MYDATA_HOME);
        }

        return $next($request);
    }
}