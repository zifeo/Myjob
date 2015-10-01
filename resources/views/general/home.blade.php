@extends('layout.layout')

@section('content')
    <div class="row">
        <div class="six wide column padded">

            @include('general.elements.welcome')

        </div>
        <div class="five wide middle aligned column">

            @include('general.elements.publishers')

        </div>
        <div class="five wide middle aligned column">

            @include('general.elements.students')

        </div>
    </div>
@stop