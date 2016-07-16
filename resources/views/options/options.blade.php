@extends('layout')

@section('content')
    <div class="row">
        <div class="eleven wide column">

            {!! Form::model($options, [
                'action' => 'OptionsController@update',
                'class' => 'ui form',
                'method' => 'PUT'
            ]) !!}

            @include('options.elements.mails')

            <div class="align-center">
                <button type="submit" class="ui red submit button">{{ trans('general.buttons.submit.update') }}</button>
            </div>

            {!! Form::close() !!}

        </div>
        <div class="five wide column">

            @include('options.elements.notifications')

        </div>
    </div>
@stop