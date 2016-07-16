@extends('emails.layout')

@section('content')
    <tr id="red" style="background: #c61618;">
        <td id="menu" style="padding: 10px;">
            <table id="elements" width="100%" cellpadding="0" cellspacing="0" style="margin: 0 auto;padding: 0 15px;max-width: 800px;color: #ffffff;">
                <tr>
                    <td class="title" style="font-size: 1.2em;padding: 0;margin: 0;font-family: 'Montserrat', inherit;font-weight: 400;">
                        {{ trans('mails.notifications.newads') }}
                    </td>
                    <td class="right" style="text-align: right;padding: 0;">
                        <a class="inverted button" href="" style="font-family: 'Montserrat', inherit;text-decoration: none;color: #ffffff;background-color: #c61618;border-radius: 5px;text-align: center;padding: 10px 12px;display: inline-block;border: 2px solid #c61618;font-size: 0.95em;border-color: #ffffff;background: transparent;">{{ trans('mails.notifications.gotomyjob') }}</a>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td style="padding: 15px;">
            <table id="corps" width="100%" cellpadding="0" cellspacing="0" style="margin: 0 auto;max-width: 800px;padding: 0 15px;">
                <tr>
                    <td style="padding: 0;">
                        <p>{{ trans('mails.notifications.Hi') }} {{ $user->first_name }},</p>
                        <p>{{ trans('mails.notifications.newjobjustappeared') }}</p>
                    </td>
                </tr>
                @foreach ($ads as $ad)
                    <tr>
                        <td style="padding: 0;">
                            <table id="ad" style="background: #ffffff;box-shadow: 0 1px 3px 0 #bcbdbd,0 0 0 1px #d4d4d5;border-radius: 5px;padding: 10px;margin: 0 0 15px 0;">
                                <tr>
                                    <td style="padding: 0;">
                                        <a href="" class="title" style="font-family: 'Montserrat', inherit;text-decoration: none;color: rgba(0, 0, 0, .8);font-size: 1.2em;padding: 0;margin: 0;font-weight: 400;">{{ $ad->title }}</a>
                                        <div class="fright" style="float: right;">{{ date_format($ad->created_at, 'H:i') }}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 0;">					{{ $category_names[$ad->category_id] }}
                                        <div class="fright" style="float: right;">{{ $ad->place }}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="padding: 0;">
                                        <p>{{ $ad->description }}</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td style="padding: 0;">
                        <a href="{{ action(config('myjob.routes.jobs')) }}" class="ui red button mt" style="font-family: 'Montserrat', inherit;text-decoration: none;color: #ffffff;background-color: #c61618;border-radius: 5px;text-align: center;padding: 10px 12px;display: inline-block;border: 2px solid #c61618;font-size: 0.95em;">{{ trans('mails.notifications.seeads') }}</a>
                        <p><em>{{ trans('mails.notifications.teammyjob') }}</em></p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
@stop