<?php

namespace App\Http\Middleware;

use Closure;

class Laboratorist
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
        if(Auth()->check()){

            if(Auth()->user()->role == 3 || Auth()->user()->role == 1){

                return $next($request);
            }
            else{
                abort(403,'Sorry You Donot Have Permission To Preform This Action.!'); 
            }

        
        }
    }
}
