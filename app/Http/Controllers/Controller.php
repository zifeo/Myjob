<?php

namespace Myjob\Http\Controllers;

use Auth;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Route;
use Session;
use View;

abstract class Controller extends BaseController {
	use DispatchesJobs, ValidatesRequests;

	public function __construct() {

		$auth = Auth::check();
		View::share('auth', $auth);

		$publisher = Session::has('connected_visitor');
		View::share('publisher', $publisher);

		if ($currentRoute = Route::getCurrentRoute()) {
			$route = explode('\\', $currentRoute->getActionName());
			$action = end($route);
			$config = config('myjob.routes');
			$routeName = array_search($action, $config);
			if (empty($routeName)) {
				$controller = strstr($action, '@', true);
				$closest = array_first($config, function ($key, $value) use ($controller) {
					return strstr($value, '@', true) == $controller;
				});
				$routeName = array_search($closest, $config);
			}

			$title = trans('general.nav.' . $routeName);
			View::share('action', $action);
			View::share('title', $title);
		}

		$admin = false;
		if ($auth) {
			$user = Auth::user();
			$admin = $user->admin == 1;
			View::share('user', strtok($user->first_name, ' '));
			View::share('user_last', $user->last_name);
			View::share('user_email', $user->email);
		} elseif ($publisher) {
			View::share('user', Session::get('connected_visitor'));
		}
		View::share('admin', $admin);

	}

	protected function disconnect() {
		if (Auth::check())
			Auth::logout();
		Session::flush();
	}

	protected function validation($item) {

		$config = config('data.' . $item);
		$fields = array_keys($config);

		$filters = array_combine($fields, array_map(function ($field) use ($config) {
			$f = [];

			if (isset($config[$field]['required']))
				$f[] = 'required';
			if (isset($config[$field]['email']))
				$f[] = 'email';
			if (isset($config[$field]['min']))
				$f[] = 'min:' . $config[$field]['min'];
			if (isset($config[$field]['max']))
				$f[] = 'max:' . $config[$field]['max'];

			return $f;
		}, $fields));

		return $filters;
	}
}
