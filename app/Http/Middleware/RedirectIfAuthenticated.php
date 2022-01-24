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
        if (Auth::guard($guard)->check()) {
            $user = Auth::user();
            if ($user->isAdmin()) {
                return redirect()->route('admin.home');
            }
            if (!$user->userIsApproved()) {
                return redirect()->route('dealer.completeprofile');
            }
            if (!$user->isAdmin() && $user->userIsApproved()) {
                return redirect()->route('dealer.dashboard');
            }
            return redirect('/');
        }

        return $next($request);
    }
}
