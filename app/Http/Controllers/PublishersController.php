<?php

namespace Myjob\Http\Controllers;

use Auth;
use Input;
use Myjob\Models\Publisher;
use Session;
use Validator;
use Mail;

class PublishersController extends Controller {

    public function getForgottenLink() {
        return view("publishers.link");
    }

    public function postForgottenLink() {
        $email = Input::get('email');

        if (!Publisher::exists($email)) {
            return back()->withErrors(trans('general.texts.forgotten-link-error', ['email' => $email]));
        } else {
            $secret = Publisher::generate_new_secret($email);

            // TODO test when sending mail work again
            /*Mail::send('emails.publishers', ['email' => $email, 'secret' => $secret], function ($m) use (&$email) {
                $m->to($email)->subject(trans('mails.publishers.link'));
            });*/

            Session::flash('success', trans('general.texts.forgotten-link-success'));
            return redirect()->Action('HomeController@index');
        }
    }

}
