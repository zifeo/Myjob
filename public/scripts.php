<?php

//header('Content-type: text/javascript'); 

if (preg_match('/(?i)msie [6-8]\./', $_SERVER['HTTP_USER_AGENT']))
	readfile('../resources/assets/javascripts/html5shiv.min.js');

if (strlen($_GET['lang']) == 2)
	echo 'var locale = "', $_GET['lang'], '";';
	
readfile('../resources/assets/javascripts/jquery.min.js');
readfile('../resources/assets/javascripts/semantic.min.js');
readfile('../resources/assets/javascripts/moment-with-locales.min.js');
readfile('../resources/assets/javascripts/picker.js');
readfile('../resources/assets/javascripts/picker.date.js');
readfile('../resources/assets/javascripts/main.js');