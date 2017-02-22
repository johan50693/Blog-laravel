<?php

namespace App\Http\Middleware;

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
        // REDIRECCIÓN CUANDO YA ESTOY LOGUEADO Y INTENTO LOGUEARME NUEVAMENTE
        if (Auth::guard($guard)->check()) {
            return redirect()->route('admin.welcome');
        }

        return $next($request);
    }
}
