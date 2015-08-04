<?php

namespace Myjob\Http\Middleware;

use Myjob\Agepinfo\Tequila;
use Closure, Auth, Session;

class TequilaAuth
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
		    Session::flash('intended', $request->path());
	    	return Tequila::auth();
		}
		
        return $next($request);
    }
}
