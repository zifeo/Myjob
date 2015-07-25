@extends('layout')

@section('content')
	<div class="row">
	<div class="six wide column padded">
		<h2 class="ui center aligned header">Adopte un étudiant EPFL</h2>
		<p>L'<strong>Association Générale des Etudiants</strong> de l'<strong>Ecole Polytechnique Fédérale de Lausanne</strong> met gratuitement à disposition cette plateforme pour mettre en relation étudiants et employeurs. Le but est de permettre à tous les étudiants de trouver facilement un petit job/emploi <strong>durant leurs études</strong>. Et en même temps, d'offrir aux employeurs une vaste audience de profils variés et qualifiés selon les dernières technologies.</p>
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
		<a class="ui large red button" href="{{ url('ad', 'create') }}">Je recherche un étudiant</a>
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
		<a class="ui large red button" href="{{ url('connect') }}">Je recherche un job</a>
		<div class="ui list">
			<div class="item">Accès Gaspar requis, via Tequila.</div>
			<a class="item" href="https://gaspar.epfl.ch/cgi-bin/gaspar-web/lostpwd">Recevoir un nouveau mot de passe</a>
			<a class="item" href="{{ url('help') }}">Informations étudiants hors-EPFL</a>
		</div>
	</div>
</div>
@stop