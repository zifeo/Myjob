<?php

class AdController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		$fields = ['url', 
				   'title', 'name AS category', 
				   'description',
				   'place',
				   'starts_at'];
		
		$ads = Ad::withCategories()->select($fields)->where('is_validated', '=', 1)->get();
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
		return View::make('ads.new')->with('categories', $categories)->with('ad', null);
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

		$fields = $this->validation();
		$validator = Validator::make(Input::all(), $fields);
		$data = array_only(Input::all(), array_keys($fields));
		
		if($validator->fails()) {
			return Redirect::back()->withErrors($validator)->with('type', 'danger');
		} else {
			//Handle category id
			$url = Ad::create($data);
			return Redirect::route('ad', $url);
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
				   'title', 'name AS category', 
				   'description',
				   'salary', 'place', 'skills', 'languages',
				   'contact_first_name', 'contact_last_name', 'contact_email', 'contact_phone',
				   'starts_at', 'ends_at', 'duration',
				   'ads.updated_at'];
		
		$ad = Ad::withCategories()->select($fields)->findOrFail($url);

		return View::make('ads.show')->with('ad', $ad);
	}
	
	private function parseDate($ad, $field) {
		$ad->{$field} = new DateTime($ad->{$field});
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
		$this->beforeFilter('csrf');
		$categories = Category::lists('name', 'category_id');

		$fields = $this->validation();
		$validator = Validator::make(Input::all(), $fields);
		$data = array_only(Input::all(), array_keys($fields));

		if($validator->fails()) {
			return Redirect::back()->withErrors($validator)->with('type', 'danger');
		} else {
			//Handle category id
			$ad = Ad::findOrFail($url);
			$ad->fill($data);
			$ad->save();
			return Redirect::route('ad', $url);
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

	private function validation() {
		
		$categories = Category::lists('name', 'category_id');
		return [
			'title' => 				['required', 'min:5', 'max:50'],
			'place' => 				['required', 'min:5', 'max:15'],
			'category_id' =>		['required', 'in:'.implode(',', array_keys($categories))],
			'duration' => 			['required', 'min:5', 'max:100'],
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
	
}
