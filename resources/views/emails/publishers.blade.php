@extends('emails.layout')

@section('title', trans('mails.publishers.link'))

@section('content')
    <tr>
        <td>
            <table id="corps" width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td>
                        <p>{{ trans('mails.publishers.hello') }},</p>
                        <p class="spacer">{{ trans('mails.publishers.thanks') }}</p>
                        <a href="{{ action('AdController@manage_ads_with_email', [$email, $secret]) }}" class="ui red button mt">{{ trans('mails.publishers.manage') }}</a>
                        <p>{{ trans('mails.publishers.teammyjob') }}</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
@stop
