<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class isStaffUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::guard('user')->check()){
            return redirect('/');
        }
        else{
            if(Auth::guard('user')->user()->level != "1"){
                return redirect('/');
            }
        }
        return $next($request);
    }
}
