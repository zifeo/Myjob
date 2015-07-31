@extends('layout')

@section('content')

<div class="row">
	<div class="eleven wide column">

		<h2 class="ui header">Modération</h2>

		<div class="ui two column stackable grid">
			<div class="stretched compact row">
				@forelse ($ads_to_moderate as $ad)
				<div class="column">
					<div class="ui fluid card">
						<div class="content">
							<a class="header" href="{{ url('ad', $ad->url) }}">
								{{ $ad->title }}
							</a>
							<div class="meta">
								{{ $ad->contact_first_name }} {{ $ad->contact_last_name }}
							</div>
							<div class="description">
								<p>{{ $ad->description }}</p>
							</div>
						</div>
						<div class="extra content">
							<div class="ui bulleted list">
								<div class="item">{{ $ad->contact_email or trans('general.unspecified') }}</div>
								<div class="item">{{ $ad->contact_phone or trans('general.unspecified') }}</div>
								<div class="item">{{ $ad->skills or trans('general.unspecified') }}</div>
								<div class="item">{{ $ad->duration or trans('general.unspecified') }}</div>
								<div class="item">{{ $ad->language or trans('general.unspecified') }}</div>
								<div class="item">{{ $category_names[$ad->category_id] }}</div>
								<div class="item"><em>{{ $ad->starts_at }} : {{ $ad->ends_at or $ad->starts_at }} ({{ isset($ad->ends_at) ? floor((strtotime($ad->ends_at) - strtotime($ad->starts_at))/(60*60*24)) : 0 }} j)</em></div>
							</div>
						</div>
						<div class="ui bottom attached three compact buttons">
							<div class="ui green button validation-accept-button" rel="{{ $ad->url }}">{{ trans('general.accept') }}</div>
							<a class="ui orange button" href="{{ url('ad' . $ad->url, 'edit') }}">{{ trans('general.edit') }}</a>
							<div class="ui red button validation-refuse-button" rel="{{ $ad->url }}">{{ trans('general.refuse') }}</div>
						</div>
					</div>
				</div>
				@empty
				<p class="mt">Pas d'annonce à modérer pour le moment.</p>
	           @endforelse
			</div>
		</div>   
	</div>
	
	
	<div class="five wide column">		
		<h3 class="ui header">Activités</h4>
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
		<div class="ui small feed">
			<h3 class="ui header">Logs</h4>
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