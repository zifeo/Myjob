@extends('layout')

@section('content')

<div class="row">
	<div class="ten wide column">
	
	    <h2 class="ui header">{{ trans('ads.titles.new') }}</h2>

	    {!! Form::open([
	        'action' => 'AdController@store', 
	        'class' => 'ui form validation'
	    ]) !!}

			@include('ads.form')
			
						<button type="submit" class="ui red submit button mt">{{ trans('ads.buttons.submit.edit') }}</button>

			<div class="align-center">
				<div class="ui red submit button mt">{{ trans('ads.buttons.submit.new') }}</div>
			</div>
							
	    {!! Form::close() !!}
	</div>
	<div class="six wide column">
		<h3 class="ui header">Gestion de l'annonce</h3>
		<p>Il existe deux façons de gérer l'annonce. Pour les collaborateurs et les étudiants de l'EPFL, il est possible de se connecter au moyen de Tequila puis d'aller dans la rubrique "mes annonces". Pour les autres, il suffit de cliquer sur le lien envoyé à la création de l'annonce ou d'en redemander. Dans tous les cas, <strong>l'annonce est visible durant 15 jours</strong>, durée après laquelle il faut la renouveler.</p>
		<a class="ui small red icon button mt" href="{{ url('help') }}">
			<i class="repeat icon"></i>
			Récupérer une annonce
		</a>
		<h3 class="ui header">Conditions d'acceptation</h3>
		<p>L'annonce doit respecter les critères suivants pour être validée, au risque de pas être acceptée :</p>
		<ol class="ui list">
			<li>cible un étudiant <strong>durant</strong> ses études à l'EPFL</li>
			<li>respect du tarif minimum : <strong>CHF 24.—/h</strong></li>
			<li><strong>pas de lien de postulation extérieure</strong></li>
		</ol>
		<a class="ui small red button mt" href="{{ url('help') }}">
			<i class="help icon"></i>
			Poser une question
		</a>
	</div>
</div>

@stop