<?php
$auth = false;
$publisher = false;
$admin = false;
$action = '';
?>

@extends('layout')

@section('title', '404')

@section('content')
    <div class="row">
        <div class="ten wide column">
            <h3 class="ui header">{{ trans('general.titles.error') }} · 404</h3>
            <p>{!! trans('general.texts.error') !!}</p>
        </div>
    </div>
@stop