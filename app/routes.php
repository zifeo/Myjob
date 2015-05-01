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

// PUBLIC

Route::get('/', 'AdController@index');
Route::resource('ad', 'AdController');

Route::get('test', ['before' => 'tequila', 'uses' => 'AdController@index']);

/* TODO	
Route::get('rss/{rss}', function() {

	// validation de la key user
    return 'rss';
});

Route::get('deconnexion', function() {
	Auth::logout();
	Session::forget('tequila');
	return Redirect::to('/');
});

Route::get('erreur', function() {
	return 'erreur';
});
*/

// RANDOM_SECRET NEEDED

Route::get('ad/{email}/{secret}', 'AdController@manage_ads_with_email');

// TEQUILA NEEDED

Route::group(array('before' => 'tequila'), function() {

	Route::get('jobs', function() {
	
		// affichage des messages de succès/erreurs
		// affiche de la validation et option si les droits existes
		// affichage je propose un job
		return 'listes';
	});
	
	Route::get('job/{ad}', function() {
		// affichage edition
		// postulation
	    return 'job 1';
	});
	
	Route::post('job/{ad}', array('before' => 'csrf', function() {
	    return 'job@postulation';
	}));
	
	Route::get('alertes', function() {
	    return 'alertes';
	});
	
	Route::post('alertes', array('before' => 'csrf', function() {
	    return 'alertes@post';
	}));

});

// TEQUILA NEEDED + MODERATION RIGHTS

Route::group(array('before' => 'tequila|admin'), function() {

	Route::get('job/edition/{ad}', function() {
		return 'job edition';
	});
	
	Route::post('job/edition/{ad}', array('before' => 'csrf', function() {
		return 'job edition@post';
	}));

	Route::get('moderation', 'ModerationController@adsToModerate');
	
	Route::post('moderation', 'ModerationController@validate');
	
	Route::post('search', ['as' => 'ad.search', 'uses' => 'AdController@search']);
	
	Route::get('options', function() {
	    return 'options';
	});
	
	Route::post('options', array('before' => 'csrf', function() {
	    return 'options@post';
	}));

});

// PRIVATE CRONS

Route::get('crons', function() {
	return 'crons';
});