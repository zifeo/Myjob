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

        $this->call('ContactEmailsTableSeeder');

        $this->call('AdsTableSeeder');

        $this->call('FAQSeeder');
	}

}

class CategoriesTableSeeder extends Seeder {

    public function run()
    {
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
            'Other'
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
            'Autre'
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

class ContactEmailsTableSeeder extends Seeder {
    public function run()
    {
        DB::table('contact_emails')->delete();

        /* Every seeded Ad should have corresponding email here. */
        $emails = [
            'j.p@gmail.com',
            'c.c@pollypocket.com',
            'j.ahahhsh@epfl.ch',
            'j.p@epfl.ch',
        ];

        foreach ($emails as $email) {
            $contact_email = new ContactEmail;

            $contact_email->contact_email = $email;
            $contact_email->random_secret = str_random(32);

            $contact_email->save();
        }
    }
}

class AdsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('ads')->delete();

        $ads = [
            [
                'title' => 'Recherche Jardinier',
                'category_id' => 1,
                'place' => 'Renens',
                'description' => 'Je recherche une personne musclée pour des travaux d\'entretien',
                'skills' => 'Musclé, beau, intense.',
                'duration' => '2h par jour',
                'languages' => 'Français et espagnol',
                'contact_first_name' => 'Juan',
                'contact_last_name' => 'Paolo',
                'contact_email' => 'j.p@gmail.com',
                'contact_phone' => '0212221122',
                'starts_at' => '2015-06-02',
                'ends_at' => '2015-08-29'
            ],
            [
                'title' => 'Experience',
                'category_id' => 3,
                'place' => 'EPFL',
                'description' => 'Je recherche une personne forte pour expérience sociologique.',
                'skills' => 'Intelligent',
                'duration' => '1h',
                'languages' => '',
                'contact_first_name' => 'Cédric',
                'contact_last_name' => 'Cook',
                'contact_email' => 'c.c@pollypocket.com',
                'contact_phone' => '0215955555',
                'starts_at' => '2015-03-02',
            ],
            [
                'title' => 'Recherche étudiant en informatique',
                'category_id' => 8,
                'place' => 'EPFL',
                'description' => 'Je cherche un étudiant en info pour m\'aider avec Computer Graphics',
                'skills' => 'Bon en informatique',
                'duration' => '1h par semaine',
                'languages' => 'Français',
                'contact_first_name' => 'Johnny',
                'contact_last_name' => 'Bobby',
                'contact_email' => 'j.ahahhsh@epfl.ch',
                'contact_phone' => '832749853',
                'starts_at' => '2015-04-12',
                'ends_at' => '2015-05-12',
            ],
            [
                'title' => 'Programmeur C pour machine à café',
                'category_id' => 4,
                'place' => 'EPFL - LSRO',
                'description' => 'Cela fait 5 ans que je cherche une personne pour recoder le kernel de la machine à café. S\'il vous plait, Linux programmeurs acharnés, aidez le LSRO.',
                'skills' => 'Gros foufou en C',
                'duration' => '8h par jour',
                'languages' => 'Français, Anglais, Russe',
                'contact_first_name' => 'Jean',
                'contact_last_name' => 'Pierre',
                'contact_email' => 'j.p@epfl.ch',
                'contact_phone' => '0216931120',
                'starts_at' => '2015-04-01',
                'ends_at' => '2015-04-15',
            ]
        ];

        foreach ($ads as $ad) {
            Ad::create($ad);   
        }
    }
}

class FAQSeeder extends Seeder {
    public function run()
    {
        DB::table('faq')->delete();

        $question_answers_en = [
            'What is the meaning of life?' => 'God.',
            'What if I accidently eat a banana?' => 'Send an email to banana@myjob.ch and we\'ll see what we can do.',
            'How to make MyJob work, it\'s all laggy!' => 'Did you try to reboot your computer?',
            'Knock knock' => 'Who\'s there?',
            'How can I post an ad on MyJob?' => 'Please use the <a href="ad/create">corresponding form</a>.'
        ];

        $question_answers_fr = [
            'Quel est le sens de la vie ?' => 'Dieu.',
            'Que se passe-t-il si je mange accidentellement une banane ?' => 'Envoyez un email à banana@myjob.ch et nous regarderons ce que nous pouvons faire à ce sujet.',
            'Comment faire marcher MyJob, rien ne fonctionne !' => 'Avez-vous essayé de redémarrer votre ordinateur ?',
            'Toc toc...' => 'Qui est là ?',
            'Comment puis-je poster une annonce sur MyJob ?' => 'Veuillez utiliser le <a href="ad/create">formulaire correspondant</a>.'
        ];


        for ($position = 0; $position < sizeof($question_answers_en); $position++) { 

            // Extract current question / answer in en and fr
            $question_en = key($question_answers_en);
            $question_fr = key($question_answers_fr);
            $answer_en = current($question_answers_en);
            $answer_fr = current($question_answers_fr);

            // Construct an FAQ entry in the database
            $faq_entry = new FAQ;

            $faq_entry->position = $position;
            $faq_entry->question_en = $question_en;
            $faq_entry->answer_en = $answer_en;
            $faq_entry->question_fr = $question_fr;
            $faq_entry->answer_fr = $answer_fr;

            $faq_entry->save();

            // Iterate over the arrays
            next($question_answers_en);
            next($question_answers_fr);
        }
    }
}