<?php

namespace UnivControl\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfApproved
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
        // enquanto o usuário não for aprovado
        if (Auth::user() && Auth::user()->status != "Approved") {
            return redirect('/block');
        }

        return $next($request);
    }
}
