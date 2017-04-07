<?php

namespace CompanyMainPage\Http\Middleware;

use Closure;
use Auth;

class RequireVerifiedEmail
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && !Auth::user()->verified) {
            return redirect(route('email-verification-required'));
        }
        return $next($request);
    }
}
