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
							<div class="right floated">{{ $category_names[$ad->category_id] }}</div>
							<a class="header" href="{{ url('ad', $ad->url) }}">
								{{ $ad->title }}
							</a>
							<div class="meta">
								<span class="right floated">{{ $ad->contact_first_name }} {{ $ad->contact_last_name }}</span>
								{{ $ad->place }}
							</div>
							<div class="description">
								<p>{{ $ad->description }}</p>
							</div>
						</div>
						<div class="extra content">
							<div class="ui bulleted list">
								<div class="item">{{ $ad->duration }}</div>
								<div class="item">{{ $ad->salary }}</div>
								<div class="item">{{ $ad->contact_email }}</div>
								@if (isset($ad->skills))<div class="item">{{ $ad->skills }}</div>@endif
								@if (isset($ad->languages))<div class="item">{{ $ad->languages }}</div>@endif
								@if (isset($ad->contact_phone))<div class="item">{{ $ad->contact_phone }}</div>@endif
							</div>
						</div>
						<div class="ui bottom attached three compact buttons">
							<div class="ui green button validation-accept" rel="{{ $ad->url }}">{{ trans('ads.buttons.accept') }}</div>
							<a class="ui orange button" href="{{ action('AdController@edit', $ad->url) }}">{{ trans('ads.buttons.edit') }}</a>
							<div class="ui red button validation-refuse" rel="{{ $ad->url }}">{{ trans('ads.buttons.refuse') }}</div>
						</div>
					</div>
				</div>
				@empty
				<p class="mt">{{ trans('ads.texts.nothingleft') }}</p>
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