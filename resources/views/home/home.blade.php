@extends('layout.layout')

@section('content')
    <div class="row">
        <div class="six wide column padded">

            @include('home.elements.welcome')

        </div>
        <div class="five wide middle aligned column">

            @include('publishers.publishers')

        </div>
        <div class="five wide middle aligned column">

            @include('home.elements.students')

        </div>
    </div>
@stop