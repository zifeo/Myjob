<?php

namespace Myjob\Seeders;

use Illuminate\Database\Seeder;
use Myjob\Models\FAQ;
use DB;

class FAQSeeder extends Seeder {
	
    public function run() {
	    
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


        for ($position = 0; $position < count($question_answers_en); $position++) { 

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