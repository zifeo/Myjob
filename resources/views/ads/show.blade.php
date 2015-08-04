@extends('layout.layout')

@section('title', $ad->title)

@section('content')
<div class="row">
	<div class="eleven wide column">
		
		<h2 class="ui header">
			{{ $ad->title }}
			@if (! $ad->validated)<span class="ui teal horizontal label">not yet validated</span>@endif
			@if (expired($ad))<span class="ui orange horizontal label">disabled</span>@endif
		</h2>
		
		@include('ads.elements.display')
	
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
		
		@include('ads.elements.advices')
		
		@include('ads.elements.history')
		
	</div>
</div>
@stop