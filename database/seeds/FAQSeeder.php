<?php

namespace Myjob\Seeders;

use DB;
use Illuminate\Database\Seeder;
use Myjob\Models\FAQ;

class FAQSeeder extends Seeder {

	public function run() {

		DB::table('faq')->delete();

		$question_answers_en = [
			'I want to offer a job to a student, how to proceed?'	=>
				'You simply have to create an ad following <a href="' . 
				action('AdController@create') . '">this link</a>. No 
				registration is needed, a link to manage the ads you will 
				be sent to you by email.',

			'I created an ad, how to modify / delete it?' =>
				'You should have recieved a link to manage the ads you
				created. <a href="#">Click here</a> to ask for a new link.',

			'Why is the salary field mandatory?' =>
				'"To discuss" can be written in this field. But you have to know
				that a student-assistant job at EPFL must respect a minimum salary
				of 24 CHF per hour.',

			'I am a student and am looking for a job, is it possible to create
			an ad to offer my services?' =>
				'No, ads are reserved for people who offer jobs to students.
				We encourage you to look for newly available ads regularly, and
				to <a href="'. action('OptionsController@index') . '">subscribe 
				to daily mails</a> to increase your chances of finding	a job.',

			'Im am not an EPFL student, is it still possible to access Myjob\'s ads?' =>
				'No, ads are reserved for EPFL students.',

			'I posted an ad and it does not appear, what is happening?' =>
				'Ads must be validated by the moderation team before being
				visible. We try to validate ads as fast as possible. If after 24h
				your ad is still not visible, a problem might have occured.
				Please contact us though the form on your right.',

			'I posted an ad and it has been refused, what happened?' =>
				'In addition to respecting the Acceptation Conditions, your ad
				must be written in a courteous way, can not contain too many uppercase
				letters and avoid systematically using the word "URGENT".',
		];

		$question_answers_fr = [
			'Je veux proposer un job à un étudiant, comment procéder ?'	=>
				'Il suffit de créer une annonce en suivant
				<a href="' . action('AdController@create') . '">ce lien</a>. 
				Pas besoin d\'inscription, un lien pour administrer les annonces 
				que vous avez créées vous sera envoyé par email.',

			'J\'ai créé une annonce, comment la modifier / supprimer ?' =>
				'Vous devez avoir reçu un email avec un lien pour administrer
				les annonces que vous avez créées. <a href="#">Cliquez ici</a>
				pour demander un nouveau lien.', // TODO link

			'Pourquoi est-ce que le champ "Rémunération" est obligatoire ?' =>
				'Il est possible d\'inscrire "à discuter" dans le champ
				"Rémunération". Sachez pourtant qu\'un travail
				d\'assistant-étudiant à l\'EPFL est soumis au tarif minimum de
				24 CHF par heure.',

			'Je suis étudiant et cherche un job, est-ce possible de créer une
			annonce pour proposer mes services ?' =>
				'Non, les annonces sont réservées aux personnes proposant un
				job aux étudiants. Nous vous invitons à consulter les annonces
				disponibles régulièrement, et à <a href="'. 
				action('OptionsController@index') . '">activer les mails 
				journaliers</a> afin d\'augmenter vos chances de trouver un job.',

			'Je ne suis pas étudiant à l\'EPFL, est-ce tout de même possible d\'accéder
			 aux annonces de Myjob ?' =>
				'Non, les annonces sont réservées aux étudiants de l\'EPFL.',

			'J\'ai posté une annonce et elle n\'apparaît pas, que se passe-t-il ?' =>
				'Les annonces sont soumise à une équipe de modération. Nous nous
				efforçons de valider vos annonces le plus vite possible. Si votre
				annonce n\'est toujours pas validée après 24h, il est possible
				qu\'un problème ait survenu. Veuillez nous contacter via le
				Formulaire de Contact sur votre droite.',

			'J\'ai posté une annonce et elle a été refusée, que s\'est-il passé ?' =>
				'En plus de respecter les Conditions d\'acceptation, votre
				annonce doit être écrite de manière courtoise, ne pas contenir
				trop de majuscules et éviter l\'usage systèmatique du mot clé
				"URGENT".',
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
