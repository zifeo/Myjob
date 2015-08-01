<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {
	
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
	    
        Model::unguard(); // enable mass assignements

        $this->call(Myjob\Seeders\CategoriesTableSeeder::class); // depend on ads
        $this->call(Myjob\Seeders\ProvidersTableSeeder::class); // depend on ads
        $this->call(Myjob\Seeders\AdsTableSeeder::class);
        
        $this->call(Myjob\Seeders\FAQSeeder::class);

        Model::reguard();
    }
}