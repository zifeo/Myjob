@extends('layout')

@section('title')
Myjob
@stop

@section('content')
<div class="col-sm-6">
	<div>
		<small class="pull-left">{{{ $ad->category }}}</small>
		<small class="pull-right">Mis à jour {{{ $ad->updated_at->diffForHumans() }}}.</small>
		<div class="clearfix"></div>
	</div>
	<h2>{{{ $ad->title }}}</h2>
	<p>{{{ $ad->description }}}</p>
</div>
<div class="col-sm-6">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h2 class="panel-title">Détails</h2>
		</div>
		<ul class="list-group">
			<li class="list-group-item">Compétence<span class="pull-right">{{{ $ad->skills }}}</span></li>
			<li class="list-group-item">Salaire<span class="pull-right">{{{ $ad->salary }}}</span></li>
			<li class="list-group-item">Lieu<span class="pull-right">{{{ $ad->place }}}</span></li>
			<li class="list-group-item">Langue<span class="pull-right">{{{ $ad->languages }}}</span></li>
			<li class="list-group-item">Période<span class="pull-right">{{{ $ad->starts_at->format('D. j F') }}} - {{{ $ad->ends_at->format('D. j F y') }}}</span></li>
			<li class="list-group-item">Fréquence/durée<span class="pull-right">{{{ $ad->duration }}}</span></li>
		</ul>
	</div>	
	<div class="panel panel-default">
		<div class="panel-heading">
			<h2 class="panel-title">Coordonnées</h2>
		</div>
		<ul class="list-group">
			<li class="list-group-item">Contact<span class="pull-right">{{{ $ad->contact_first_name }}} {{{ $ad->contact_last_name }}}</span></li>
			<li class="list-group-item">Email<span class="pull-right">{{{ $ad->contact_email }}}</span></li>
			<li class="list-group-item">Téléphone<span class="pull-right">{{{ $ad->contact_phone }}}</span></li>
		</ul>
	</div>
</div>
<div class="col-sm-12">
	<a href="" class="btn btn-primary">Mettre hors-ligne</a>
	<a href="{{ route('ad.edit', $ad->url) }}" class="btn btn-warning">Edition</a>
	<a href="" class="btn btn-danger">Supprimer</a>
	<a href="" class="btn btn-default">Refuser</a>
	<a href="" class="btn btn-primary">Postuler</a>
</div>
@stop