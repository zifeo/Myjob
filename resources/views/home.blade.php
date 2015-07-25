@extends('layout')

@section('content')
<div class="six wide column padded">
	<h2 class="ui center aligned header">Adopte un étudiant EPF</h4>
	<p>L'<strong>Association Générale des Etudiants</strong> de l'<strong>Ecole Polytechnique Fédérale de Lausanne</strong> met gratuitement à disposition cette plateforme pour mettre en relation étudiants et employeurs. Le but est de permettre à tous les étudiants de trouver facilement un petit job/emploi <strong>durant</strong> leurs études. Et en même temps, d'offrir aux employeurs une vaste audience de profils variés et qualifiés selon les dernières technologies.</p>
	<div class="ui two statistics">
		<div class="red small statistic">
			<div class="value">
				5550
			</div>
			<div class="label">
				Consultations
			</div>
		</div>
		<div class="red small statistic">
			<div class="value">
				234
			</div>
			<div class="label">
				Annonces
			</div>
		</div>
	</div>
</div>
<div class="five wide middle aligned column">
	<h2 class="ui center aligned icon header">
		<i class="suitcase icon"></i>
		Employeurs
	</h2>
	<button class="ui large red button">Je recherche un étudiant</button>
	<div class="ui list">
		<div class="item">Aucune inscription, gestion par email.</div>
		<a class="item">Raccourci collaborateur EPFL</a>
		<a class="item">Retrouver une ancienne annonce</a>
	</div>
</div>
<div class="five wide middle aligned column">
	<h2 class="ui center aligned icon header">
		<i class="student icon"></i>
		Etudiants
	</h2>
	<button class="ui large red button">Je recherche un job</button>
	<div class="ui list">
		<div class="item">Accès Gaspar requis, via Tequila.</div>
		<a class="item" href="https://gaspar.epfl.ch/cgi-bin/gaspar-web/lostpwd">Recevoir un nouveau mot de passe</a>
		<a class="item">Informations étudiants hors-EPFL</a>
	</div>
</div>
@stop