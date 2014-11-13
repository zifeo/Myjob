<?php

class AdController extends Controller {
	
	public function create() {
		$categories = Category::lists('name', 'category_id');
		return View::make('addAd')->with('categories', $categories);
	}

	public function store() {
		$this->beforeFilter('csrf');

		$categories = Category::lists('name', 'category_id');
		
		$validator = Validator::make(
			Input::all(),
			[
				'title' => 				['required', 'min:5', 'max:50'],
				'place' => 				['required', 'min:5', 'max:15'],
				'category' =>			['required'], // TODO check if in array
				'duration' => 			['required', 'min:5', 'max:100'],
				'start-date' => 		['after:-1 day'],
				'end-date' => 			['after:' . Input::get('start-date')],
				'punctual-date' => 		['after:-1 day'],
				'description' => 		['required', 'min:10', 'max:1500'],
				'skills' => 			['min:5', 'max:100'],
				'language' => 			['min:3', 'max:50'],
				'contact-first-name' => ['required', 'min:2', 'max:30'],
				'contact-last-name' => 	['required', 'min:2', 'max:30'],
				'contact-email' => 		['required', 'email', 'max:75'],
				'contact-phone' => 		['min:4', 'max:20'],
			]
		);

		if($validator->fails()) {
			$notificationData = [
				'header' => 'Validation failed:',
				'body' => 'error lambda',
				'type' => 'danger'
			];


			return Redirect::to('ad/create')->withErrors($validator)->with('type', 'danger');
		} else {
			return 'SUCCESS !';
		}

	}
}