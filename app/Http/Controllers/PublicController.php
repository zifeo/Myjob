<?php

namespace Myjob\Http\Controllers;

use Myjob\Models\FAQ;
use View, Session, Auth;

class PublicController extends Controller {

	public function index() {
		
		return View::make('home');
	}
	
	public function help() {
        $faq_items = FAQ::all();

        return View::make('help')->with('faq_items', $faq_items);
    }

	public function connect() {
		return redirect()->action('AdController@index');
	}
	
	public function disconnect() {
		Auth::logout();
		Session::flush();
		return redirect()->action('PublicController@index');
	}

}