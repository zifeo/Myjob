@extends('layout.layout')

@section('content')
<div class="row">
	<div class="eleven wide column">

		<h2 class="ui header">Modération</h2>

		<div class="ui two column stackable grid">
			<div class="stretched compact row">
				
				@include('ads.elements.moderate')
				
			</div>
		</div>
		   
	</div>
	<div class="five wide column">		
		
		@include('ads.elements.activity')
		
	</div>
</div>
@stop