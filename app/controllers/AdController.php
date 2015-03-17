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
			$ad = Ad::findorfail($url);
			$ad->fill($data);
			$ad->save();
			return Redirect::to('ad/' . $url);
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
