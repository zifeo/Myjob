@extends('layout.layout')

@section('content')
    <div class="row">
        <div class="seven wide column centered">
            <!-- TODO use trans()-->
            <h2>{{ trans('general.titles.forgotten-link') }}</h2>
            <p>
                {{ trans('general.texts.forgotten-link') }}

            </p>

            <form class="ui form">
                <div class="field">
                    <input type="text" name="email" placeholder="{{ trans('general.placeholders.forgotten-link-mail') }}">
                </div>
                <div class="align-center">
                    <button class="ui red submit button" type="submit">{{ trans('general.buttons.submit.send-short') }}</button>
                </div>
            </form>

        </div>
    </div>
@stop
