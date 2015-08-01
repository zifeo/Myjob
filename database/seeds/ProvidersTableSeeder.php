<?php

namespace Myjob\Seeders;

use Illuminate\Database\Seeder;
use Myjob\Models\Provider;
use DB;

class ProvidersTableSeeder extends Seeder {
	
    public function run() {
	    
        DB::table('providers')->delete();

        // every seeded ad should have corresponding email here
        $emails = [
            'j.p@gmail.com',
            'c.c@pollypocket.com',
            'j.ahahhsh@epfl.ch',
            'j.p@epfl.ch',
        ];

        foreach ($emails as $email) {
            $contact_email = new Provider;

            $contact_email->contact_email = $email;
            $contact_email->random_secret = str_random(32);

            $contact_email->save();
        }
    }
}
