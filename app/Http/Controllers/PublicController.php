<?php

namespace Myjob\Http\Controllers;

use View;

class PublicController extends Controller {

	public function index() {
		
		return View::make('home');
	}
	
	public function Oldhelp() {
				
		return View::make('help');
	}

}