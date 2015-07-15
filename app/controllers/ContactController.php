<?php

class ContactController extends BaseController {

    /**
    * Displays the Contact Us page
    */
    public function showContactUs() {
        return View::make('contact');
    }
}
