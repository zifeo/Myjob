<?php

header('Content-type: text/javascript'); 

if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)
	readfile('../resources/assets/javascripts/html5shiv.min.js');

readfile('../resources/assets/javascripts/jquery.min.js');
readfile('../resources/assets/javascripts/semantic.min.js');
readfile('../resources/assets/javascripts/moment-with-locales.min.js');
readfile('../resources/assets/javascripts/picker.js');
readfile('../resources/assets/javascripts/picker.date.js');
readfile('../resources/assets/javascripts/main.js');

// TODO change to validator.min.js when site is public
readfile('../resources/assets/javascripts/validator.js');
