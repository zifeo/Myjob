<?php

namespace Myjob\Http\Controllers;

use View;

class PublicController extends Controller {

	public function index() {
		
		return View::make('home');
	}
	
	public function help() {
        $faq_items = FAQ::all();

        return View::make('help')->with('faq_items', $faq_items);
    }

}