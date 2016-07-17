@extends('layout')

@section('content')
    <div class="row">
        <div class="eight wide column">
            @include('publishers.elements.form')
        </div>
        <div class="five wide column">
            @include('publishers.elements.advices')
        </div>
    </div>
@stop
