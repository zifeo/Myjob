@extends('emails.layout')

@section('title', trans('mails.publishers.link'))

@section('content')
    <tr>
        <td>
            <table id="corps" width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td>
                        @include('ads.elements.display')
                        <div class="align-center">
                            <div class="ui buttons mt">
                                <a href="{{ action('ModerationController@accept', $ad->url) }}" class="ui green icon button">
                                    <i class="checkmark icon"></i>
                                    {{ trans('general.buttons.accept') }}
                                </a>
                                <a href="{{ action('AdController@edit', $ad->url) }}" class="ui orange icon button">
                                    <i class="write icon"></i>
                                    {{ trans('general.buttons.edit') }}
                                </a>
                                <a href="{{ action('ModerationController@refuse', $ad->url) }}" class="ui red icon button">
                                    <i class="remove icon"></i>
                                    {{ trans('general.buttons.refuse') }}
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
@stop
