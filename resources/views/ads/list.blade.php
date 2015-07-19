@extends('layout')

@section('title')
Myjob
@stop

@section('content')
<div class="ui container grid">
	<div class="ten wide column ads-list-wrapper">
		<a href="" title="" class="ui top attached segment">
			<h3>Test</h3>
			<p>This segment is on top</p>
		</a>
		<a href="" title="" class="ui attached segment">
			<p>This segment is attached on both sides</p>
		</a>
		<a href="" title="" class="ui bottom attached segment">
			<p>This segment is on bottom</p>
		</a>	
	</div>
	<div class="six wide column">
		<p>Test</p>
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