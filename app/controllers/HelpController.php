<?php

class HelpController extends BaseController {

    /**
    * Displays the help page
    */
    public function showHelp() {
        $faq_items = FAQ::all();

        return View::make('help')->with('faq_items', $faq_items);
    }
}
