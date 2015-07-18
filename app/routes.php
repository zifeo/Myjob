<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Tequila filter
|--------------------------------------------------------------------------
|
| Check if the user is connected through Tequila.
|
*/

// PATTERNS

/* Very simple email regexp, might catch too much things but it's not
a problem, since it's only used to route to the right controller. The 
controller can do further checks if needed. */

Route::pattern('ad', '[a-z0-9-]+');
Route::pattern('rss', '[a-zA-Z0-9-]+');
Route::pattern('email', '.+@.+\..+');
Route::pattern('secret', '[a-zA-Z0-9]{32}');

// CSRF

Route::when('*', 'csrf', ['post', 'put', 'patch', 'delete']);

// PUBLIC

Route::get('/', 'PublicController@index');
Route::get('help', 'PublicController@help');

/*Route::get('erreur', function() {
	return 'erreur';
});
Route::get('rss/{rss}', function() {
    return 'rss';
});*/

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

Route::group(['before' => 'publisher'], function() {
	
	Route::resource('ad', 'AdController', ['except' => ['create', 'store']]);
	
	Route::post('search', ['as' => 'ad.search', 'uses' => 'AdController@search']);
	
});

Route::group(['before' => 'tequila'], function() {
	
	Route::get('signin', function() {
		return Redirect::route('AdController@index');
	});
	
	Route::get('signout', function() {
		Auth::logout();
		return Redirect::to('/');
	});
	
});

Route::group(['before' => 'tequila|admin'], function() {

	Route::get('moderation', 'ModerationController@adsToModerate');
	
	Route::post('moderation', 'ModerationController@validate');
	
	/*Route::get('crons', function() {
		return 'crons';
	});*/

});