<?php

class PublicController extends Controller {

	public function index() {
				
		return View::make('home');
	}
	
	public function help() {
		
		return View::make('help');
	}

}