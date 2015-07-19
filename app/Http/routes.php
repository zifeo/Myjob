<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


// PUBLIC

Route::get('/', 'PublicController@index');
Route::get('help', 'PublicController@help');

/* TODO
Route::get('erreur', function() {
	return 'erreur';
});
Route::get('rss/{rss}', function() {
    return 'rss';
});
*/

Route::get('help', 'HelpController@showHelp');

Route::post('language/set', 'HomeController@changeLanguage');

// RANDOM_SECRET NEEDED

Route::get('{email}/{secret}', 'AdController@manage_ads_with_email');

Route::get('ad/create', 	'AdController@create');
Route::post('ad/store', 	'AdController@store');

Route::get('debug', function() {
	Auth::logout();
	Session::flush();
	return Redirect::to('/');
});

Route::group(['middleware' => 'publisher'], function() {
	
	Route::resource('ad', 'AdController', ['except' => ['create', 'store']]);
	
	Route::post('search', ['as' => 'ad.search', 'uses' => 'AdController@search']);
	
});

Route::group(['middleware' => 'tequila'], function() {
	
	Route::get('signin', function() {
		return Redirect::route('AdController@index');
	});
	
	Route::get('signout', function() {
		Auth::logout();
		Session::flush();
		return Redirect::to('/');
	});
	
});

Route::group(['middleware' => ['tequila', 'admin']], function() {

	Route::get('moderation', 'ModerationController@adsToModerate');
	
	Route::post('moderation', 'ModerationController@validateAd');
	
	/*
	Route::get('crons', function() {
		return 'crons';
	});
	*/

});