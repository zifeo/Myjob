<?php

namespace Myjob\Http\Controllers;

use Myjob\Models\FAQ;
use Session, Auth;

class PublicController extends Controller {

	public function index() {
		
		return view('general.home');
	}
	
	public function help() {
        $faq_items = FAQ::all();

        return view('general.help', ['faq_items' => $faq_items]);
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