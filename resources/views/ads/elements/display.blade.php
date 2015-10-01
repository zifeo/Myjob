<div class="ui internally celled stackable grid segment">
    <div class="row">
        <div class="ten wide column">
            <p>{{ $ad->description }}</p>
        </div>
        <div class="six wide column">
            <div class="ui list">
                <div class="item">
                    <i class="tag icon"></i>

                    <div class="content">
                        {{ $ad->category }}
                    </div>
                </div>
                <div class="item">
                    <i class="wait icon"></i>

                    <div class="content">
                        <span class="calendar">{{ $ad->updated_at }}</span>
                    </div>
                </div>
                <div class="item">
                    <i class="pin icon"></i>

                    <div class="content">
                        {{ $ad->place }}
                    </div>
                </div>
                <div class="item">
                    <i class="user icon"></i>

                    <div class="content">
                        {{ $ad->contact_first_name }} {{ $ad->contact_last_name }}
                    </div>
                </div>
                <div class="item">
                    <i class="mail icon"></i>

                    <div class="content">
                        <a href="mailto:{{ $ad->contact_email }}?subject={{ $ad->title }}">{{ $ad->contact_email }}</a>
                    </div>
                </div>
                @if (isset($ad->contact_phone))
                    <div class="item">
                        <i class="phone icon"></i>

                        <div class="content">
                            {{ $ad->contact_phone }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="eight wide column">
            <div class="ui list">
                <div class="item">
                    <div class="header">{{ label('skills') }}</div>
                    <p>{{ $ad->skills or trans('general.undefined') }}</p>
                </div>
                <div class="item">
                    <div class="header">{{ label('languages') }}</div>
                    <p>{{ $ad->languages or trans('general.undefined') }}</p>
                </div>
            </div>
        </div>
        <div class="eight wide column">
            <div class="ui list">
                <div class="item">
                    <div class="header">{{ trans('general.dates') }}</div>
                    <p>
                        <span class="date">{{ $ad->starts_at }}</span>
                        @if (isset($ad->ends_at))
                            {{ trans('general.todate') }} <span class="date">{{ $ad->ends_at }}</span>
                        @endif
                    </p>
                </div>
                <div class="item">
                    <div class="header">{{ label('duration') }}</div>
                    <p>{{ $ad->duration }}</p>
                </div>
                <div class="item">
                    <div class="header">{{ label('salary') }}</div>
                    <p>{{ $ad->salary }}</p>
                </div>
            </div>
        </div>
    </div>
</div>