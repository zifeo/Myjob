<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>@yield('title')</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="format-detection" content="telephone=no">
		<link rel="shortcut icon" href="{{asset('contents/images/favicon.ico')}}">
		{{ HTML::style('styles.php') }}
		{{ HTML::script('scripts.php') }}
	</head>
	<body>
		<div class="header-wrapper container-fluid">
			<header class="row">
				<div class=".col-xs-4">
					<a id="logo"><h1><img width="120" height="60" src="{{asset('contents/images/logoMyjob.svg')}}" alt=""></h1></a>
				</div>
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
							<li class="active"><a href="">Tous les jobs</a></li>
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
			</footer>
		</div>
		<!--
		<header>
			<div class="row">
				<a id="logo"><img src="{{asset('contents/images/logo.svg')}}" alt=""></h1></a>
				<a id="lang">English</a>
			</div>
		</header>
		<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid row">
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
						<li class="active"><a href="">Tous les jobs</a></li>
						<li><a href="">Mes alertes</a></li>
						<li><a href="">Modération</a></li>			
						<li><a href="">Options</a></li>			
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="">Déconnexion</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<div id="content">
			<div class="row">
				@yield('content')
			</div>
		</div>
		<footer>
			<div class="row">
				<div class="rights">
					<p class="partner">(c) 2014 <a href="http://agepinfo.ch">AGEPINFO</a>. Tous droits réservés.</p>
				</div>
				<div class="partner pull-right">
					<a href="http://agepoly.epfl.ch/"><img src="{{asset('contents/images/logoAgepoly.svg')}}" alt=""></a>
					<a href="http://www.epfl.ch"><img src="{{asset('contents/images/logoEpfl.svg')}}" alt=""></a>
				</div>
			</div>
		</footer>
		-->
	</body>
</html>