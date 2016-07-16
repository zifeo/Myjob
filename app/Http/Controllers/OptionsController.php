<?php

namespace Myjob\Http\Controllers;

use Auth;
use Input;

class OptionsController extends Controller {

	public function index() {

		$user = Auth::user();

		return view('options.index', ['options' => $user]);
	}

	public function update() {

		$values = [
			'notifications_instant' => Input::has('notifications_instant') ? 1: 0,
			'notifications_day'     => Input::has('notifications_day') ? 1: 0,
			'notifications_week'    => Input::has('notifications_week') ? 1: 0,
		];

		$user = Auth::user();
		$user->fill($values);
		$user->save();

		return redirect()->action('OptionsController@index')->with('success', trans('general.successes.options'));
	}

}