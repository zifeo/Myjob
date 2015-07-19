<?php

namespace Myjob\Http\Middleware;

use Closure;
use Auth;
use Myjob\Agepinfo\Tequila;

class TequilaMiddleware
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
	    if (Auth::guest()) {
	    	return Tequila::auth();
		}
		
        return $next($request);
    }
}
