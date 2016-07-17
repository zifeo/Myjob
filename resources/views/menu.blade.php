<div class="ui computer tablet only row text inverted menu">
    {!! item('home', $action) !!}
    @if ($auth || $publisher)
        {!! item('myjobs', $action) !!}
    @endif
    {!! item('newjob', $action) !!}
    @if ($admin)
        {!! item('moderation', $action) !!}
    @endif
    @if ($auth)
        {!! item('options', $action) !!}
    @endif
    {!! item('help', $action) !!}
    <div class="right menu">
        @if ($auth || $publisher)
            <a class="item" href="{{ action('HomeController@disconnect') }}">
                {{ trans('general.nav.disconnect') }} · {{ $user or $user_email }}
            </a>
        @else
            {!! item('connect', $action) !!}
        @endif
    </div>
</div>
<div class="ui mobile only row text inverted icon menu">
    <a class="item mobile-menu-toggle">
        <i class="sidebar large icon"></i>
        {{ $title or 'Myjob' }}
    </a>

    <div class="right menu">
        @if ($auth || $publisher)
            {!! item('disconnect', $action) !!}
        @else
            {!! item('connect', $action) !!}
        @endif
    </div>
</div>
<div class="ui left vertical inverted sidebar labeled icon menu">
    {!! item('home', $action, 'home') !!}
    @if ($auth || $publisher)
        {!! item('myjobs', $action, 'browser') !!}
    @endif
    {!! item('newjob', $action, 'add circle') !!}
    @if ($admin)
        {!! item('moderation', $action, 'unhide') !!}
    @endif
    @if ($auth)
        {!! item('options', $action, 'options') !!}
    @endif
    {!! item('help', $action, 'comments') !!}
    @if ($auth || $publisher)
        {!! item('disconnect', $action, 'sign out') !!}
    @else
        {!! item('connect', $action, 'sign in') !!}
    @endif
    <a class="item mobile-menu-toggle">
        <i class="chevron circle right icon"></i>
        {{ trans('general.back') }}
    </a>
</div>
