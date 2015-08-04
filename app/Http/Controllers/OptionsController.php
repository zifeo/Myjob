<?php

namespace Myjob\Http\Controllers;

use Myjob\Models\FAQ;

class OptionsController extends Controller {
	
	public function index() {
		
        return view('ads.options', []);
    }


}