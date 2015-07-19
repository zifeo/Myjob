<?php

namespace Myjob\Http\Controllers;

use Myjob\Models\FAQ;
use View;

class HelpController extends Controller {

    /**
    * Displays the help page
    */
    public function showHelp() {
        $faq_items = FAQ::all();

        return View::make('help')->with('faq_items', $faq_items);
    }
}
