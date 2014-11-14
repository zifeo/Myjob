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
