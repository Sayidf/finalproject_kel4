<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
//tambahan
use Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        /* ---------all peran-------
        if(Auth::check() && Auth::user()->role == 'peran' ){
            return $next($request);
        }
        */
        //multiple peran
        if(Auth::check()){
            $roles = explode('-',$role);
            foreach ($roles as $role) {
                if(Auth::user()->role == $role ){
                    return $next($request);
                }
            }
        }

        return redirect('login')->with('error', 'Access Denied');
    }
}
