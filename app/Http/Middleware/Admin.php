<?php

namespace App\Http\Middleware;

use Closure;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if( auth()->check()){
            if(auth()->user()->role_id == 1 OR auth()->user()->is_admin == 1){
                return $next($request);
            }else{
                return abort('403');
            }
        
        }else{
            return redirect()->route('login');
        }
    }
}
