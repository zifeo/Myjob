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

/* TODO
Route::get('erreur', function() {
	return 'erreur';
});
Route::get('rss/{rss}', function() {
    return 'rss';
});
*/

// real pages (i.e. no-redirect) should have the reverse bind in config/myjob.php

Route::get(trans('general.routes.disconnect'), 'PublicController@disconnect');

Route::post('bridge', 'AdController@bridge');

Route::group(['middleware' => 'locales'], function () {

	Route::get(trans('general.routes.home'), 'PublicController@index');

	Route::get(trans('general.routes.help'), 'PublicController@help');
	Route::post(trans('general.routes.help'), 'PublicController@send');

	Route::get(trans('general.routes.newjob'), 'AdController@create');
	Route::post(trans('general.routes.newjob'), 'AdController@store');

	Route::get('{email}/{secret}', 'AdController@manage_ads_with_email');

	Route::get(trans('general.routes.search'), 'AdController@search');

	// require at least publisher access	
	Route::group(['middleware' => 'publisher'], function () {

		Route::get(trans('general.routes.myjobs'), 'AdController@created');
		Route::get(trans('general.routes.job') . '/{ad}', 'AdController@show');
		Route::get(trans('general.routes.editjob') . '/{ad}', 'AdController@edit');
		Route::put(trans('general.routes.editjob') . '/{ad}', 'AdController@update');
		Route::get(trans('general.routes.deletejob') . '/{ad}', 'AdController@destroy');

		Route::get(trans('general.routes.enablejob') . '/{ad}', 'ModerationController@enable');
		Route::get(trans('general.routes.disablejob') . '/{ad}', 'ModerationController@disable');

	});

	// require at least tequila access
	Route::group(['middleware' => 'tequila'], function () {

		Route::get(trans('general.routes.jobs'), 'AdController@index');

		Route::get(trans('general.routes.connect'), 'PublicController@connect');
		Route::get(trans('general.routes.connectcreate'), 'PublicController@connectCreate');

		Route::get(trans('general.routes.options'), 'OptionsController@index');
		Route::put(trans('general.routes.options'), 'OptionsController@update');

	});

	// require at least admin access
	Route::group(['middleware' => ['tequila', 'admin']], function () {

		Route::get(trans('general.routes.moderation'), 'ModerationController@adsToModerate');
		Route::get(trans('general.routes.acceptjob') . '/{ad}', 'ModerationController@accept');
		Route::get(trans('general.routes.refusejob') . '/{ad}', 'ModerationController@refuse');

		/*
		Route::get('crons', function() {
			return 'crons';
		});
		*/

	});

});