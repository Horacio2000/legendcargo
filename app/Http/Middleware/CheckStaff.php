<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckStaff {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (!empty(Auth::user())) {
            if (Auth::user()->role === "Staff") {
                return $next($request);
            } else {
                Auth::logout();
                return redirect()->intended('staff')->with('error', "Vous n'êtes pas autorisé à visiter cette page...");
            }
        } else {
            Auth::logout();
            return redirect()->intended('staff')->with('error', "Vous n'êtes pas autorisé à visiter cette page...");
        }
    }

}
