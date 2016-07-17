@extends('emails.layout')

@section('title', trans('mails.notifications.newads'))

@section('content')
    <tr>
        <td>
            <table id="corps" width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td>
                        <p>{{ trans('mails.notifications.hi') }} {{ $user->first_name }},</p>
                        <p class="spacer">{{ trans('mails.notifications.newjobjustappeared') }}</p>
                    </td>
                </tr>
                @foreach ($ads as $ad)
                    <tr>
                        <td>
                            <a href="{{ action('AdController@show', $ad->url) . '?tequila' }}">
                                <table id="ad">
                                    <tr>
                                        <td>
                                            <span class="title">{{ $ad->title }}</span>
                                            <div class="fright">{{ date_format($ad->created_at, 'H:i') }}</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>					{{ $category_names[$ad->category_id] }}
                                            <div class="fright">{{ $ad->place }}</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <p>{{ $ad->description }}</p>
                                        </td>
                                    </tr>
                                </table>
                            </a>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td>
                        <a href="{{ action('AdController@index') }}" class="ui red button mt">{{ trans('mails.notifications.seeads') }}</a>
                        <p>{{ trans('mails.notifications.teammyjob') }}</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
@stop