<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if ($guard == 'teacher')
                    return redirect()->intended(config('app.frontend_url').RouteServiceProvider::TEACHER_HOME);
                if ($guard == 'admin')
                    return redirect()->intended(config('app.frontend_url').RouteServiceProvider::ADMIN_HOME);
                return redirect()->intended(config('app.frontend_url').RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
