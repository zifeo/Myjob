<?php

namespace Myjob\Seeders;

use DB;
use Illuminate\Database\Seeder;
use Myjob\Models\Publisher;

class PublishersTableSeeder extends Seeder {

	public function run() {

		DB::table('publishers')->delete();

		// every seeded ad should have corresponding email here
		$emails = [
			'j.p@gmail.com',
			'c.c@pollypocket.com',
			'j.ahahhsh@epfl.ch',
			'j.p@epfl.ch',
		];

		foreach ($emails as $email) {
			$contact_email = new Publisher;

			$contact_email->contact_email = $email;
			$contact_email->random_secret = str_random(32);

			$contact_email->save();
		}
	}
}
