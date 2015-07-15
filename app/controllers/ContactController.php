<?php

class ContactController extends BaseController {

    /**
    * Displays the Contact Us page
    */
    public function showContactUs() {
        $faq_items = FAQ::all();

        return View::make('contact')->with('faq_items', $faq_items);
    }
}
