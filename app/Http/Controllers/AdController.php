<?php

namespace Myjob\Http\Controllers;

use Myjob\Models\Category;
use Myjob\Models\Ad;
use Myjob\Models\Provider;
use View, App, Input, Validator, Redirect;

class AdController extends Controller {
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$fields = ['url',
				   'title', 'name_'. App::getLocale() . ' AS category', 
				   'description',
				   'place',
				   'ads.updated_at'];

		$ads = Ad::acceptedAd($fields)->get();
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
		
		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator)->with('type', 'danger');
		} else {
			/* If this is the first ad with that email, 
			or last secret is outdated, create new entry 
			in contact_emails */

			$email = Input::get('contact_email');

			if (empty(Provider::get_valid_secrets($email))) {
				$contact_email = new Provider;

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
				   'title', 'name_' . App::getLocale() . ' AS category', 'place', 'description',
				   'starts_at', 'ends_at', 'duration', 'salary', 'skills', 'languages',
				   'contact_first_name', 'contact_last_name', 'contact_email', 'contact_phone',
				   'validated', 'expires_at', 'ads.updated_at'];
		
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
		$categories = Category::get_id_name_mapping();
		$validator = Validator::make(Input::all(), $this->validation());

		if ($validator->fails())
			return back()->withErrors($validator)->with('type', 'danger');
		else {
			$ad->fill(Input::all());
			$ad->save();
			return redirect()->action('AdController@show', $url);
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($url)
	{
		$ad = Ad::withVisitors()->findorfail($url);
		$ad->delete();
		return redirect()->action('AdController@index');
	}

	/**
	* Displays the ads created by the person with 
	* the @param $email email
	*/
	public function manage_ads_with_email($email, $secret)
	{
		if (Provider::is_outdated($secret, $email))
		{
			// TODO Lien dans le message
			$message = 'Ce lien a plus de ' . config('myjob.providers.secretValidityWeeks') .
			' semaines et n\'est plus valide. Vous pouvez en générer un nouveau ici: [Lien]';
			return Redirect::to('/')->withErrors(array('message' => $message))->with('type', 'warning');
			
		} elseif (! Provider::is_valid($secret, $email)) {
			
			App::abort(404);
			
		} else {
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

		$config = config('data.ad');
		$fields = array_keys($config);
		
		$filters = array_combine($fields, array_map(function($field) use ($config) {
			$f = [];
			
			if (isset($config[$field]['required']))
				$f[] = 'required';
			if (isset($config[$field]['email']))
				$filters[] = 'email';
				
			if (isset($config[$field]['min']))
				$f[] = 'min:' . $config[$field]['min'];
			if (isset($config[$field]['max']))
				$f[] = 'max:' . $config[$field]['max'];
				
			return $f;
		}, $fields));
		
		$filters['category_id'][] 	= 'in:' . implode(',', Category::get_id_name_mapping()->keys()->all());
		$filters['starts_at'][] 	= 'after:-1 day';
		$filters['ends_at'][] 		= 'after:' . Input::get('starts_at');
					
		return $fields;
	}
	
}
