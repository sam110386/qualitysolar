<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsApproved
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->user()->userIsApproved()) {
            return redirect()->route('dealer.profile');
        }
        return $next($request);
    }
}
