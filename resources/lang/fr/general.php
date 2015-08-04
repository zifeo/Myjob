<?php

return [

	'nav' => [
		'home'	 			=> 'Accueil',
		'jobs' 				=> 'Tous les jobs',
		'myjobs' 			=> 'Mes jobs',
		'job' 				=> 'Job',
		'search' 			=> 'Recherche',
		'newjob' 			=> 'Créer un job',
		'editjob' 			=> 'Editer un job',
		'deletejob' 		=> 'Supprimer un job',
		'enablejob' 		=> 'Renouveller un job',
		'disablejob' 		=> 'Désactiver un job',
		'acceptjob' 		=> 'Accepter un job',
		'refusejob' 		=> 'Refuser un job',
		'moderation' 		=> 'Modération',
		'options' 			=> 'Options',
		'help' 				=> 'Aide',
		'connect' 			=> 'Se connecter',
		'disconnect' 		=> 'Déconnexion',
	],
	
	'routes' => [
		'home'	 			=> '/', // always a route with '/' needed
		'jobs' 				=> 'jobs',
		'myjobs' 			=> 'mes-jobs',
		'job' 				=> 'job',
		'search' 			=> 'recherche',
		'newjob' 			=> 'nouveau-job',
		'editjob' 			=> 'edition',
		'deletejob'			=> 'supression',
		'enablejob'			=> 'activation',
		'disablejob'		=> 'desactivation',
		'acceptjob'			=> 'validation',
		'refusejob'			=> 'refus',
		'moderation' 		=> 'moderation',
		'options' 			=> 'options',
		'help' 				=> 'aide',
		'connect' 			=> 'connexion',
		'disconnect' 		=> 'reset',
	],
	
	'buttons' => [
		'submit' => [
			'new' 			=> 'Enregistrer la nouvelle annonce',
			'edit'	 		=> "Modifier l'annonce",	
			'update'	 	=> "Modifier les options",	
		],	
		'edit'	 			=> 'Editer',	
		'renew'	 			=> 'Renouveller',	
		'disable'	 		=> 'Désactiver',	
		'delete'	 		=> 'Supprimer',	
		'accept'	 		=> 'Accepter',	
		'refuse'	 		=> 'Refuser',	
		'reget'	 			=> 'Récupérer une annonce',	
		'ask'	 			=> 'Poser une question',	
		'apply'		 		=> 'Postuler',	
		'send'		 		=> 'Envoyer le message',	
	],

	'optional' 				=> 'si applicable',	
	'undefined' 			=> 'Non spécifié',
	'nothingleft' 			=> "Pas d'annonce disponible.",
	'back' 					=> 'Retour',

	'disabled'	 			=> 'désactivé',
	'notyetvalidated'		=> 'pas encore validé',
	
	'startingtoday' 		=> "dès aujourd'hui",
	'dates' 				=> 'Date·s',
	'todate' 				=> "jusqu'au",
	
	'successes'	=> [
		'options'			=> "Options misent à jour.",	
	],

	'titles' => [
		'managing'			=> "Gestion de l'annonce",
		'conditions'		=> "Conditions d'acceptation",	
		'contact'			=> "Formulaire de contact",	
		'faq'				=> "Foire aux questions",	
		'confirmdelete'		=> "Supprimer un job ?",	
		'notifications'		=> "Notifications",	
	],

	'texts' => [
		'delete' => [
			'confirm'		=> "Désactiver l'annonce permet de la retrouver et de la réactiver plus tard.",
			'definitive'	=> "Au contraire, la suppression est définitive.",
			'disabled'		=> "L'annonce est déjà désactivée.",			
		],
		'rules' => [
			'respect'		=> "L'annonce doit respecter les critères suivants pour être validée, au risque de pas être acceptée :",
			'visibility'	=> "Il existe deux façons de gérer l'annonce. Pour les collaborateurs et les étudiants de l'EPFL, il est possible de se connecter au moyen de Tequila puis d'aller dans la rubrique \"mes annonces\". Pour les autres, il suffit de cliquer sur le lien envoyé à la création de l'annonce ou d'en redemander un. Dans tous les cas, <strong>l'annonce est visible durant 15 jours</strong>, durée après laquelle il faut la renouveler.",
			'rule1'			=> "cible un étudiant <strong>durant</strong> ses études à l'EPFL",
			'rule2'			=> "respect du tarif minimum : <strong>CHF 24.—/h</strong>",
			'rule3'			=> "<strong>pas de lien de postulation extérieure</strong>",
		],
		'contact' 			=> "Pour toute·s question·s (après avoir lu attentivement la foire aux questions) et/ou suggestion·s, vous pouvez contacter rapidement l'équipe par ici.",
		'faq' 				=> "Après de nombreuses années de services, l'équipe de Myjob a récolté soigneusement les questions les plus posées et les a répertoriées ici.",
		'notifications' 	=> "Malgré le nombre d'annonces, certaines places se font rares et c'est pourquoi il est possible de paramétrer des alertes emails qui vous seront envoyées selon certains critères.",
		
	],
	
];
