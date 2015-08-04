@extends('layout.layout')

@section('content')
<div class="row">
	<div class="eight wide column">
		
		<h2 class="ui header">{{ trans('general.titles.faq') }}</h2>
		
		<p>{{ trans('general.texts.faq') }}</p>

		@include('general.elements.faq')
		
	</div>
	<div class="eight wide column">
		
		<h2 class="ui header">{{ trans('general.titles.contact') }}</h2>
		
		<p>{{ trans('general.texts.contact') }}</p>
		
		@include('general.elements.contact')
		
	</div>
</div>
@stop