@extends('layout')

@section('title')
Myjob
@stop

@section('content')
<div class="col-sm-12">
	<div class="list-group swipe">
		@foreach ($ads as $ad)
		<a href="{{{ URL::to('ad', $ad->url) }}}" class="list-group-item">
			<div class="pull-right small text-right montserra">
				<span><strong>{{{ $ad->title }}}</strong></span><br>
				<span>{{{ $ad->place or 'Non spécifié' }}}</span><br>
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