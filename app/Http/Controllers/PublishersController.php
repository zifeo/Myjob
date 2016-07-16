<?php

namespace Myjob\Http\Controllers;

use Auth;
use Input;
use Myjob\Models\Publisher;
use Session;
use Validator;

class PublishersController extends Controller {

    public function getForgottenLink() {
        return view("publishers.link");
    }

    public function postForgottenLink() {
        $email = Input::get('email');

        if (!Publisher::exists($email)) {
            return back()->withErrors(trans('general.texts.forgotten-link-error', ['email' => $email]));
        } else {
            Publisher::generate_new_secret($email);
            //TODO send mail with secret
            Session::flash('success', trans('general.texts.forgotten-link-success'));
            return redirect()->Action('HomeController@index');
        }
    }

}
