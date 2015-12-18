<?php

return [

//==========================================================================
//! EPFL LDAP Config file
//  The LDAP server is only accessible from the EPFL network
//==========================================================================

	// LDAP server url
	'host'    => 'ldaps://ldap.epfl.ch',

	// LDAP server port
	'port'    => 636,

	// Root base
	'base'    => 'o=epfl,c=ch',

	// Student base
	'studentbase'    => 'ou=etu,o=epfl,c=ch',



];
