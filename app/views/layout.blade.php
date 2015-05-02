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
					<div id="lang-selector">
		  				<ul class="">
		  					<li><a href="#">Français</a></li>
		  					<li><a href="#">English</a></li>
						</ul>
	  				</div>
	  				{{ Form::open(['route' => 'ad.search', 'class' => 'form form-inline', 'id' => 'search-form']) }}
						<div class="input-group">
							<input id="search-query" class="form-control" type="text" placeholder="Recherche" name="q" value="{{{ $searchTerms or '' }}}" />
	  						<label class="hidden" for="search-query">Recherche</label>
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
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand visible-xs" href="">Current page</a>
					</div>
					<div class="collapse navbar-collapse" id="nav-panel">
						<ul class="nav navbar-nav">
							<li class="active"><a href="{{{ URL::action('PublicController@index') }}}">Accueil</a></li>
							<li class="active"><a href="{{{ URL::action('AdController@index') }}}">Tous les jobs</a></li>
							<li><a href="{{{ URL::action('AdController@create') }}}">Créer</a></li>
							<li class="active"><a href="">Toutes mes annonces</a></li>
							<li><a href="">Options</a></li>
							<li><a href="{{{ URL::action('PublicController@help') }}}">Aide</a></li>				
							<li><a href="{{{ URL::action('ModerationController@adsToModerate') }}}">Modération</a></li>			
						</ul>
						<ul class="nav navbar-nav navbar-right">
							{{{ var_dump(Auth::check(), Auth::user(), Session::all()) }}}
							@if (Auth::check())
								<li><a href="{{{ URL::to('signout') }}}">Déconnexion ({{{ Auth::user()->casualName() }}})</a></li>
							@else
								<li><a href="{{{ URL::to('signin') }}}">Connexion</a></li>
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
		  				<p>(c) {{ date('Y') }} · <a href="http://github.com/timozattol">Timothée Lottaz</a>/<a href="http://github.com/zifeo">Teo Stocco</a>.<br><a href="http://agepinfo.ch">AGEPINFO</a>/<a href="http://agepoly.ch">AGEPOLY</a>. Tous droits réservés.<br>Service soutenu officiellement par l'<a href="http://epfl.ch">EPFL</a>.</p>
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