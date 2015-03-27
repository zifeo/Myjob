<?php

class AdController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$ads = Ad::where('is_validated', '=', 1)->get();
		return View::make('ads.list')->with('ads', $ads);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$categories = Category::lists('name', 'category_id');
		return View::make('ads.form')->with('categories', $categories)->with('ad', null);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$this->beforeFilter('csrf');

		$categories = Category::lists('name', 'category_id');

		$validator = Validator::make(
			Input::all(),
			[
				'title' => 				['required', 'min:5', 'max:50'],
				'place' => 				['min:5', 'max:15'],
				'category_id' =>		['required', 'in:'.implode(',', array_keys($categories))],
				'duration' => 			['min:5', 'max:100'],
				'starts_at' => 			['after:-1 day'],
				'ends_at' => 			['after:' . Input::get('starts_at')],
				'punctual_date' => 		['after:-1 day'],
				'description' => 		['required', 'min:10', 'max:1500'],
				'skills' => 			['min:5', 'max:100'],
				'languages' => 			['min:3', 'max:50'],
				'contact_first_name' => ['required', 'min:2', 'max:50'],
				'contact_last_name' => 	['required', 'min:2', 'max:50'],
				'contact_email' => 		['required', 'email', 'max:75'],
				'contact_phone' => 		['min:4', 'max:20'],
			]
		);

		if($validator->fails()) {
			return Redirect::back()->withErrors($validator)->with('type', 'danger');
		} else {

			/* If this is the first ad with that email, 
			or last secret is outdated, create new entry 
			in contact_emails */

			$email = Input::get('contact_email');

			if (empty(ContactEmail::get_valid_secrets($email))) {
				$contact_email = new ContactEmail;

				$contact_email->contact_email = $email;
				$contact_email->random_secret = str_random(32);

				$contact_email->save();

				// TODO send email with code
			}

			/* Create the ad in the DB */
			$url = Ad::create(Input::all());

			return Redirect::to('ad/' . $url);
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($url)
	{
		$ad = Ad::findorfail($url);
		return View::make('ads.show')->with('ad', $ad);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($url)
	{
		$ad = Ad::findorfail($url);
		$categories = Category::lists('name', 'category_id');
		return View::make('ads.form')->with('categories', $categories)->with('ad', $ad);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	/**
	* Displays the ads created by the person with 
	* the @param $email email
	*/
	public function manage_ads_with_email($email, $secret)
	{
		if (ContactEmail::is_outdated($secret, $email))
		{
			// TODO Lien dans le message
			$message = 'Ce lien a plus de ' . ContactEmail::n_weeks_valid_secret .
			' semaines et n\'est plus valide. Vous pouvez en générer un nouveau ici: [Lien]';
			return Redirect::to('/')->withErrors(array('message' => $message))->with('type', 'warning');
		} 
		elseif (! ContactEmail::is_valid($secret, $email))
		{
			App::abort(404);
		}
		else
		{
			// TODO Durable connection

			$ads = Ad::where('contact_email', '=', $email)->get();
			return View::make('ads.list')->with('ads', $ads);
		}
	}

}
