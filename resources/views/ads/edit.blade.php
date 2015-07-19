@extends('layout')

@section('content')

<div class="col-sm-12">

    <h3>{{ trans('ads.modify_title') }}</h3>

    {{ Form::model($ad, [
        'route' => ['ad.update', $ad->url], 
        'class' => 'form-horizontal', 
        'data-toggle' => 'validator',
        'method' => 'PUT']) }}
        
		@include('ads.form') 
		
		<div class="form-group col-sm-4">
			{{ Form::submit(trans('ads.modify_submit'), array('class' => 'btn btn-default')) }}
		</div>
        
    {{ Form::close() }}
</div>

@stop