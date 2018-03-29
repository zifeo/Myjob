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

ini_set('display_errors',true);

// Bridge between Myjob 2.0 and 1.0

Route::post('bridge', 'AdController@bridge');

// Important: real pages (i.e. no-redirect) should have the reverse bind in config/myjob.php

Route::get('disconnect', 'HomeController@disconnect');

Route::group(['middleware' => 'locales'], function () {

	Route::get('/', 'HomeController@index');

	Route::get('help', 'HelpController@index');
	Route::post('help', 'HelpController@send');

	Route::get('new-job', 'AdController@create');
	Route::post('new-job', 'AdController@store');

	Route::get('search', 'AdController@search');

	Route::get('forgotten-link', 'PublishersController@getForgottenLink');
	Route::post('forgotten-link', 'PublishersController@postForgottenLink');

	Route::get('{email}/{secret}', 'AdController@manage_ads_with_email');

	// require at least publisher access
	Route::group(['middleware' => 'publisher'], function () {

		Route::get('my-jobs', 'AdController@created');
		Route::get('job' . '/{ad}', 'AdController@show');
		Route::get('edit-job' . '/{ad}', 'AdController@edit');
		Route::put('edit-job' . '/{ad}', 'AdController@update');
		Route::get('delete-job' . '/{ad}', 'AdController@destroy');

		Route::get('enable-job' . '/{ad}', 'ModerationController@enable');
		Route::get('disable-job' . '/{ad}', 'ModerationController@disable');

	});

	// require at least tequila access
	Route::group(['middleware' => 'tequila'], function () {

		Route::get('jobs', 'AdController@index');

		Route::get('connect', 'HomeController@connect');

		Route::get('options', 'OptionsController@index');
		Route::put('options', 'OptionsController@update');

	});

	// require at least admin access
	Route::group(['middleware' => ['tequila', 'admin']], function () {

		Route::get('moderation', 'ModerationController@adsToModerate');
		Route::get('accept-job/{ad}', 'ModerationController@accept');
		Route::get('refuse-job/{ad}', 'ModerationController@refuse');

	});

});
