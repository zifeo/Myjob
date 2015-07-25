@extends('layout')

@section('title')
Myjob
@stop

@section('content')

<div class="row">
	<div class="ten wide column">
		<h2 class="ui header">Derniers jobs</h2>

		<a href="" title="" class="ui top attached segment">
			<h3 class="">Test</h3>
			<p>This segment is on top</p>
		</a>
		<a href="" title="" class="ui attached segment">
			<p>This segment is attached on both sides</p>
		</a>
		<a href="" title="" class="ui attached segment">
			<p>This segment is attached on both sides</p>
		</a>
		<a href="" title="" class="ui bottom attached segment">
			<p>This segment is on bottom</p>
		</a>	
	</div>
	<div class="five wide column">
		<h3 class="ui header">MyJob nouvelles</h3>
		<p>Bienvenue sur la nouvelle version ! Aide-nous à améliorer cette grande mise à jour en <a href="{{ url('help') }}">signalant</a> tout ce qui te parait anormal ou peu pratique. On attend avec impatience tes remarques et commentaires.<br>Tim & Teo</p>
		<div class="ui small feed">
			<h3 class="ui header">Lastest activity</h3>
			<div class="event">
				<div class="content">
					<div class="summary">
						<a>Looking for repetiteur</a> posted
						<div class="date">
						  1 Hour Ago
						</div>
					</div>
				</div>
			</div>
			<div class="event">
				<div class="content">
					<div class="summary">
						<a>Looking for repetiteur</a> seen
						<div class="date">
						  1 Hour Ago
						</div>
					</div>
				</div>
			</div>
			<div class="event">
				<div class="content">
					<div class="summary">
						<a>Looking for repetiteur</a> updated
						<div class="date">
						  1 Hour Ago
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="col-sm-12">
	<div class="list-group swipe">
		@foreach ($ads as $ad)
		<a href="{{{ URL::to('ad', $ad->url) }}}" class="list-group-item">
			<div class="pull-right small text-right montserra">
				<span><strong>{{{ $ad->category }}}</strong></span><br>
				<span>{{{ $ad->place or trans('general.unspecified') }}}</span><br>
				<span>{{{ $ad->start_at }}}</span>
			</div>
			<h4 class="list-group-item-heading">{{{ $ad->title }}}</h4>
			<p class="list-group-item-text">{{{ $ad->description }}}</p>
			<div class="clearfix"></div>
		</a>
		@endforeach
	</div>
</div>
@stop