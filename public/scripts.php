<?php

header('Content-type: text/javascript'); 

if (preg_match('/msie [5-8]/i', getenv('HTTP_USER_AGENT'))) {
	readfile('scripts/html5shiv.min.js');
}

readfile('scripts/jquery.min.js');
readfile('scripts/jquery.mobile.min.js');
readfile('scripts/bootstrap.min.js');
readfile('scripts/bootstrap-datepicker.js');
readfile('scripts/chosen.jquery.min.js');
readfile('scripts/momentjs.min.js');
readfile('scripts/main.js');

// TODO change to validator.min.js when site is public
readfile('scripts/validator.js');
