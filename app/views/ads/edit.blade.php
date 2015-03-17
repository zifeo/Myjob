@extends('layout')

@section('content')

<div class="col-sm-12">

    <h3>Edition</h3>

    {{ Form::model($ad, [
        'route' => ['ad.update', $ad->url], 
        'class' => 'form-horizontal', 
        'data-toggle' => 'validator',
        'method' => 'PUT']) }}
        
		@include('ads.form') 
		
		<div class="form-group col-sm-4">
			{{ Form::submit('Modifier l\'annonce', array('class' => 'btn btn-default')) }}
		</div>
        
    {{ Form::close() }}
</div>

@stop