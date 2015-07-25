@extends('layout')

@section('title')
Myjob
@stop

@section('content')
<div class="ui container stackable grid">
	<div class="ten wide column ads-list-wrapper">
		<a href="" title="" class="ui top attached segment">
			<h3>Test</h3>
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
	<div class="six wide column">
		<div class="ui fluid card">
			<div class="content">
				<div class="header">
					Abbreviated Header
				</div>
				<div class="description">
					<p>Blabla<p>
				</div>
			</div>
			<div class="ui two bottom attached buttons">
				<div class="ui button">
						Action 1
				</div>
				<div class="ui button">
					Action 2
				</div>
			</div>
		</div>
		<div class="ui small feed segment">
			<h4 class="ui header">Lastest activity</h4>
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