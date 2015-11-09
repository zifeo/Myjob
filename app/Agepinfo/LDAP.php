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
	const BASE = 'o=epfl,c=ch';

	// Retrieve all the students from the LDAP
	public static function getAllStudents() {
		// TODO
	}

	// Get a student from the LDAP, given its sciper
	public static function getStudentBySciper($sciper) {
		$connection = ldap_connect(self::URL, self::PORT);

		// Authentification
		$bind = ldap_bind($connection);

		$searchResults = ldap_search($connection, self::BASE, 'uniqueIdentifier=' . $sciper);

		$entries = ldap_get_entries($connection, $searchResults);

		ldap_close($connection);

		// For each entry, check if one of the values of employeetype is "Etudiant" (Student)
		foreach ($entries as $entry) {
			if (isset($entry['employeetype']) && count($entry['employeetype']) > 0) {
				foreach ($entry['employeetype'] as $key => $type) {
					if ($type == 'Etudiant') {
						if (isset($entry['givenname']) && 
							isset($entry['sn']) &&
							isset($entry['mail'])) {

							$user = new User();

							$user->sciper = $sciper;
							$user->first_name = $entry['givenname'][0];
							$user->last_name = $entry['sn'][0];
							$user->email = $entry['mail'][0];

							return $user;
						}
					}
				}
			}
		}

		// Not a student
		return NULL;
	}
}
