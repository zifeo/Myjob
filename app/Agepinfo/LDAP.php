<?php

namespace Myjob\Agepinfo;


use Myjob\Models\User;

//==========================================================================
//! EPFL LDAP Wrapper
//  Provides a way to easily retrieve students from EPFL LDAP
//  LDAP can only be reached on the EPFL campus or through VPN connection
//==========================================================================

final class LDAP {
	const URL = 'ldaps://ldap.epfl.ch';
	const PORT = 636;
	const BASE = 'ou=etu,o=epfl,c=ch';

	/*
	 * Retrieve all the students from the LDAP.
	 * Warning: expensive operation, can block for a few seconds, even minutes.
	 * Throws exceptions if LDAP can't be reached.
	 */
	public static function getAllStudents() {
		// Connection
		$connection = ldap_connect(self::URL, self::PORT);

		// Authentification
		$bind = ldap_bind($connection);

		// Search for all users that are students
		$searchResults = ldap_search($connection, self::BASE, '(employeeType=Etudiant)');

		// Expensive operation!
		$entries = ldap_get_entries($connection, $searchResults);

		ldap_close($connection);

		// Construct associative array [$sciper -> $user] containing found students
		$studentList = [];

		foreach ($entries as $entry) {
			if (isset($entry['uniqueidentifier']) &&
					isset($entry['givenname']) &&
					isset($entry['sn']) &&
					isset($entry['mail'])) {

				$user = new User();

				$user->sciper = $entry['uniqueidentifier'][0];
				$user->first_name = $entry['givenname'][0];
				$user->last_name = $entry['sn'][0];
				$user->email = $entry['mail'][0];

				$user->is_student = TRUE;

				/*
				   Add student if not already in the array
				   Some people might be subscribed twice as
				   student under different "accreditation"
				*/
				if (!isset($studentList[$user->sciper])) {
					$studentList[$user->sciper] = $user;
				}
			}
		}

		return $studentList;
	}
}
