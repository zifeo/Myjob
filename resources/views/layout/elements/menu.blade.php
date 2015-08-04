@if ($auth)
<div class="ui computer tablet only row text inverted menu">
	{!! item('jobs', $action) !!}
	{!! item('newjob', $action) !!}
	@if ($admin)
	{!! item('moderation', $action) !!}
	@endif
	{!! item('options', $action) !!}
	{!! item('help', $action) !!}
	<div class="right menu">
		<a class="item" href="{{ action('PublicController@disconnect') }}">
			{{ trans('general.nav.disconnect') }} · {{ $user }}
		</a>
	</div>
</div>
<div class="ui mobile only row text inverted icon menu">
	<a class="item mobile-menu-toggle">
		<i class="sidebar large icon"></i>
		{{ $title or 'Myjob' }}
	</a>
	<div class="right menu">
		{!! item('disconnect', $action) !!}
	</div>
</div>
<div class="ui left vertical inverted sidebar labeled icon menu">
	{!! item('jobs', $action, 'home') !!}
	{!! item('newjob', $action, 'add circle') !!}
	@if ($admin)
	{!! item('moderation', $action, 'unhide') !!}
	@endif
	{!! item('options', $action, 'options') !!}
	{!! item('help', $action, 'comments') !!}
	{!! item('disconnect', $action, 'sign out') !!}
	<a class="item mobile-menu-toggle">
		<i class="chevron circle right icon"></i>
		{{ trans('general.back') }}
	</a>
</div>
@else
<div class="ui computer tablet only row text inverted menu">
	{!! item('home', $action) !!}
	{!! item('newjob', $action) !!}
	{!! item('help', $action) !!}
	<div class="right menu">
		{!! item('connect', $action) !!}
	</div>
</div>
<div class="ui mobile only row text inverted icon menu">
	<a class="{{ $action == 'PublicController@index' ? 'active ': '' }}item" href="{{ action('PublicController@index') }}">
		<i class="home large icon"></i>
	</a>
	{!! item('newjob', $action) !!}
	{!! item('help', $action) !!}
	<div class="right menu">
		{!! item('connect', $action) !!}
	</div>
</div>
@endif