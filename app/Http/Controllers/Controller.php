<?php

namespace Myjob\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Auth, View, Route;

abstract class Controller extends BaseController
{
    use DispatchesJobs, ValidatesRequests;
        
    public function __construct() {
	    
	    $auth = Auth::check();
	    View::share('auth', $auth);
	    
	    $action = explode('\\', Route::getCurrentRoute()->getActionName());
	    View::share('action', end($action));
	    
	    if ($auth) {
		    $user = Auth::user();
		    View::share('admin', $user->admin == 1);
		    View::share('user', strtok($user->first_name, ' '));
	    }
	    	    
    }
}
