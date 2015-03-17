@extends('layout')

@section('title')
Myjob
@stop

@section('content')
<div class="col-sm-12">
	{{{ $ad->title }}}<br>
	{{{ $ad->description }}}<br>
	<a href="{{{ route('ad.edit', $ad->url) }}}">edit</a>
</div>
@stop