<?php

namespace Myjob\Http\Controllers;

use Auth;
use Input;
use Myjob\Models\FAQ;
use Session;
use Validator;

class HelpController extends Controller {

    public function index() {
        $faq_items = FAQ::all();
        return view('help.index', ['faq_items' => $faq_items]);
    }

    public function send() {

        $validator = Validator::make(Input::all(), $this->contactValidation());
        $validator->setAttributeNames(array_map('strtolower', trans('contacts.placeholders')));

        if ($validator->fails())
            return back()->withInput()->withErrors($validator);

        return redirect()->action('HelpController@index')->with('success', trans('general.successes.sent'));
    }

    private function contactValidation() {

        $filters = parent::validation('contact');

        $filters['email'][] = 'email';

        $filters = array_map(function ($f) {
            return implode('|', $f);
        }, $filters);

        return $filters;
    }

}
