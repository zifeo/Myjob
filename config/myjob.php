<?php

return [

	'name'      => 'Myjob',
	'ads'       => [
		'validityWeeks'       => 2,
		'numberDisplay'       => 10,
		'numberDisplaySearch' => 24,
	],
	'routes'    => [ // should contains the same real pages as routes.php (i.e. no-redirect)
		'home'       => 'HomeController@index',
		'jobs'       => 'AdController@index',
		'myjobs'     => 'AdController@created',
		'newjob'     => 'AdController@create',
		'editjob'    => 'AdController@edit',
		'moderation' => 'ModerationController@adsToModerate',
		'options'    => 'OptionsController@index',
		'help'       => 'HelpController@index',
		'connect'    => 'HomeController@connect',
		'disconnect' => 'HomeController@disconnect',
	],

];
