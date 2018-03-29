<?php

return [

	'nav'             => [
		'home'          =>	"Accueil",
		'jobs'          =>	"Tous les jobs",
		'myjobs'        =>	"Mes jobs",
		'job'           =>	"Job",
		'search'        =>	"Recherche",
		'newjob'        =>	"Créer un job",
		'editjob'       =>	"Editer un job",
		'deletejob'     =>	"Supprimer un job",
		'enablejob'     =>	"Renouveller un job",
		'disablejob'    =>	"Désactiver un job",
		'acceptjob'     =>	"Accepter un job",
		'refusejob'     =>	"Refuser un job",
		'moderation'    =>	"Modération",
		'options'       =>	"Options",
		'help'          =>	"Aide",
		'connect'       =>	"Se connecter",
		'disconnect'    =>	"Déconnexion",
	],

	'buttons'         => [
		'submit'   => [
			'new'    => "Enregistrer la nouvelle annonce",
			'edit'   => "Appliquer les modifications",
			'update' => "Appliquer changements",
			'send'   => "Envoyer le message",
			'send-short'	=> "Envoyer",
		],
		'edit'     => "Editer",
		'renew'    => "Renouveller",
		'disable'  => "Désactiver",
		'delete'   => "Supprimer",
		'accept'   => "Accepter",
		'refuse'   => "Refuser",
		'recover'    => "Récupérer une annonce",
		'ask'      => "Poser une question",
		'apply'    => "Postuler",
		'offer'    => "Je recherche un étudiant",
		'seek'     => "Je recherche un job",
		'feedback' => "Feedback",
	],

	'optional'        => "si applicable",
	'undefined'       => "Non spécifié",
	'nothingleft'     => "Pas de contenu disponible.",
	'back'            => "Retour",

	'disabled'        => "désactivé",
	'notyetvalidated' => "pas encore validé",

	'startingtoday'   => "dès aujourd'hui",
	'dates'           => "Date·s",
	'todate'          => "jusqu'au",

	'successes'       => [
		'options' => "Options mises à jour.",
		'sent'    => "Message envoyé.",
		'adcreated' => "L'annonce a été créée avec succès !",
	],

	'titles'          => [
		'managing'		=> "Gestion de l'annonce",
		'conditions'    => "Conditions d'acceptation",
		'contact'       => "Formulaire de contact",
		'faq'           => "Foire aux questions",
		'confirmdelete' => "Supprimer un job ?",
		'notifications' => "Notifications",
		'publishers'    => "Employeurs",
		'students'      => "Etudiants",
		'adopt'         => "Adopte un étudiant EPFL",
		'news'          => "Un nouveau Myjob !",
		'apply'			=> "Postuler",
		'forgotten-link'=> "Lien perdu",
        'process' 		=> "Processus",
        'error'         => "Une erreur s'est produite",
	],

	'placeholders' => [
		'forgotten-link-mail' => "L'adresse email utilisée lors de la création des annonces",
	],

	'texts'           => [
		'delete'        => [
			'confirm'    => "Désactiver l'annonce permet de la rendre invisible et de la réactiver plus tard.",
			'definitive' => "Au contraire, la suppression est définitive.",
			'disabled'   => "L'annonce est déjà désactivée.",
		],
		'rules'         => [
			'respect'    => "L'annonce doit respecter les critères suivants pour être validée:",
			'visibility' => "Il existe deux façons de gérer l'annonce. Pour les collaborateurs et les étudiants de l'EPFL, il est possible de se connecter au moyen de Tequila, puis d'aller dans la rubrique \"mes annonces\". Pour les autres, il suffit de cliquer sur le lien envoyé par email à la création de l'annonce ou d'en redemander un. Dans tous les cas, <strong>l'annonce est visible durant 15 jours</strong>, durée après laquelle il faut la renouveler.",
			'rule1'      => "cible un étudiant <strong>durant</strong> ses études à l'EPFL",
			'rule2'      => "respect du tarif minimum : <strong>CHF 24.—/h</strong>",
			'rule3'      => "<strong>pas de lien de postulation extérieure</strong>",
			'rule4'      => "les annonces doivent être rédigées en <strong>français</strong> ou <strong>anglais</strong>",
		],
		'contact'       => "Pour toute·s question·s (après avoir lu attentivement la foire aux questions) et/ou suggestion·s, vous pouvez contacter rapidement l'équipe par ici.",
		'faq'           => "Après de nombreuses années de services, l'équipe de Myjob a soigneusement répertorié ici les questions les plus posées.",
		'notifications' => "Malgré le nombre d'annonces, les places se font rares. Il est donc possible de paramétrer des alertes emails fréquentes pour ne pas rater les nouvelles annonces.",
		'description'   => "L'<strong>Association Générale des Etudiants</strong> de l'<strong>Ecole Polytechnique Fédérale de Lausanne</strong> met gratuitement cette plateforme à disposition pour mettre en relation étudiants et employeurs. Le but est de permettre aux étudiants de trouver facilement un job/emploi <strong>durant leurs études</strong>, et en même temps d'offrir aux employeurs des profils variés et qualifiés.",
		'noinscription' => "Aucune inscription, gestion par <strong>email</strong>.",
		'tequila'       => "Accès <strong><em>Tequila</em></strong> requis.",
		'oldad'         => "Retrouver une ancienne annonce.",
		'newpassword'   => "Mot de passe \"Gaspar\" perdu.",
		'apply'       	=> "Pour postuler, veuillez contacter directement l'auteur de l'annonce.",
		'news'          => "Bienvenue sur la nouvelle version ! Aide-nous à améliorer cette grande mise à jour en signalant tout ce qui te parait anormal ou peu pratique. On attend avec impatience tes remarques et suggestions !",
		'forgotten-link'=> "Nous vous enverrons un email contenant un nouveau lien secret de connexion. Votre lien précédent sera invalidé.",
		'forgotten-link-success'	=> "Un email contenant le nouveau lien secret de connexion vous a été envoyé.",
		'forgotten-link-error'		=> "Personne n'a publié d'annonce avec l'email :email.",
		'forgotten-link-advices'	=> "Si vous avez déjà créé une annonce sur Myjob, vous devriez avoir reçu un email contenant votre lien de connexion. Si ce lien a été perdu ou ne fonctionne pas, veuillez en redemander un nouveau en indiquant votre adresse email. Merci de vérifier qu'il s'agisse bien de l'adresse email utilisée lors de la création d'une annonce.",
        'error' 		=> "Merci de recharger la page et de réessayer. Si l'erreur persiste et que vous pensez qu'il s'agit d'un comportement anormal, <a href=\"" . action('HelpController@index') . "\">contactez-nous</a>.",
	],

];
