@extends('layout.layout')

@section('content')
<div class="row">
	<div class="eight wide column">
		
	    <h2 class="ui header">{{ trans('help.faq_title') }}</h2>

		@include('general.elements.faq')
		
	</div>
	<div class="eight wide column">
		
	    <h2 class="ui header">{{ trans('help.contact_us') }}</h2>

		<p>{{ trans('help.contact_us_text') }}</p>
		
		@include('general.elements.contact')
		
	</div>
</div>
@stop