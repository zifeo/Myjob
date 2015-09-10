<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {

		Model::unguard(); // enable mass assignements

		$this->call(Myjob\Seeders\CategoriesTableSeeder::class);
		$this->call(Myjob\Seeders\PublishersTableSeeder::class);
		$this->call(Myjob\Seeders\AdsTableSeeder::class); // depend on both previous

		$this->call(Myjob\Seeders\FAQSeeder::class);

		Model::reguard();
	}
}