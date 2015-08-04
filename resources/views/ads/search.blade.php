@extends('layout.layout')

@section('content')
<div class="row">
	<div class="sixteen wide column ads-list-wrapper">
		
		<div class="ui three column stackable grid">
			<div class="stretched compact row">
				@include('ads.elements.list')
			</div>
		</div>
		
		@include('ads.elements.paginate')
		
	</div>
</div>
@stop