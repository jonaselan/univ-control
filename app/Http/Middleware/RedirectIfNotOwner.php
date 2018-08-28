<?php

namespace UnivControl\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotOwner
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
        if (Auth::id() != $request->route()->parameters()['id']) {
            flash('You don\'t have access to this page');
            return redirect('/home');
        }

        return $next($request);
    }
}
