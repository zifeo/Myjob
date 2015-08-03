<?php

header('Content-type: text/javascript'); 

if (! isset($_GET['lang']) || strlen($_GET['lang']) != 2)
	return;

if (preg_match('/(?i)msie [6-8]\./', $_SERVER['HTTP_USER_AGENT']))
	readfile('../resources/assets/javascripts/html5shiv.min.js');
	
readfile('../resources/assets/javascripts/jquery.min.js');
readfile('../resources/assets/javascripts/semantic.min.js');
readfile('../resources/assets/javascripts/moment-with-locales.min.js');
readfile('../resources/assets/javascripts/picker.js');
readfile('../resources/assets/javascripts/picker.date.js');

switch (strtolower($_GET['lang'])) {
	case 'fr': readfile('../resources/lang/javascripts/fr.js'); break;
	case 'en': readfile('../resources/lang/javascripts/en.js'); break;
}

readfile('../resources/assets/javascripts/main.js');