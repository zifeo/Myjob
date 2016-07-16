@extends('layout')

@section('content')
    <div class="row">
        <div class="seven wide column centered">
            <h2>{{ trans('general.titles.forgotten-link') }}</h2>
            <p>{{ trans('general.texts.forgotten-link') }}</p>
            {!! Form::open([
                'action' => 'PublishersController@postForgottenLink',
                'class' => 'ui form',
            ]) !!}
            @if ($errors->any())
                <div class="ui error visible message">
                    <ul class="list">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
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
