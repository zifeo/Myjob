@extends('layout')

@section('title')
Myjob
@stop

@section('content')

<div class="row">
	<div class="eleven wide column ads-list-wrapper">
		<h2 class="ui header">Derniers jobs</h2>

		<div class="ui two column stackable grid">
			
			@forelse ($ads as $ad)
			<div class="column">
				<a class="ui card" href="{{ URL::to('ad', $ad->url) }}">
					<div class="content">
						<div class="right floated">{{ $ad->place or trans('general.unspecified') }}</div>
						<div class="header">{{ $ad->title }}</div>
						<div class="meta">
							<span class="right floated time">{{ $ad->start_at }}</span>
							<span class="category">{{ $ad->category }}</span>
						</div>
						<div class="description">
							<p>{{ $ad->description }}</p>
						</div>
					</div>
				</a>
			</div>
			@empty
			<p class="mt">Pas d'annonce pour le moment.</p>
			@endforelse
		</div>
	
	</div>
	<div class="five wide column">
		<h3 class="ui header">MyJob nouvelles</h3>
		<p>Bienvenue sur la nouvelle version ! Aide-nous à améliorer cette grande mise à jour en signalant tout ce qui te parait anormal ou peu pratique. On attend avec impatience tes remarques et suggestions !</p>
		<a class="ui small red button mt" href="{{ url('help') }}">Feedback</a>
		<h3 class="ui header">Lastest activity</h3>
		<div class="ui small feed">
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
@stop