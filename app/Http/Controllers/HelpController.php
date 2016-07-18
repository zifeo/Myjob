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

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $first_name = e(Inputs::get('first_name'));
        $last_name = e(Inputs::get('last_name'));
        $email = e(Inputs::get('email'));
        $message = e(Inputs::get('message'));

        Mail::raw($message, function ($message) use (&$first_name, &$last_name, &$email) {
            $message->from($email, $first_name . ' ' . $last_name);
            $message->to('myjob@epfl.ch')->subject('Myjob contact');
        });

        Log::debug('help mail sent');

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
