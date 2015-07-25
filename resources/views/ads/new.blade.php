@extends('layout')

@section('content')

<div class="row">
	<div class="ten wide column">
	
	    <h2 class="ui header">{{ trans('ads.new_ad_title') }}</h2>

	    {!! Form::open([
	        'action' => 'AdController@store', 
	        'class' => 'ui form', 
	        'data-toggle' => 'validator']) !!}

		@include('ads.form') 
	
	    {!! Form::close() !!}
	</div>
	<div class="six wide column">
		<h3 class="ui header">Gestion de l'annonce</h3>
		<p>Il existe deux façons de gérer l'annonce. Pour les collaborateurs et les étudiants de l'EPFL, il est possible de se connecter au moyen de Tequila puis d'aller dans la rubrique "mes annonces". Pour les autres, il suffit de cliquer sur le lien envoyé à la création de l'annonce ou d'en redemander. Dans tous les cas, <strong>l'annonce est visible durant 15 jours</strong>, durée après laquelle il faut la renouveller.</p>
		<a class="ui red button mt" href="{{ url('help') }}">Récupérer une annonce</a>
		<h3 class="ui header">Conditions d'acceptation</h3>
		<p>L'annonce doit respecter les critères suivants pour être validée, au risque de pas être acceptée :</p>
		<ol class="ui list">
			<li>cible un étudiant bachelor, master ou edoc</li>
			<li><strong>pas de lien de postulation extérieure</strong></li>
			<li>respect du tarif minimum : <strong>CHF 24.—/h</strong></li>
		</ol>
		<a class="ui red button mt" href="{{ url('help') }}">Question ?</a>
	</div>
</div>

@stop