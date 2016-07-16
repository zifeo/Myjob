<?php

namespace Myjob\Http\Controllers;

use Auth;
use Input;
use Myjob\Models\FAQ;
use Myjob\Models\Publisher;
use Myjob\Models\User;
use Session;
use Validator;

class HomeController extends Controller {

    const OLD_ADS_MYJOB_1 = 3528;

    public function index() {

        if (Auth::check())
            return redirect()->action('AdController@index');

        $publishers = Publisher::withTrashed()->count() + self::OLD_ADS_MYJOB_1;
        $students = User::withTrashed()->count();

        return view('home.index', ['publishers' => $publishers, 'students' => $students]);
    }

    public function connect() {
        return redirect()->action('AdController@index');
    }

    public function disconnect() {
        Controller::disconnect();
        return redirect()->action('HomeController@index');
    }

}
