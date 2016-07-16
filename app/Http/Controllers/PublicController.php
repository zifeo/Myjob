<?php

namespace Myjob\Http\Controllers;

use Auth;
use Input;
use Myjob\Models\FAQ;
use Myjob\Models\Publisher;
use Myjob\Models\User;
use Session;
use Validator;

class PublicController extends Controller {

	const OLD_ADS_MYJOB_1 = 3528;

	public function index() {

		if (Auth::check())
			return redirect()->action('AdController@index');

		$publishers = Publisher::withTrashed()->count() + self::OLD_ADS_MYJOB_1;
		$students = User::withTrashed()->count();

		return view('general.home', ['publishers' => $publishers, 'students' => $students]);
	}

	public function help() {

		$faq_items = FAQ::all();
		return view('general.help', ['faq_items' => $faq_items]);
	}

	public function send() {

		$validator = Validator::make(Input::all(), $this->contactValidation());
		$validator->setAttributeNames(array_map('strtolower', trans('contacts.placeholders')));

		if ($validator->fails())
			return back()->withInput()->withErrors($validator);

		return redirect()->action('PublicController@help')->with('success', trans('general.successes.sent'));

	}

	public function connect() {
		return redirect()->action('AdController@index');
	}

	public function connectCreate() {
		return redirect()->action('AdController@create');
	} // FIXME

	public function disconnect() {
		if (Auth::check())
			Auth::logout();
		Session::flush();
		return redirect()->action('PublicController@index');
	}

	private function contactValidation() {

		$filters = parent::validation('contact');

		$filters['email'][] = 'email';

		$filters = array_map(function ($f) {
			return implode('|', $f);
		}, $filters);

		return $filters;

	}

}