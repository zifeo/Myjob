@extends('layout')

@section('content')

<div class="col-sm-12">

    <h3>{{ trans('ads.new_ad_title') }}</h3>

    {{ Form::open([
        'action' => 'AdController@store', 
        'class' => 'form-horizontal', 
        'data-toggle' => 'validator']) }}
        
		@include('ads.form')
		
		<div class="form-group col-sm-4">
			{{ Form::submit(trans('ads.new_ad_submit'), array('class' => 'btn btn-default')) }}
		</div>

    {{ Form::close() }}
</div>

@stop