<?php

class HomeController extends BaseController {

	/**
	 * Change the language of MyJob
	 */
	public function changeLanguage()
	{
		$rules = [
			'language' => 'in:en,fr'
		];

		$language = Input::get('language');

		$validator = Validator::make(['language' => $language], $rules);

		if ($validator->passes()) {
			Session::put('language', $language);
			App::setLocale($language);
			return Redirect::back();
		} else {
			App::abort(403);
		}
	}
}
