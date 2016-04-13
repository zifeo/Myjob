@extends('layout.layout')

@section('content')
    <div class="row">
        <div class="seven wide column centered">
            <h2>{{ trans('general.titles.forgotten-link') }}</h2>
            <p>{{ trans('general.texts.forgotten-link') }}</p>
            {!! Form::open([
                'action' => 'PublicController@postForgottenLink',
                'class' => 'ui form',
            ]) !!}
                <div class="field">
                    <input type="text" name="email" placeholder="{{ trans('general.placeholders.forgotten-link-mail') }}">
                </div>
                <div class="align-center">
                    <button class="ui red submit button" type="submit">{{ trans('general.buttons.submit.send-short') }}</button>
                </div>
            {!! Form::close() !!}

        </div>
    </div>
@stop
