<?php

return [

	'name' =>					'Myjob',
	'ads' => [
		'validityWeeks' 		=> 2,
		'numberDisplay' 		=> 10,
		'numberDisplaySearch' 	=> 24,
	],
	'providers' => [
		'secretValidityWeeks' 	=> 2,
	],
	'routes' => [
		'home'	 				=> 'PublicController@index',
		'jobs' 					=> 'AdController@index',
		'myjobs' 				=> 'AdController@created',
		'newjob' 				=> 'AdController@create',
		'moderation' 			=> 'ModerationController@adsToModerate',
		'options' 				=> 'OptionsController@index',
		'help' 					=> 'PublicController@help',
		'connect' 				=> 'PublicController@connect',
		'disconnect' 			=> 'PublicController@disconnect',
	],
	
];