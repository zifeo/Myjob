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
			'jean.claude@fakemail.com',
			'a.boulette@chuv.ch',
			'robert.delacour@epfl.ch',
			'huguette.michel@bluewin.ch',
		];

		foreach ($emails as $email) {
			$contact_email = new Publisher;

			$contact_email->contact_email = $email;
			$contact_email->random_secret = str_random(32);

			$contact_email->save();
		}
	}
}
