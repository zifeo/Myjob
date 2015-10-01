@extends('layout.layout')

@section('content')
    <div class="row">
        <div class="ten wide column">

            {!! Form::open([
                'action' => 'AdController@store',
                'class' => 'ui form validation'
            ]) !!}

            @include('ads.elements.form')

            <div class="align-center">
                <div class="ui red submit button">{{ trans('general.buttons.submit.new') }}</div>
            </div>

            {!! Form::close() !!}
        </div>
        <div class="six wide column">

            @include('ads.elements.rules')

        </div>
    </div>
@stop