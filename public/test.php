<?php
function read($url){
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	echo curl_exec($curl);
	curl_close($curl);
}
?>
<!doctype html>
<!--[if lt IE 7]><html lang="en" class="no-js lt-ie10 lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]><html lang="en" class="no-js ie7 lt-ie10 lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html lang="en" class="no-js ie8 lt-ie10 lt-ie9"><![endif]-->
<!--[if IE 9]><html lang="en" class="no-js ie9 lt-ie10"><![endif]-->
<!--[if !IE]><!--><html xmlns="http://www.w3.org/1999/xhtml" lang="en" class="no-js"><!--<![endif]-->
<head>
  <title>Current page title | Website name</title>
  <meta charset="utf-8" />
  <meta name="description" content="" />

  <!-- include http://static.epfl.ch/latest/includes/head-links-neutral.html -->
  <!-- build:remove:release -->
    
  <meta name="viewport" content="width=device-width, initial-scale=1.0" data-header-version="0.13.3" />
  <link rel="shortcut icon" type="image/x-icon" href="//static.epfl.ch/v0.13.3/favicon.ico" />
  <link rel="icon" type="image/png" href="//static.epfl.ch/v0.13.3/favicon.png" />
  <link rel="stylesheet" href="//static.epfl.ch/v0.13.3/styles/neutral-built.css">
  <!-- /build -->

  <!-- include http://static.epfl.ch/latest/includes/head-scripts.html -->
  <!-- build:remove:release -->
  <!--[if lt IE 9]>
  <link id="respond-proxy" rel="respond-proxy" href="//static.epfl.ch/v0.13.3/includes/respond-proxy.html" />
  <script src="//static.epfl.ch/v0.13.3/scripts/ie-built.js"></script>
  <![endif]-->

  
  <!-- /build -->

</head>
<body>

  <!-- Accessible quick navigation links -->
  <nav class="a11y" role="navigation" aria-label="Quick navigation links">
    <a class="visuallyhidden focusable" href="#content" accesskey="c">Skip to content</a>
    <a class="visuallyhidden focusable" href="#main-navigation" accesskey="n">Skip to navigation</a>
  </nav>

  <div id="page" class="site site-wrapper" itemscope itemtype="http://schema.org/WebPage">

    <!-- The header -->
    <header id="epfl-header" class="site-header epfl" role="banner" aria-label="Global banner">

      <!-- The logo -->
      <div class="logo">
        <a href="...">
          <span class="visuallyhidden">Homepage</span>
          <object type="image/svg+xml" class="logo-object" data="../images/logo.svg">
            <img alt="Logo" width="95" height="46" src="http://www.zifeo.com/~agepinfo/myjob/public/contents/images/logoEpfl.png" />
          </object>
        </a>
      </div>

      <!-- The search form -->
      <div class="search search-simple">
        <a href="#search" class="icon icon-magnifier" data-widget="toggle">
          <span class="visuallyhidden">Search</span>
        </a>
        <div id="search" class="visible-s visible-m visible-l visible-xl visible-xxl" role="search">
          <form class="form form-inline" action="//search.epfl.ch/web.action">
            <div class="form-input-group">
              <label class="visuallyhidden" for="search-query">Search query</label>
              <input id="search-query" class="search-query" type="text" placeholder="search query" name="q" accesskey="4" />
              <button class="search-submit" type="submit">
                <span class="icon icon-magnifier"></span><span class="visuallyhidden">Search</span>
              </button>
            </div>
          </form>
        </div>
      </div>

    </header>

    <!-- The site header -->
    <header id="header" class="site-header">

      <!-- The site title -->
      <h1 class="site-title" itemprop="isPartOf" itemscope itemtype="http://schema.org/CollectionPage">
        <a href="..." itemprop="url" accesskey="1" rel="home"><span itemprop="name">The <abbr title="A long description for the site acronym">site</abbr> title</span></a>
      </h1>

      <!-- The breadcrumb navigation -->
      <nav class="nav nav-inline bcnav" role="navigation" itemprop="breadcrumb">
        <ol class="nav-list">
          <li class="nav-item" itemprop="sourceOrganization" itemscope itemtype="http://schema.org/CollegeOrUniversity">
            <a class="nav-link" href="..." itemprop="url"><span itemprop="name">Website name</span></a>
          </li>
          <li class="nav-item nav-item-active">
            <a class="nav-link" href="...">Current page</a>
          </li>
        </ol>
      </nav>

      <!-- The language selector -->
      <nav class="nav nav-inline lang" role="navigation" aria-label="Language selector">
        <ul class="nav-list">
          <li class="nav-item nav-item-active">
            <a class="nav-link" href="..." lang="en">
              <span class="visuallyhidden">Current language: </span>
              <span class="visuallyhidden-xxs visuallyhidden-xs">English</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="..." lang="fr" ref="alternate">
              <span class="visuallyhidden">Switch language to: </span>
              <span class="visuallyhidden-xxs visuallyhidden-xs">français</span>
            </a>
          </li>
        </ul>
      </nav>

      <!-- The main/horizontal navigation -->
      <div class="mainnav">
        <a id="main-navigation-label" class="hidden visible-xxs visible-xs" href="#main-navigation" data-widget="collapse">Main navigation</a>

        <nav id="main-navigation" class="nav nav-block nav-horizontal visible-s visible-m visible-l visible-xl visible-xxl" role="navigation" aria-labelledby="main-navigation-label">
          <ul class="nav-list" data-widget="menubar">
            <li class="nav-item">
              <span class="nav-link" data-widget="collapse">Menu 1 [dropdown]</span>
              <ul class="nav-list nav-vertical" data-widget="menu">
                <li class="nav-item">
                  <a class="nav-link" href="...">Menu 1.1</a>
                  <ul class="nav-list">
                    <li class="nav-item">
                      <a class="nav-link" href="...">Menu 1.1.1</a>
                    </li>
                    <!-- ... -->
                  </ul>
                </li>
                <!-- ... -->
              </ul>
            </li>
            <li class="nav-item nav-item-active">
              <a class="nav-link" href="...">Menu 2 [combo]</a>
              <span data-widget="collapse"></span>
              <ul class="nav-list nav-vertical" data-widget="menu">
                <li class="nav-item">
                  <a class="nav-link" href="...">Menu 2.1</a>
                  <ul class="nav-list">
                    <li class="nav-item">
                      <a class="nav-link" href="...">Menu 2.1.1</a>
                    </li>
                    <!-- ... -->
                  </ul>
                </li>
                <!-- ... -->
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="...">Menu 3 [combo]</a>
              <span data-widget="collapse"></span>
              <ul class="nav-list nav-vertical" data-widget="menu">
                <li class="nav-item">
                  <a class="nav-link" href="...">Menu 3.1</a>
                  <ul class="nav-list">
                    <li class="nav-item">
                      <a class="nav-link" href="...">Menu 3.1.1</a>
                    </li>
                    <!-- ... -->
                  </ul>
                </li>
                <!-- ... -->
              </ul>
            </li>
            <!-- ... -->
          </ul>
        </nav>

      </div>

      <!-- The tools bar -->
      <div id="tools" class="tools">
        <div role="toolbar" aria-label="Page tools">
          <a class="btn btn-inline" href="?print"><span class="icon icon-print_button themed"></span>Print</a>
          <a class="btn btn-inline" href="?share"><span class="icon icon-share_button themed"></span>Share</a>
        </div>
      </div>

    </header>

    <!-- The page content -->
    <main id="content" role="main" class="site-content page page-wrapper" itemprop="mainContentOfPage">

      <!-- The main column -->
      <div class="g-span-2_3 g-span-s-1_1">

        <!-- The page header -->
        <header class="page-header">
          <h1 class="page-title">Current page title</h1>
        </header>

        <!-- The page content -->
        <div class="page-content">

          <em>the page content</em>

        </div>

        <!-- The page footer -->
        <footer class="page-footer">

        </footer>

      </div>

      <!-- The side bar -->
      <div class="g-span-1_3 g-span-s-1_1">
        <aside id="sidebar" class="sidebar" role="complementary">

          <!-- The secondary/vertical navigation -->
          <section id="secondaty-navigation" class="localnav panel">
            <nav class="nav nav-block nav-vertical" role="navigation">
              <ul class="nav-list" data-widget="tree">
                <li class="nav-item">
                  <a class="nav-link" href="...">Level 1 item</a>
                  <ul class="nav-list" role="group">
                    <li class="nav-item">
                      <a class="nav-link" href="...">Level 2 item</a>
                      <ul class="nav-list" role="group">
                        <li class="nav-item nav-item-active">
                          <a class="nav-link" href="...">Level 3 item</a>
                          <ul class="nav-list" role="group">
                            <li class="nav-item">
                              <a class="nav-link" href="...">Level 4 item</a>
                                <ul class="nav-list" role="group">
                                  <li class="nav-item">
                                    <a class="nav-link" href="...">Level 5 item</a>
                                  </li>
                                  <!-- ... -->
                                </ul>
                            </li>
                            <!-- ... -->
                          </ul>
                        </li>
                        <!-- ... -->
                      </ul>
                    </li>
                    <!-- ... -->
                  </ul>
                </li>
                <!-- ... -->
              </ul>
            </nav>
          </section>

          <!-- A sidebar box -->
          <section class="panel">
            <h2 class="panel-header">Side box 1</h2>
            <div class="panel-content">
              <!-- ... -->
            </div>
          </section>

        </aside>
      </div>

    </main>

    <!-- The site footer -->
    <footer id="footer" class="site-footer" role="contentinfo">
      <nav class="nav nav-inline" role="navigation">
        <ul class="nav-list">
          <li class="nav-item">
            <a class="nav-link" href="#header" accesskey="t">Back to top</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="..." accesskey="3">Sitemap</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="mailto:..." accesskey="9">Webmaster</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://www.epfl.ch/accessibility.html" accesskey="0"><meta itemprop="accessibilityAPI" content="ARIA"/>Accessibility</a>
          </li>
          <li class="nav-item secondary-content"><meta itemprop="lastReviewed" content="..."/>...</li>
          <li class="nav-item secondary-content"> &copy; <span itemprop="copyrightHolder">Company</span> <span itemprop="copyrightYear">2014</span></li>
          <li class="nav-item login">
            <a class="nav-link" href="..."><span class="icon icon-lock-locked"></span>Login</a>
          </li>
        </ul>
      </nav>
    </footer>

  </div>

  <!-- Footer scripts -->
  <!-- include http://static.epfl.ch/latest/includes/foot-scripts.html -->
  <!-- build:remove:release -->
    
  <script src="//static.epfl.ch/v0.13.3/scripts/epfl-jquery-built.js"></script>
  <!-- /build -->
  <script>
    require(["epfl-jquery"], function($){
      "use strict";

      // Custom scripts

      $(function() {
        // Custom scripts to execute after the document has fully loaded
      });

    });
  </script>

</body>
</html>


<?php /*





<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Myjobsdfsd</title>
		
		<?php read('http://static.epfl.ch/latest/includes/head-neutral.html');?>
		
		
		<!--<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="format-detection" content="telephone=no">
		<link rel="shortcut icon" href="http://www.zifeo.com/~agepinfo/myjob/public/contents/images/favicon.ico">
		<link media="all" type="text/css" rel="stylesheet" href="http://www.zifeo.com/~agepinfo/myjob/public/styles.php">
		<script src="http://www.zifeo.com/~agepinfo/myjob/public/scripts.php"></script>-->
	</head>
	<body>
	<nav class="a11y" role="navigation">
  <a class="nav-link visuallyhidden focusable" href="#content" accesskey="c">Skip to content</a>
  <a class="nav-link visuallyhidden focusable" href="#main-navigation" accesskey="n">Skip to navigation</a>
</nav>
	 <header id="epfl-header" class="site-header epfl" role="banner" aria-label="Global EPFL banner" data-ajax-header="//static.epfl.ch/latest/includes/epfl-header.en.html">

  <div class="logo">
    <a href="http://www.epfl.ch">
      <span class="visuallyhidden">EPFL Homepage</span>
      <object type="image/svg+xml" class="logo-object" data="//static.epfl.ch/latest/images/logo.svg">
        <img alt="EPFL Logo" width="95" height="46" src="//static.epfl.ch/latest/images/logo.png" />
      </object>
    </a>
  </div>

  <div class="search search-simple">
    <a href="#search" class="icon icon-magnifier" data-widget="toggle">
      <span class="visuallyhidden">Search</span>
    </a>
    <div id="search" role="search">
      <form id="search-form" class="form form-inline" action="//search.epfl.ch/web.action">
        <div class="form-input-group">
          <label class="visuallyhidden" for="search-query">Search query</label>
          <input id="search-query" class="search-query" type="text" placeholder="search query" name="q" accesskey="4" />
          <button class="themed search-submit" type="submit">
            <span class="icon icon-magnifier"></span><span class="visuallyhidden">Search</span>
          </button>
        </div>
      </form>
    </div>
  </div>

</header>

<h1 class="site-title" itemprop="isPartOf" itemscope itemtype="http://schema.org/CollectionPage">
  <a href="..." itemprop="url" accesskey="1">
    <span itemprop="name">
      <span class="visuallyhidden-xs visuallyhidden-xxs">The </span>
      <abbr title="A long description for the site acronym">site</abbr>
      <span class="visuallyhidden-xs visuallyhidden-xxs"> title</span>
    </span>
  </a>
</h1>

<nav class="nav nav-inline bcnav" role="navigation" itemprop="breadcrumb">
  <ol class="nav-list">
    <li class="nav-item" itemprop="sourceOrganization" itemscope itemtype="http://schema.org/CollegeOrUniversity">
      <a class="nav-link" href="http://www.epfl.ch" itemprop="url"><span itemprop="name">EPFL</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="...">Parent page</a>
    </li>
    <!-- ... -->
    <li class="nav-item nav-item-active">
      <a class="nav-link" href="...">Current page</a>
    </li>
  </ol>
</nav>

<nav class="nav nav-inline lang" role="navigation">
  <ul class="nav-list">
    <li class="nav-item nav-item-active">
      <a class="nav-link" href="..." lang="en"><span class="visuallyhidden-xxs visuallyhidden-xs">English</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="..." lang="fr" ref="alternate"><span class="visuallyhidden-xxs visuallyhidden-xs">français</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="..." lang="de" ref="alternate"><span class="visuallyhidden-xxs visuallyhidden-xs">Deutsch</span></a>
    </li>
    <!-- ... -->
  </ul>
</nav>

<div id="tools" class="tools">
  <div role="toolbar" aria-label="Page tools">
    <a class="btn btn-inline" href="?print"><span class="icon icon-print_button themed"></span>Print</a>
    <a class="btn btn-inline" href="?share"><span class="icon icon-share_button themed"></span>Share</a>
    <!-- ... -->
  </div>
</div>

<div class="mainnav">
  <a id="main-navigation-label" class="hidden visible-xxs visible-xs" href="#main-navigation" data-widget="collapse">Main navigation</a>
  <nav id="main-navigation" class="nav nav-block nav-horizontal themed visible-s visible-m visible-l visible-xl visible-xxl" role="navigation" aria-labelledby="main-navigation-label">
    <ul class="nav-list" data-widget="menubar">
      <li class="nav-item">
        <span class="nav-link" data-widget="collapse">Menu 1 [dropdown]</span>
        <ul class="nav-list nav-vertical" data-widget="menu">
          <li class="nav-item">
            <a class="nav-link" href="...">Menu 1.1</a>
            <ul class="nav-list">
              <li class="nav-item">
                <a class="nav-link" href="...">Menu 1.1.1</a>
              </li>
              <!-- ... -->
            </ul>
          </li>
          <!-- ... -->
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="...">Menu 2 [combo]</a>
        <span data-widget="collapse"></span>
        <ul class="nav-list nav-vertical" data-widget="menu">
          <li class="nav-item">
            <a class="nav-link" href="...">Menu 2.1</a>
            <ul class="nav-list">
              <li class="nav-item">
                <a class="nav-link" href="...">Menu 2.1.1</a>
              </li>
              <!-- ... -->
            </ul>
          </li>
          <!-- ... -->
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="...">Menu 3 [combo]</a>
        <span data-widget="collapse"></span>
        <ul class="nav-list nav-vertical" data-widget="menu">
          <li class="nav-item">
            <a class="nav-link" href="...">Menu 3.1</a>
            <ul class="nav-list">
              <li class="nav-item">
                <a class="nav-link" href="...">Menu 3.1.1</a>
              </li>
              <!-- ... -->
            </ul>
          </li>
          <!-- ... -->
        </ul>
      </li>
      <!-- ... -->
    </ul>
  </nav>
</div>


		<header>
			<div class="row">
				<a id="logo"><img src="http://www.zifeo.com/~agepinfo/myjob/public/contents/images/logo.svg" alt=""></h1></a>
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
				<div class="col-sm-12">




	<div class="list-group swipe">
		<a href="#" class="list-group-item active">
			<div class="side-info">
				<span><strong>Assistanat</strong></span>
				<span>Lausanne-Flon</span>
				<span>Il y a 1 jour</span>
			</div>
			<h4 class="list-group-item-heading">List group item heading</h4>
			<p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
			<div class="clearfix"></div>
		</a>
		<a href="#" class="list-group-item">
			<div class="side-info">
				<span><strong>Aide à domicile</strong></span>
				<span>123456789012345</span>
				<span>12 septembre 2014</span>
			</div>
			<h4 class="list-group-item-heading">List group item heading</h4>
			<p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
			<div class="clearfix"></div>
		</a>
		<a href="#" class="list-group-item">
					<div class="pull-right small text-right montserra"><strong>Cobaye</strong><br>Il y a 1 jour</div>

			<h4 class="list-group-item-heading">Lorem ipsum dolor sit amet, consectetur cras amet</h4>
			<p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
		</a>
		<a href="#" class="list-group-item">
			<h4 class="list-group-item-heading">List group item heading</h4>
			<p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
		</a>
		<a href="#" class="list-group-item">
			<h4 class="list-group-item-heading">List group item heading</h4>
			<p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
		</a>
		<a href="#" class="list-group-item">
			<h4 class="list-group-item-heading">List group item heading</h4>
			<p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
		</a>
	</div>
</div>
			</div>
		</div>
		<footer>
			<div class="row">
				<div class="rights">
					<p class="partner">(c) 2014 <a href="http://agepinfo.ch">AGEPINFO</a>. Tous droits réservés.</p>
				</div>
				<div class="partner pull-right">
					<a href="http://agepoly.epfl.ch/"><img src="http://www.zifeo.com/~agepinfo/myjob/public/contents/images/logoAgepoly.svg" alt=""></a>
					<a href="http://www.epfl.ch"><img src="http://www.zifeo.com/~agepinfo/myjob/public/contents/images/logoEpfl.svg" alt=""></a>
				</div>
			</div>
		</footer>
	</body>
</html>*/