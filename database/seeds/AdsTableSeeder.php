<?php

namespace Myjob\Seeders;

use DB;
use Illuminate\Database\Seeder;
use Myjob\Models\Ad;

class AdsTableSeeder extends Seeder {

	public function run() {

		DB::table('ads')->delete();

		// categories id have to exist
		$ads = [
			[
				'title'              => 'Recherche Jardinier',
				'category_id'        => 1,
				'place'              => 'Renens',
				'salary'             => '$$',
				'description'        => 'Je recherche une personne musclée pour des travaux d\'entretien',
				'skills'             => 'Musclé, beau, intense.',
				'duration'           => '2h par jour',
				'languages'          => 'Français et espagnol',
				'contact_first_name' => 'Juan',
				'contact_last_name'  => 'Paolo',
				'contact_email'      => 'j.p@gmail.com',
				'contact_phone'      => '0212221122',
				'starts_at'          => '2015-06-02',
				'ends_at'            => '2015-08-29',
			],
			[
				'title'              => 'Experience',
				'category_id'        => 3,
				'place'              => 'EPFL',
				'salary'             => 'bénévole',
				'description'        => 'Je recherche une personne forte pour expérience sociologique.',
				'skills'             => 'Intelligent',
				'duration'           => '1h',
				'languages'          => '',
				'contact_first_name' => 'Cédric',
				'contact_last_name'  => 'Cook',
				'contact_email'      => 'c.c@pollypocket.com',
				'contact_phone'      => '0215955555',
				'starts_at'          => '2015-03-02',
			],
			[
				'title'              => 'Recherche étudiant en informatique',
				'category_id'        => 7,
				'place'              => 'EPFL',
				'salary'             => '53.—',
				'description'        => 'Je cherche un étudiant en info pour m\'aider avec Computer Graphics',
				'skills'             => 'Bon en informatique',
				'duration'           => '1h par semaine',
				'languages'          => 'Français',
				'contact_first_name' => 'Johnny',
				'contact_last_name'  => 'Bobby',
				'contact_email'      => 'j.ahahhsh@epfl.ch',
				'contact_phone'      => '832749853',
				'starts_at'          => '2015-04-12',
				'ends_at'            => '2015-05-12',
			],
			[
				'title'              => 'Programmeur C pour machine à café',
				'category_id'        => 4,
				'place'              => 'EPFL - LSRO',
				'salary'             => '24.—/h',
				'description'        => 'Cela fait 5 ans que je cherche une personne pour recoder le kernel de la machine à café. S\'il vous plait, Linux programmeurs acharnés, aidez le LSRO.',
				'skills'             => 'Gros foufou en C',
				'duration'           => '8h par jour',
				'languages'          => 'Français, Anglais, Russe',
				'contact_first_name' => 'Jean',
				'contact_last_name'  => 'Pierre',
				'contact_email'      => 'j.p@epfl.ch',
				'contact_phone'      => '0216931120',
				'starts_at'          => '2015-04-01',
				'ends_at'            => '2015-04-15',
			],
		];

		for ($i = 0; $i < 3; ++$i) {
			foreach ($ads as $ad) {
				Ad::create($ad);
			}
		}
	}
}