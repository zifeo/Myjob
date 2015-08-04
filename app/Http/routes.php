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

Route::get('disconnect',			'PublicController@disconnect');

Route::group(['middleware' => 'locales'], function() {

	Route::get('/', 				'PublicController@index');
	Route::get('help', 				'PublicController@help');

	Route::get('ad/create', 		'AdController@create');
	Route::post('ad', 				'AdController@store');
	Route::get('{email}/{secret}', 	'AdController@manage_ads_with_email');
	
	Route::post('search',			'AdController@search');		
	
	// require at least publisher access	
	Route::group(['middleware' => 'publisher'], function() {
			
		Route::get('ad', 			'AdController@index');
		Route::get('ad/{ad}', 		'AdController@show');
		Route::get('edit/{ad}', 	'AdController@edit');
		Route::put('ad/{ad}', 		'AdController@update');
		Route::get('delete/{ad}', 	'AdController@destroy');
		
		Route::get('enable/{ad}', 	'ModerationController@enable');
		Route::get('disable/{ad}', 	'ModerationController@disable');
		
	});
	
	// require at least tequila access
	Route::group(['middleware' => 'tequila'], function() {
		
		Route::get('connect', 		'PublicController@connect');		
		Route::get('options', 		'OptionsController@index');

	});
	
	// require at least admin access
	Route::group(['middleware' => ['tequila', 'admin']], function() {
	
		Route::get('moderation', 	'ModerationController@adsToModerate');
		Route::get('accept/{ad}', 	'ModerationController@accept');
		Route::get('refuse/{ad}', 	'ModerationController@refuse');
		
		/*
		Route::get('crons', function() {
			return 'crons';
		});
		*/
	
	});
	
});