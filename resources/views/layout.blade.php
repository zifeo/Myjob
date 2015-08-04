<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>@yield('title')</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="format-detection" content="telephone=no">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link rel="shortcut icon" href="{{ asset('contents/images/favicon.png') }}">
		{!! HTML::style('styles.php') !!}
		{!! HTML::script('scripts.php?lang=' . App::getLocale()) !!}
	</head>
	<body>
		<header class="header-wrapper ui container two column stackable grid">
			<div class="middle aligned column">
				<a href="{{ $auth ? action('AdController@index'): action('PublicController@index') }}">
					<h1><img width="360" height="60" src="{{ asset('contents/images/myagep.svg') }}" alt="Myjob"></h1>
				</a>
			</div>
			<div class="right aligned column">
				<div class="lang-selector-wrapper">
					<a class="{{ App::getLocale() == 'fr' ? 'active ': ''}}item" href="?lang=fr">Fr<span>ançais</span></a>
					<a class="{{ App::getLocale() == 'en' ? 'active ': ''}}item" href="?lang=en">En<span>glish</span></a>
				</div>
				{!! Form::open(['action' => 'AdController@search']) !!}
					<div class="ui action input">
						{!! Form::text('q', isset($search) ? e($search): null, [
							'placeholder' => trans('general.search')
						]) !!}
						<button class="ui icon basic button"><i class="search icon"></i></button>
					</div>
				{!! Form::close() !!}
			</div>
		</header>
		<div class="menu-wrapper">
			<div class="ui container grid">
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
						{{ menu($action) }}
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
			</div>
		</div>
		<div class="ui container centered stackable grid content-wrapper">
			@yield('content')
		</div>
		<div class="footer-wrapper">
			<footer class="ui container three column stackable grid">
				<div class="right aligned computer tablet only column">
					<a href="http://agepoly.epfl.ch"><img src="{{ asset('contents/images/agepinfo.svg' )}}" height="120" alt=""></a>
				</div>
				<div class="middle aligned column">
					<p>
						<a href="https://agepoly.ch">AGEPINFO</a> {{ date('Y') }}<br> 
						<a href="http://github.com/timozattol">Timothée Lottaz</a> · 
						<a href="http://github.com/zifeo">Teo Stocco</a><br>
						<a href="http://petitesannonces.epfl.ch">Petites annonces</a> · 
						<a href="http://polyhelp.epfl.ch">PolyHelp</a>
					</p>
				</div>
				<div class="middle aligned computer tablet only column">
					<a href="http://epfl.ch">
				  		<img src="{{ asset('contents/images/epfl.svg') }}" width="120" alt="">
				  	</a>
				</div>
			</footer>
		</div>
	</body>
</html>