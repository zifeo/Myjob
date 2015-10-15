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
				'title'              => 'Jardinier occasionnel',
				'category_id'        => 1,
				'place'              => 'Renens',
				'salary'             => '20 chf / h',
				'description'        => 'Cherche un étudiant pour du jardinage. Il faudra entretenir les hortensias et tondre la pelouse en été.',
				'skills'             => 'Bonne condition physique',
				'duration'           => '1h par semaine',
				'languages'          => '',
				'contact_first_name' => 'Jean',
				'contact_last_name'  => 'Claude',
				'contact_email'      => 'jean.claude@fakemail.com',
				'contact_phone'      => '0211235566',
				'starts_at'          => '2016-01-01',
				'ends_at'            => '2016-12-31',
			],
			[
				'title'              => 'Expérience psychologique au CHUV',
				'category_id'        => 3,
				'place'              => 'CHUV, Lausanne',
				'salary'             => '30 CHF par heure',
				'description'        => 'Nous cherchons un étudiant pour expérience psychologique. Les détails seront fournis par mail.',
				'skills'             => '',
				'duration'           => '4h',
				'languages'          => '',
				'contact_first_name' => 'Amélie',
				'contact_last_name'  => 'Boulette',
				'contact_email'      => 'a.boulette@chuv.ch',
				'contact_phone'      => '0215957555',
				'starts_at'          => '2016-03-02',
			],
			[
				'title'              => 'Aide en informatique',
				'category_id'        => 7,
				'place'              => 'EPFL',
				'salary'             => '53.—',
				'description'        => 'Je cherche un étudiant en informatique pour m\'aider à installer une machine virtuelle sur mon Mac. J\'ai OSX Lion et ai besoin d\'installer AutoCAD sur une machine virtuelle Windows 7.',
				'skills'             => 'Bon en informatique',
				'duration'           => '2h',
				'languages'          => 'Français',
				'contact_first_name' => 'Robert',
				'contact_last_name'  => 'De la cour',
				'contact_email'      => 'robert.delacour@epfl.ch',
				'contact_phone'      => '+41766118899',
				'starts_at'          => '2015-10-10',
				'ends_at'            => '2015-12-31',
			],
			[
				'title'              => 'DJ pour mariage',
				'category_id'        => 4,
				'place'              => 'Morges',
				'salary'             => '24.—/h',
				'description'        => 'Nous cherchons un DJ pour notre mariage. Style de musique: jazz pour le repas, musique commerciale en fin de soirée.',
				'skills'             => 'De l\'expérience dans l\'évenementiel',
				'duration'           => '8h',
				'languages'          => 'Français',
				'contact_first_name' => 'Huguette',
				'contact_last_name'  => 'Michel',
				'contact_email'      => 'huguette.michel@bluewin.ch',
				'contact_phone'      => '0216661120',
				'starts_at'          => '2016-05-12',
				'ends_at'            => '',
			],
		];

		foreach ($ads as $ad) {
			Ad::create($ad);
		}
	}
}
