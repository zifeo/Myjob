<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('CategoriesTableSeeder');

        $this->command->info('Categories table seeded!');

        $this->call('AdsTableSeeder');

        $this->command->info('Ads table seeded!');
	}

}

class CategoriesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('categories')->delete();

        DB::table('categories')->insert([
        	['name' => 'Aide à domicile'],
        	['name' => 'Babysitting'],
        	['name' => 'Cobaye pour expériences'],
        	['name' => 'Informatique'],
        	['name' => 'Job de bureau'],
        	['name' => 'Promotion'],
        	['name' => 'Restauration - Hôtellerie'],
        	['name' => 'Soutien scolaire'],
        	['name' => 'Autre']
        ]);
    }

}

class AdsTableSeeder extends Seeder  {

    public function run()
    {
        DB::table('ads')->delete();

        DB::table('ads')->insert([
            ['category_id' => 1, 'url' => 'ad1', 'title' => 'ad1', 'description' => 'Lorem ipsum génial'],
            ['category_id' => 2, 'url' => 'ad2', 'title' => 'ad2', 'description' => 'Lorem ipsum nul'],
            ['category_id' => 3, 'url' => 'ad3', 'title' => 'ad3', 'description' => 'Lorem ipsum moyen']
        ]);
    }
}
