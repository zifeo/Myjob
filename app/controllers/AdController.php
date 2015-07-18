<?php

class AdController extends Controller {
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$fields = ['url',
				   'title', 'name_'. $this->get_safe_locale() . ' AS category', 
				   'description',
				   'place',
				   'starts_at'];

		$ads = Ad::get_valid_ads($fields)->get();
		return View::make('ads.list')->with('ads', $ads);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$categories = Category::get_id_name_mapping();
		return View::make('ads.new')->with('categories', $categories)->with('ad', null);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$categories = Category::get_id_name_mapping();
		$fields = $this->validation();
		$validator = Validator::make(Input::all(), $fields);
		$data = array_only(Input::all(), array_keys($fields));
		
		if($validator->fails()) {
			return Redirect::back()->withErrors($validator)->with('type', 'danger');
		} 
		else 
		{
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
			$url = Ad::create($data);

			return Redirect::route('AdController@show', $url);
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
		
		$fields = ['url', 
				   'title', 'name_' . $this->get_safe_locale() . ' AS category', 
				   'description',
				   'salary', 'place', 'skills', 'languages',
				   'contact_first_name', 'contact_last_name', 'contact_email', 'contact_phone',
				   'starts_at', 'ends_at', 'duration',
				   'ads.updated_at'];
		
		$ad = Ad::withCategoriesVisitors()->select($fields)->findOrFail($url);

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
		$ad = Ad::withVisitors()->findorfail($url);

		$categories = Category::get_id_name_mapping();
		return View::make('ads.edit')->with('categories', $categories)->with('ad', $ad);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($url)
	{
		$ad = Ad::withVisitors()->findorfail($url);

		$this->beforeFilter('csrf');
		$categories = Category::get_id_name_mapping();

		$fields = $this->validation();
		$validator = Validator::make(Input::all(), $fields);
		$data = array_only(Input::all(), array_keys($fields));

		if($validator->fails()) {
			return Redirect::back()->withErrors($validator)->with('type', 'danger');
		} 
		else
		{
			$ad->fill($data);
			$ad->save();
			return Redirect::route('AdController@show', $url);
		}
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
			/* Temporarily allow current visitor to edit all ads with email $email. */
			Session::put('connected_visitor', $email);
			return Redirection::action('ads.list');
		}
	}
	
	public function search() {
		
		$raw = trim(Input::get('q'));
		if (empty($raw)) {
			return Redirect::route('AdController@index');
		}
		$terms = explode(' ', $raw);
		
		$fields = ['url', 
				   'title', 'name AS category', 
				   'description',
				   'place',
				   'starts_at'];	
		
		$query = Ad::withCategories()->select($fields)->where('is_validated', '=', 1);
		$searchFields = ['title', 'description', 'place', 'skills', 'languages', 'name'];

	    foreach ($terms as $t) {
	        $query->where(function($query) use (&$t, &$searchFields) {
		        foreach ($searchFields as $f) {
			        $query->Orwhere($f, 'LIKE', '%'.$t.'%');
	        	}
	        });
	    }
		$ads = $query->get();
		
		return View::make('ads.list')->with('ads', $ads)->with('searchTerms', $raw);
	}

	private function validation() {
		
		$categories = Category::get_id_name_mapping();
		return [
			'title' => 				['required', 'min:5', 'max:50'],
			'place' => 				['min:3', 'max:15'],
			'category_id' =>		['required', 'in:'.implode(',', array_keys($categories))],
			'duration' => 			['min:2', 'max:100'],
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
		];
	}

	private function check_visitor_connected($email) {
		if (! Session::has('connected_visitor') || Session::get('connected_visitor') != $email) {
			App::abort(404);
		}
	}
	
	private function get_safe_locale() {
		$locale = App::getLocale();

		if (! in_array($locale, ['en', 'fr'])) {
			// Unsupported locale
			App::abort(403);
		}

		return $locale;
	}
}
