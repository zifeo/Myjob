@extends('layout')

@section('title')
Myjob
@stop

@section('content')

<div class="row">
	<div class="eleven wide column">
		
		<h2 class="ui header">{{ $ad->title }}</h2>
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
							<i class="pin icon"></i>
							<div class="content">
								{{ $ad->place }}
							</div>
						</div>
						<div class="item">
							<i class="wait icon"></i>
							<div class="content">
								<span class="calendar">{{ $ad->updated_at }}</span>
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
							<div class="header">{{ trans('ads.skills') }}</div>
							<p>{{ $ad->skills }}</p>
						</div>
						<div class="item">
							<div class="header">{{ trans('ads.languages') }}</div>
							<p>{{ $ad->languages }}</p>
						</div>
					</div>
				</div>
				<div class="eight wide column">
					<div class="ui list">
						<div class="item">
							<div class="header">{{ trans('ads.date') }}</div>
							<p>
								<span class="date">{{ $ad->starts_at }}</span>
								@if (isset($ad->ends_at))
								- <span class="date">{{ $ad->starts_at }}</span>
								@endif
							</p>
  						</div>
  						<div class="item">
							<div class="header">{{ trans('ads.indicative_duration') }}</div>
							<p>{{ $ad->duration }}</p>
  						</div>
					</div>
				</div>
			</div>
		</div>
	
		<div class="align-center mt">
			<a href="javascript:history.back()" class="ui grey button mt">Revenir</a>
			<a href="mailto:{{ $ad->contact_email }}?subject={{ $ad->title }}" class="ui red button mt">{{ trans('general.apply_job') }}</a>
			<div class="ui buttons mt">
				@if (!isset($ad->validated_at) && $admin)
				<a href="" class="ui green icon button">
					<i class="checkmark icon"></i>
					{{ trans('general.accept') }}
				</a>
				<a href="{{ route('ad.edit', $ad->url) }}" class="ui orange icon button">
					<i class="write icon"></i>
					{{ trans('general.edit') }}
				</a>
				<a href="" class="ui red icon button">
					<i class="remove icon"></i>
					{{ trans('general.refuse') }}
				</a>
				@else
				<a href="" class="ui grey icon button">
					<i class="hide icon"></i>
					{{ trans('general.put_offline') }}
				</a>
				<a href="" class="ui green icon button">
					<i class="unhide icon"></i>
					{{ trans('general.put_offline') }}
				</a>
				<a href="{{ route('ad.edit', $ad->url) }}" class="ui orange icon button">
					<i class="write icon"></i>
					{{ trans('general.edit') }}
				</a>
				<a href="" class="ui red icon button">
					<i class="remove icon"></i>
					{{ trans('general.delete') }}
				</a>
				@endif
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