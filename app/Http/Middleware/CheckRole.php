<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if($request->user == auth()->guard('user')->user()){
            return $next($request);
        } else {
            if($request->bpw == auth()->guard('bpw')->user()){
                return $next($request);
            }
        }
        return redirect('/');
    }
}
