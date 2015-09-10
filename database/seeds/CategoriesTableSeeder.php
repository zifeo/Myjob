<?php

namespace Myjob\Seeders;

use DB;
use Illuminate\Database\Seeder;
use Myjob\Models\Category;

class CategoriesTableSeeder extends Seeder {

	public function run() {

		DB::table('categories')->delete();

		$categories_en = [
			'Domestic help',
			'Babysitting',
			'Scientific experiment',
			'IT',
			'Office work',
			'Public relations',
			'Restaurant / Hotel work',
			'Tutoring',
			'Other',
		];

		$categories_fr = [
			'Aide à domicile',
			'Babysitting',
			'Cobaye pour expériences',
			'Informatique',
			'Job de bureau',
			'Promotion',
			'Restauration - Hôtellerie',
			'Soutien scolaire',
			'Autre',
		];

		for ($i = 0; $i < sizeof($categories_en); $i++) {
			$category = new Category;

			$category->name_en = current($categories_en);
			$category->name_fr = current($categories_fr);

			next($categories_en);
			next($categories_fr);

			$category->save();
		}
	}
}