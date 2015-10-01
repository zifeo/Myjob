<?php

return [

//==========================================================================
//! Tequila authentification server config file for laravel
//  Based on https://tequila.epfl.ch/download/2.0/docs/writing-clients.pdf
//==========================================================================

	// tequila server url without the ending "/"
	'host'    => 'https://tequila.epfl.ch',

	// service name that will show up on Tequila auth panel
	'service' => 'Myjob',

	// user information requested no space, separated by ","
	'request' => 'uniqueid,name,firstname,email',

	// user must be part (ex: group=somegroup)
	'require' => '',

	// allows specific users (ex : category=guest)
	'allows'  => '',

];