@extends('layout')

@section('title')
Myjob
@stop

@section('content')

<div class="row">
	<div class="eleven wide column">
		
		<h2 class="ui header">
			{{ $ad->title }}
			@if (! $ad->validated)<span class="ui teal horizontal label">not yet validated</span>@endif
			@if (expired($ad))<span class="ui orange horizontal label">disabled</span>@endif
		</h2>
		<div class="ui internally celled stackable grid segment">
			<div class="row">
				<div class="ten wide column">
					<p>{{ $ad->description }}</p>
				</div>
				<div class="six wide column">
					<div class="ui list">
						<div class="item">
							<i class="tag icon"></i>
							<div class="content">
								{{ $ad->category }}
							</div>
						</div>
						<div class="item">
							<i class="wait icon"></i>
							<div class="content">
								<span class="calendar">{{ $ad->updated_at }}</span>
							</div>
						</div>
						<div class="item">
							<i class="pin icon"></i>
							<div class="content">
								{{ $ad->place }}
							</div>
						</div>
						<div class="item">
							<i class="user icon"></i>
							<div class="content">
								{{ $ad->contact_first_name }} {{ $ad->contact_last_name }}
							</div>
						</div>
						<div class="item">
							<i class="mail icon"></i>
							<div class="content">
								<a href="mailto:{{ $ad->contact_email }}?subject={{ $ad->title }}">{{ $ad->contact_email }}</a>
							</div>
						</div>
						@if (isset($ad->contact_phone))
						<div class="item">
							<i class="phone icon"></i>
							<div class="content">
								{{ $ad->contact_phone }}
							</div>
						</div>
						@endif
					</div>
				</div>
			</div>
			<div class="row">
				<div class="eight wide column">
					<div class="ui list">
						<div class="item">
							<div class="header">{{ label('skills') }}</div>
							<p>{{ $ad->skills or trans('ads.undefined') }}</p>
						</div>
						<div class="item">
							<div class="header">{{ label('languages') }}</div>
							<p>{{ $ad->languages or trans('ads.undefined') }}</p>
						</div>
					</div>
				</div>
				<div class="eight wide column">
					<div class="ui list">
						<div class="item">
							<div class="header">{{ trans('ads.dates') }}</div>
							<p>
								<span class="date">{{ $ad->starts_at }}</span>
								@if (isset($ad->ends_at))
								{{ trans('ads.todate') }} <span class="date">{{ $ad->ends_at }}</span>
								@endif
							</p>
  						</div>
  						<div class="item">
							<div class="header">{{ label('duration') }}</div>
							<p>{{ $ad->duration }}</p>
  						</div>
  						<div class="item">
							<div class="header">{{ label('salary') }}</div>
							<p>{{ $ad->salary }}</p>
  						</div>
					</div>
				</div>
			</div>
		</div>
	
		<div class="align-center mt">
			<a href="javascript:history.back()" class="ui grey button mt">{{ trans('general.back') }}</a>
			<a href="mailto:{{ $ad->contact_email }}?subject={{ $ad->title }}" class="ui red button mt">{{ trans('general.apply_job') }}</a>
		</div>
		<div class="align-center">
			<div class="ui buttons mt">
				@if (! isset($ad->validated) && $admin)
				<a href="{{ action('ModerationController@accept', $ad->url) }}" class="ui green icon button">
					<i class="checkmark icon"></i>
					{{ trans('ads.buttons.accept') }}
				</a>
				<a href="{{ action('AdController@edit', $ad->url) }}" class="ui orange icon button">
					<i class="write icon"></i>
					{{ trans('ads.buttons.edit') }}
				</a>
				<a href="{{ action('ModerationController@refuse', $ad->url) }}" class="ui red icon button">
					<i class="remove icon"></i>
					{{ trans('ads.buttons.refuse') }}
				</a>
				@else
				@if ($ad->expires_at <= formatDate())
				<a href="{{ action('ModerationController@enable', $ad->url) }}" class="ui green icon button">
					<i class="unhide icon"></i>
					{{ trans('ads.buttons.renew') }}
				</a>
				@else
				<a href="{{ action('ModerationController@disable', $ad->url) }}" class="ui grey icon button">
					<i class="hide icon"></i>
					{{ trans('ads.buttons.disable') }}
				</a>
				@endif
				<a href="{{ action('AdController@edit', $ad->url) }}" class="ui orange icon button">
					<i class="write icon"></i>
					{{ trans('ads.buttons.edit') }}
				</a>
				<div class="ui red icon button ad-delete">
					<i class="remove icon"></i>
					{{ trans('ads.buttons.delete') }}
				</div>
				@endif
			</div>
		</div>
		
		<div class="ui small basic modal" id="confirm-delete">
			<i class="close icon"></i>
			<div class="ui icon header">
				<i class="trash icon"></i>
				{{ trans('ads.titles.confirmdeletion') }}
			</div>
			<div class="content align-center">
				<p>{{ trans('ads.texts.confirmdeletion') }}<br>{{ trans('ads.texts.definitivedeletion') }}</p>
				@if (expired($ad))<p><strong>{{ trans('ads.texts.alreadydisable') }}</strong></p>@endif
				<a href="{{ action('ModerationController@disable', $ad->url) }}" class="ui green inverted button mt">
					<i class="hide icon"></i>
					{{ trans('ads.buttons.disable') }}
				</a>
				<a href="{{ action('AdController@destroy', $ad->url) }}" class="ui red inverted button mt">
					<i class="checkmark icon"></i>
					{{ trans('ads.buttons.delete') }}
				</a>
			</div>
		</div>
		
	</div>
	<div class="computer tablet only five wide column">
		<h3 class="ui header">Conseils de postulation</h3>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut maximus, lacus ac volutpat dictum, arcu urna venenatis tellus, in tempus arcu ligula a ante. Mauris mattis, lorem sed pharetra lacinia, justo tellus ultricies purus, ac placerat augue ante et quam. Quisque id pretium turpis.</p>
		<h3 class="ui header">Historique de l'annonce</h3>
		<div class="ui small feed">
			<div class="event">
				<div class="content">
					<div class="summary">
						<a>Looking for repetiteur</a> created
						<div class="date">
						  1 Hour Ago
						</div>
					</div>
				</div>
			</div>
			<div class="event">
				<div class="content">
					<div class="summary">
						<a>Looking for repetiteur</a> validated
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