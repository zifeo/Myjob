<?php
$auth = false;
$publisher = false;
$admin = false;
$action = '';
?>

@extends('layout')

@section('content')
    <div class="row">
        <div class="ten wide column">
            <h3 class="ui header">{{ trans('general.titles.error') }} · @yield('title')</h3>
            <p>{!! trans('general.texts.error') !!}</p>
        </div>
    </div>
@stop