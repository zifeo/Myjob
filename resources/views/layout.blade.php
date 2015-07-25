<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>@yield('title')</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="format-detection" content="telephone=no">
		<link rel="shortcut icon" href="{{ asset('contents/images/favicon.png') }}">
		{!! HTML::style('styles.php') !!}
		{!! HTML::script('scripts.php') !!}
	</head>
	<body>
		<header class="header-wrapper ui container two column stackable grid">
			<div class="middle aligned column">
				<a href="@if ($auth) {{  url('ad') }} @else {{ url('/') }} @endif">
					<h1><img width="360" height="60" src="{{ asset('contents/images/myagep.svg') }}" alt="Myjob"></h1>
				</a>
			</div>
			<div class="right aligned column">
				<div class="lang-selector-wrapper">
					<a class="active item" href="language/set/fr">Fr<span>ançais</span></a>
					<a class="item" href="language/set/en">En<span>glish</span></a>
				</div>
				{!! Form::open(['route' => 'ad.search', 'class' => 'search-form-wrapper']) !!}
					<div class="ui action input">
						<input type="text" name="q" id="search-query" placeholder="{{ trans('general.search') }}">
						<button class="ui icon button"><i class="search icon"></i></button>
					</div>
				{!! Form::close() !!}
			</div>
		</header>
		<div class="menu-wrapper">
			<div class="ui container grid">
				@if ($auth)
				<div class="ui computer tablet only row text inverted menu">
					<a class="item active" href="{{ url('ad') }}">
						{{ trans('general.nav_all_jobs') }}
					</a>
					<a class="item" href="{{ url('ad', 'create') }}">
						{{ trans('general.nav_new_job') }}
					</a>
					@if ($admin)
					<a class="item" href="{{ url('moderation')}}">
						{{ trans('general.nav_moderation') }}
					</a>
					@endif
					<a class="item" href="">
						{{ trans('general.nav_options') }}
					</a>
					<a class="item" href="{{ url('help') }}">
						{{ trans('general.nav_help') }}
					</a>
					<div class="right menu">
						<a class="item" href="{{ url('reset') }}">
							{{ trans('general.disconnect') }} · {{ $user }}
						</a>
					</div>
				</div>
				<div class="ui mobile only row text inverted icon menu">
					<a class="item mobile-menu-toggle">
						<i class="sidebar large icon"></i>
						<span id="current-nav-state">{{ trans('general.nav_all_jobs') }}</span>
					</a>
					<div class="right menu">
						<a class="item" href="{{ url('reset') }}">
							{{ trans('general.disconnect') }}
						</a>
					</div>
				</div>
				<div class="ui left vertical inverted sidebar labeled icon menu">
					<a class="item" href="{{ url('ad') }}">
						<i class="home icon"></i>
						{{ trans('general.nav_all_jobs') }}
					</a>
					<a class="item" href="{{ url('ad', 'create') }}">
						<i class="add circle icon"></i>
						{{ trans('general.nav_new_job') }}
					</a>
					@if ($admin)
					<a class="item" href="{{ url('moderation')}}">
						<i class="unhide icon"></i>
						{{ trans('general.nav_moderation') }}
					</a>
					@endif
					<a class="item" href="">
						<i class="options icon"></i>
						{{ trans('general.nav_options') }}
					</a>
					<a class="item" href="{{ url('help') }}">
						<i class="comments icon"></i>
						{{ trans('general.nav_help') }}
					</a>
					<a class="item" href="{{ url('reset') }}">
						<i class="sign out icon"></i>
						{{ trans('general.disconnect') }}
					</a>
					<a class="item" href="">
						<i class="chevron circle right icon"></i>
						{{ trans('general.back') }}
					</a>
				</div>
				@else
				<div class="ui computer tablet only row text inverted menu">
					<a class="item" href="{{ url('') }}">
						{{ trans('general.nav_home') }}
					</a>
					<a class="item" href="{{ url('ad', 'create') }}">
						{{ trans('general.nav_new_job') }}
					</a>
					<a class="item" href="{{ url('help') }}">
						{{ trans('general.nav_help') }}
					</a>
					<div class="right menu">
						<a class="item" href="{{ url('connect') }}">
							{{ trans('general.connect') }}
						</a>
					</div>
				</div>
				<div class="ui mobile only row text inverted icon menu">
					<a class="item" href="{{ url('') }}">
						<i class="home large icon"></i>
					</a>
					<a class="item" href="{{ url('ad', 'create') }}">
						{{ trans('general.nav_new_job') }}
					</a>
					<a class="item" href="{{ url('help') }}">
						{{ trans('general.nav_help') }}
					</a>
					<div class="right menu">
						<a class="item" href="{{ url('connect') }}">
							{{ trans('general.connect') }}
						</a>
					</div>
				</div>
				@endif
			</div>
		</div>
		@if ($errors->any())
		<div class="ui container red clearing segment grid notifications-wrapper">
			<div class="middle aligned doubling two wide column">
				<i class="announcement big icon"></i>
			</div>
			<div class="column">
				<h4 class="header">{{ trans('error') }}</h4>
				<p>{{ $errors->first() }}Test</p>
			</div>
		</div>
		@endif
		<div class="ui container centered stackable grid content-wrapper">
			@yield('content')
		</div>
		<footer class="ui container three column stackable grid footer-wrapper">
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
	</body>
</html>