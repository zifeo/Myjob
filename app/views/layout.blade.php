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
					<form id="search-form" class="form form-inline" action="//search.epfl.ch/web.action">
						<div class="input-group">
							<input id="search-query" class="form-control" type="text" placeholder="Recherche" name="q" />
	  						<label class="hidden" for="search-query">Recherche</label>
							<div class="input-group-btn">
								<button class="btn btn-default" type="button">
								<span class="glyphicon glyphicon-search"></span></button>
	  						</div>
						</div>
	  				</form>
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
							<li class="active"><a href="{{{ URL::to('ad') }}}">Tous les jobs</a></li>
							<li><a href="{{{ URL::to('ad', 'create') }}}">Créer</a></li>
							<li><a href="">Mes alertes</a></li>
							<li><a href="">Modération</a></li>			
							<li><a href="">Options</a></li>		
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li><a href="">Déconnexion</a></li>
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
		  				<p>(c) {{ date('Y') }} · <a href="http://github.com/timozattol">Timothée Lottaz</a>/<a href="http://github.com/zifeo">Teo Stocco</a>.<br><a href="http://agepinfo.ch">AGEPINFO</a>/<a href="http://agepoly.ch">AGEPOLY</a>. Tous droits réservés.<br>MyJob est un service soutenu par l'<a href="http://epfl.ch">EPFL</a>.</p>
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