@extends('layout')

@section('title')
Myjob
@stop

@section('content')

<div class="col-sm-6">
	<div>
		<small class="pull-left">{{{ $ad->category }}}</small>
		<small class="pull-right">{{ trans('general.updated') }} {{{ $ad->updated_at->diffForHumans() }}}</small>
		<div class="clearfix"></div>
	</div>
	<h2>{{{ $ad->title }}}</h2>
	<p>{{{ $ad->description }}}</p>
</div>
<div class="col-sm-6">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h2 class="panel-title">{{ trans('ads.details_title') }}</h2>
		</div>
		<ul class="list-group">
			<li class="list-group-item">{{ trans('ads.skills') }}<span class="pull-right">{{{ $ad->skills }}}</span></li>
			<li class="list-group-item">{{ trans('ads.salary') }}<span class="pull-right">{{{ $ad->salary }}}</span></li>
			<li class="list-group-item">{{ trans('ads.workplace') }}<span class="pull-right">{{{ $ad->place }}}</span></li>
			<li class="list-group-item">{{ trans('ads.languages') }}<span class="pull-right">{{{ $ad->languages }}}</span></li>
			@if(isset($ad->starts_at, $ad->ends_at))
			<li class="list-group-item">{{ trans('ads.date') }}<span class="pull-right">{{{ $ad->starts_at->format('D. j F') }}} - {{{ $ad->ends_at->format('D. j F y') }}}</span></li>
			@endif
			<li class="list-group-item">{{ trans('ads.indicative_duration') }}<span class="pull-right">{{{ $ad->duration }}}</span></li>
		</ul>
	</div>	
	<div class="panel panel-default">
		<div class="panel-heading">
			<h2 class="panel-title">{{ trans('ads.contact_person') }}</h2>
		</div>
		<ul class="list-group">
			<li class="list-group-item">{{ trans('ads.name') }}<span class="pull-right">{{{ $ad->contact_first_name }}} {{{ $ad->contact_last_name }}}</span></li>
			<li class="list-group-item">{{ trans('ads.email') }}<span class="pull-right">{{{ $ad->contact_email }}}</span></li>
			<li class="list-group-item">{{ trans('ads.phone') }}<span class="pull-right">{{{ $ad->contact_phone }}}</span></li>
		</ul>
	</div>
</div>
<div class="col-sm-12">
	<a href="" class="btn btn-primary">{{ trans('general.put_offline') }}</a>
	<a href="{{ route('ad.edit', $ad->url) }}" class="btn btn-warning">{{ trans('general.edit') }}</a>
	<a href="" class="btn btn-danger">{{ trans('general.delete') }}</a>
	<a href="" class="btn btn-default">{{ trans('general.refuse') }}</a>
	<a href="" class="btn btn-primary">{{ trans('general.apply_job') }}</a>
</div>
@stop