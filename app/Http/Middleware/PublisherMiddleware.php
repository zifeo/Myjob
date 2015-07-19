<?php

namespace Myjob\Http\Middleware;

use Closure;
use Auth, Session, App;

class PublisherMiddleware
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
        if (Auth::guest() && 
        	(!Session::has('connected_visitor') || Session::get('connected_visitor') != Input::get('email'))) {
	        	
			App::abort(404);
		}
	    
        return $next($request);
    }
}
