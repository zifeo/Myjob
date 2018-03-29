<?php

return [

	'nav'             => [
		'home'          =>	"Home",
		'jobs'          =>	"All jobs",
		'myjobs'        =>	"My jobs",
		'job'           =>	"Job",
		'search'        =>	"Search",
		'newjob'        =>	"New job",
		'editjob'       =>	"Edit a job",
		'deletejob'     =>	"Delete a job",
		'enablejob'     =>	"Renew a job",
		'disablejob'    =>	"Disable a job",
		'acceptjob'     =>	"Accept a job",
		'refusejob'     =>	"Refuse a job",
		'moderation'    =>	"Moderation",
		'options'       =>	"Options",
		'help'          =>	"Help",
		'connect'       =>	"Connect",
		'disconnect'    =>	"Disconnect",
	],

	'buttons'	=> [
		'submit'   => [
			'new'    => "Save new ad",
			'edit'   => "Apply modifications",
			'update' => "Apply changes",
			'send'   => "Send the message",
			'send-short'	=> "Send",
		],
		'edit' 		=> "Edit",
		'renew' 	=> "Renew",
		'disable' 	=> "Disable",
		'delete' 	=> "Delete",
		'accept' 	=> "Accept",
		'refuse' 	=> "Refuse",
		'recover' 	=> "Recover an ad",
		'ask' 		=> "Ask a question",
		'apply' 	=> "Apply",
		'offer' 	=> "I'm looking for a student",
		'seek' 		=> "I'm looking for a job",
		'feedback' 	=> "Feedback",
	],

	'optional'        => "if applicable",
	'undefined'       => "Unspecified",
	'nothingleft'     => "No content available.",
	'back'            => "Back",

	'disabled'        => "Disabled",
	'notyetvalidated' => "not yet validated",

	'startingtoday'   => "starting today",
	'dates'           => "Date·s",
	'todate'          => "until",

	'successes'       => [
		'options' => "Options have been updated.",
		'sent'    => "The message has been sent.",
		'adcreated' => "The ad was created with success!",
	],

	'titles'          => [
		'managing'		=> "Manage the ad",
		'conditions'    => "Approval conditions",
		'contact'       => "Contact form",
		'faq'           => "Frequently asked questions",
		'confirmdelete' => "Delete a job?",
		'notifications' => "Notifications",
		'publishers'    => "Employers",
		'students'      => "Students",
		'adopt'         => "Hire an EPFL student",
		'news'          => "A new Myjob !",
		'apply'			=> "Apply",
		'forgotten-link'=> "Forgotten link",
        'process' 		=> "Process",
        'error'         => "An error occured",
	],

	'placeholders' => [
		'forgotten-link-mail' => "The email address that was used when creating the ads.",
	],

	'texts'           => [
		'delete'        => [
			'confirm'    => "Disable an ad temporarily makes it invisible. You can enable it again later.",
			'definitive' => "On the opposite, deletion is definitive.",
			'disabled'   => "The ad is already disabled.",
		],
		'rules'         => [
			'respect'    => "The ad must repect following criteria to be accepted:",
			'visibility' => "There are two ways of creating an ad. EPFL collaborators and students, you can connect through Tequila, then navigate into the \"My Ads\" section. For others, you need to use the link that was sent to you by email after the ad creation, or ask for a new one just below. In any case, <strong>the ad is visible during 15 days</strong>, then it disables and you need to renew it.",
			'rule1'      => "aims at a student <strong>during</strong> his studies at EPFL",
			'rule2'      => "respect of the minimum rate : <strong>CHF 24.—/h</strong>",
			'rule3'      => "<strong>no external job platform links</strong>",
			'rule4'      => "ads must be written in <strong>french</strong> or <strong>english</strong>",
		],
		'contact'       => "For any questions (after having closely read the FAQ) and/or suggestions, you can quickly contact the team here.",
		'faq'           => "After many years of activity, the Myjob team listed the most frequently asked questions here",
		'notifications' => "Despite the number of ads, jobs are scarce. It is possible to set up frequent email notifications in order not to miss any opportunity.",
		'description'   => "The \"<strong>Association Générale des Etudiants</strong>\"of the \"<strong>Ecole Polytechnique Fédérale de Lausanne</strong>\" provides this platform for free, in order to connect student and employers. The goal is to allow students to find easily a job <strong>during their studies</strong>, and in the same time offer employers various and highly qualified profiles.",
		'noinscription' => "No subscription needed, management link is sent by <strong>email</strong>.",
		'tequila'       => "<strong><em>Tequila</em></strong> access necessary.",
		'oldad'         => "Find an old ad back.",
		'newpassword'   => "\"Gaspar\" password lost.",
		'apply'       	=> "To apply, please contact the ad owner directly.",
		'news'          => "Welcome on the new version of Myjob! Help us impoving this big update by reporting everything that looks abnormal or unpractical. Feedback is very appreciated!",
		'forgotten-link'=> "We'll send you an email containing a new management link. Your former link will be disabled.",
		'forgotten-link-success'	=> "An email containing the new management link has been sent.",
		'forgotten-link-error'		=> "No-one published an ad with email :email.",
		'forgotten-link-advices'	=> "If you already created an ad on Myjob, you should have recieved an email containing your management link. If this link was lost or does not work, please ask a new one by providing your email address. Please verify that it is the email address that was used to create the ads.",
        'error' 		=> "Please reload the page and try again. If the error persists and if you think it is abnormal, <a href=\"" . action('HelpController@index') . "\">contact us</a>.",
	],

];
