@extends('layout')

@section('content')
    <div class="row">
        <div class="ten wide column">
            @include('publishers.elements.form')
        </div>
        <div class="six wide column">
            @include('publishers.elements.advices')
        </div>
    </div>
@stop
