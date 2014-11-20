@extends('layout')

@section('title')
Myjob
@stop

@section('content')
<div class="col-sm-12">
	{{{ $ad->title }}}<br>
	{{{ $ad->description }}}<br>
	<a href="{{{ URL::to('ad', [$ad->url, 'edit']) }}}">edit</a>
</div>
@stop