<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>@yield('title')</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="format-detection" content="telephone=no">
		<link rel="shortcut icon" href="{{ asset('contents/images/favicon.png') }}">
		{{ HTML::style('styles.php') }}
		{{ HTML::script('scripts.php') }}
	</head>
	<body>
		<header class="header-wrapper ui container two column stackable grid">
			<div class="middle aligned column">
				<a href="{{ url('/') }}">
					<h1><img width="360" height="60" src="{{ asset('contents/images/myagep.svg') }}" alt="Myjob"></h1>
				</a>
			</div>
			<div class="right aligned column">
				<div class="lang-selector-wrapper">
					<a class="active item" href="language/set/fr">Français</a>
					<a class="item" href="language/set/en">English</a>
				</div>
				{{ Form::open(['route' => 'ad.search', 'class' => 'search-form-wrapper']) }}
					<div class="ui action input">
						<input type="text" name="q" id="search-query" placeholder="{{ trans('general.search') }}">
						<button class="ui icon button"><i class="search icon"></i></button>
					</div>
				{{ Form::close() }}
			</div>
		</header>
		<div class="menu-wrapper sticky">
			<div class="ui container grid">
				<div class="ui computer tablet only row text inverted menu">
					<a class="item active" href="{{{ URL::to('/') }}}">{{ trans('general.nav_all_jobs') }}</a>
					<a class="item" href="{{{ URL::to('ad', 'create') }}}">{{ trans('general.nav_new_job') }}</a>
					<a class="item" href="{{{ URL::to('moderation')}}}">{{ trans('general.nav_moderation') }}</a>
					<a class="item" href="">{{ trans('general.nav_options') }}</a>
					<a class="item" href="{{{ URL::to('help') }}}">{{ trans('general.nav_help') }}</a>
					<div class="right menu">
						@if (Auth::check())
						<a class="item" href="{{{ URL::to('signout') }}}">{{ trans('general.disconnect') }} ({{{ Auth::user()->casualName() }}})</a>
						@else
						<a class="item" href="{{{ URL::to('signin') }}}">{{ trans('general.connect') }}</a>
						@endif
					</div>
				</div>
				<div class="ui mobile only row text inverted menu">
					<a class="item mobile-menu-toggle">
						<i class="sidebar icon"></i>
						{{ trans('general.nav_all_jobs') }}
					</a>
					<div class="right menu">
						<a class="item">
							{{ trans('general.connect') }}
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="ui left vertical inverted sidebar labeled icon menu">
			<a class="item" href="{{{ URL::to('ad') }}}">
				<i class="home icon"></i>
				{{ trans('general.nav_all_jobs') }}
			</a>
			<a class="item" href="{{{ URL::to('ad', 'create') }}}">
				<i class="add circle icon"></i>
				{{ trans('general.nav_new_job') }}</a>
			<a class="item" href="{{{ URL::to('moderation')}}}">
				<i class="unhide icon"></i>
				{{ trans('general.nav_moderation') }}
			</a>
			<a class="item" href="">
				<i class="options icon"></i>
				{{ trans('general.nav_options') }}
			</a>
			<a class="item" href="{{{ URL::to('help') }}}">
				<i class="comments icon"></i>
				{{ trans('general.nav_help') }}
			</a>
			@if (Auth::check())
			<a class="item" href="{{{ URL::to('signout') }}}">
				<i class="sign out icon"></i>
				{{ trans('general.disconnect') }} ({{{ Auth::user()->casualName() }}})
			</a>
			@else
			<a class="item" href="{{{ URL::to('signin') }}}">
				<i class="sign in icon"></i>
				{{ trans('general.connect') }}
			</a>
			@endif
			<a class="item" href="">
				<i class="chevron circle right icon"></i>
				{{ trans('general.back') }}
			</a>
		</div>
		<div class="ui container message notifications-wrapper">
			<i class="close icon"></i>
			<div class="header">
				Welcome back!
			</div>
			<p>This is a special notification which you can dismiss if you're bored with it.</p>
			@if ($errors->any())
				@include('notifications')
			@endif
		</div>
		<div class="ui container content-wrapper">
			@yield('content')
		</div>
		<footer class="ui container three column stackable grid footer-wrapper">
			<div class="right aligned computer tablet only column">
				<a href="http://agepoly.epfl.ch"><img src="{{ asset('contents/images/agepinfo.svg' )}}" height="120" alt=""></a>
			</div>
			<div class="middle aligned column">
				<p>
					<a href="http://agepinfo.ch">AGEPINFO</a> {{ date('Y') }}<br/> 
					<a href="http://github.com/timozattol">Timothée Lottaz</a> · 
					<a href="http://github.com/zifeo">Teo Stocco</a>
				</p>
			</div>
			<div class="middle aligned computer tablet only column">
				<a href="http://epfl.ch">
			  		<img src="{{ asset('contents/images/epfl.svg') }}" width="120" alt="">
			  	</a>
			</div>
		</footer>
	</body>
</html>