<?php

namespace Myjob\Http\Middleware;

use App;
use Auth;
use Closure;

class AdminAuth {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \Closure $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {

		if (Auth::guest() || Auth::user()->admin != 1) {
			App::abort(404);
		}

		return $next($request);
	}
}
