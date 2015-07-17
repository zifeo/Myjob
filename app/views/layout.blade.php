<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>@yield('title')</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="format-detection" content="telephone=no">
		<link rel="shortcut icon" href="{{ asset('contents/images/favicon.ico') }}">
		{{ HTML::style('styles.php') }}
		{{ HTML::script('scripts.php') }}
	</head>
	<body>
		<div class="header-wrapper container-fluid">
			<header class="row">
				<div id="logo">
					<a href="{{ url('/') }}">
						<h1><img width="360" height="60" src="{{ asset('contents/images/myagep.svg') }}" alt="Myjob"></h1>
					</a>
				</div>
<<<<<<< HEAD

				<div id="lang-selector">
					<form class="hidden" name="set_language" action="/language/set" method="POST">
						<input id="language" name="language"></input>
					</form>

					<ul>
						<li>
							<a href="#" onclick="document.getElementById('language').value='fr'; document.set_language.submit()">
								Français
							</a>
						</li>
						<li>
							<a href="#" onclick="document.getElementById('language').value='en'; document.set_language.submit()">
								English
							</a>
						</li>
					</ul>
				</div>


	  				{{ Form::open(['route' => 'ad.search', 'class' => 'form form-inline', 'id' => 'search-form']) }}
						<div class="input-group">
							<input id="search-query" class="form-control" type="text" placeholder="Recherche" name="q" value="{{{ $searchTerms or '' }}}" />
	  						<label class="hidden" for="search-query">{{ trans('general.search') }}</label>
							<div class="input-group-btn">
								<button class="btn btn-default" type="submit">
									<span class="glyphicon glyphicon-search"></span>
								</button>
	  						</div>
						</div>
					{{ Form::close() }}
			</header>
		</div>
		<div class="nav-wrapper container-fluid">
			<div class="row">
				<nav class="navbar" role="navigation">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav-panel">
							<span class="sr-only">{{ trans('general.toggle_navigation') }}</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand visible-xs" href="">Current page<!-- TODO current page name --></a>
					</div>
					<div class="collapse navbar-collapse" id="nav-panel">
						<ul class="nav navbar-nav">
							<li class="active"><a href="{{{ URL::to('ad') }}}">{{ trans('general.nav_all_jobs') }}</a></li>
							<li><a href="{{{ URL::to('ad', 'create') }}}">{{ trans('general.nav_new_job') }}</a></li>
							<li><a href="">{{ trans('general.nav_notifications') }}</a></li>
							<li><a href="{{{ URL::to('moderation')}}}">{{ trans('general.nav_moderation') }}</a></li>			
							<li><a href="">{{ trans('general.nav_options') }}</a></li>
							<li><a href="{{{ URL::to('help') }}}">{{ trans('general.nav_help') }}</a></li>		
						</ul>
						<ul class="nav navbar-nav navbar-right">
							@if (Auth::check())
								<li><a href="{{{ URL::to('signout') }}}">{{ trans('general.disconnect') }} ({{{ Auth::user()->casualName() }}})</a></li>
							@else
								<li><a href="{{{ URL::to('signin') }}}">{{ trans('general.connect') }}</a></li>
							@endif
						</ul>
					</div>
				</nav>
			</div>
		</div>
		<div class="content-wrapper container-fluid">			
			<div class="row">
				@if($errors->any())
					@include('notifications')
				@endif
				@yield('content')
			</div>
		</div>
		<div class="footer-wrapper container-fluid">
			<footer class="row">
				<div id="commons" class="">
	  				<div id="commons">
		  				<p>
		  					<a href="http://agepinfo.ch">AGEPINFO</a> · &#169; {{ date('Y') }}<br/> 
		  					<a href="http://github.com/timozattol">Timothée Lottaz</a> / 
		  					<a href="http://github.com/zifeo">Teo Stocco</a>
		  				</p>
		  				<div class="pull-left hidden-xs" id="agepinfo">
			  				<a href="http://agepoly.epfl.ch/">
				  				<img src="{{asset('contents/images/agepinfo.svg')}}" height="120" alt="">
				  			</a>
		  				</div>
						<div class="pull-right hidden-xs" id="epfl">
							<a href="http://epfl.ch/">
				  				<img src="{{asset('contents/images/epfl.svg')}}" class="media-object" width="120" alt="">
				  			</a>
						</div>
	  				</div>
				</div>
			</footer>
		</div>
	</body>
</html>