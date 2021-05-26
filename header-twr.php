<!doctype html>

<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!-->
<html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // Google Chrome Frame for IE ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title><?php wp_title('&raquo;','true','right'); ?><?php bloginfo('name'); ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
		<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/lib/images/apple-touch-icon-57x57.png?v=7kkx85J96K">
		<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/lib/images/apple-touch-icon-60x60.png?v=7kkx85J96K">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/lib/images/apple-touch-icon-72x72.png?v=7kkx85J96K">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/lib/images/apple-touch-icon-76x76.png?v=7kkx85J96K">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/lib/images/apple-touch-icon-114x114.png?v=7kkx85J96K">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/lib/images/apple-touch-icon-120x120.png?v=7kkx85J96K">
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/lib/images/apple-touch-icon-144x144.png?v=7kkx85J96K">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/lib/images/apple-touch-icon-152x152.png?v=7kkx85J96K">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/lib/images/apple-touch-icon-180x180.png?v=7kkx85J96K">
		<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/lib/images/favicon-32x32.png?v=7kkx85J96K" sizes="32x32">
		<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/lib/images/favicon-194x194.png?v=7kkx85J96K" sizes="194x194">
		<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/lib/images/favicon-96x96.png?v=7kkx85J96K" sizes="96x96">
		<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/lib/images/android-chrome-192x192.png?v=7kkx85J96K" sizes="192x192">
		<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/lib/images/favicon-16x16.png?v=7kkx85J96K" sizes="16x16">
		<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/lib/images/manifest.json?v=7kkx85J96K">
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/lib/images/favicon.ico?v=7kkx85J96K">
		<meta name="msapplication-TileColor" content="#11684e">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/lib/images/mstile-144x144.png?v=7kkx85J96K">
		<meta name="msapplication-config" content="<?php echo get_template_directory_uri(); ?>/lib/images/browserconfig.xml?v=7kkx85J96K">
		<meta name="theme-color" content="#ffffff">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/lib/css/ecs-overrides.min.css">
		<?php // end of wordpress head ?>

		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-69449442-1', 'auto');
		  ga('send', 'pageview');

		</script>
	</head>

	<body <?php body_class($class = 'page-twr'); ?>>

		<header class="header-wrapper header-wrapper-twr" role="banner">

			<div class="navbar navbar-default">

				<div class="container-fluid">

					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="<?php bloginfo('url'); ?>/дърво-с-корен/"></a>
					</div>

					<div class="collapse navbar-collapse navbar-responsive-collapse navbar-right navbar-wrapper">
						<?php wp_bootstrap_twr_nav(); // Adjust using Menus in Wordpress Admin ?>
						<ul class="nav navbar-nav">
		          <li class="dropdown">
		            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-search"></i></a>
		            <ul class="dropdown-menu" style="padding:12px;">
		                <form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>" class="form-inline">
		                	<div class="form-group pull-right">
		                		<label class="sr-only" for="">Search for:</label>
		                		<div class="input-group">
		                			<input type="text" class="form-control" type="text" value="" name="s" id="s" placeholder="<?php _e("Search","wpbootstrap"); ?>">
		                			<div class="input-group-btn">
		                				<button type="submit" id="searchsubmit" class="btn btn-success"><i class="glyphicon glyphicon-search"></i></button>
		                			</div>
		                		</div>
		                	</div>
		                </form>
		              </ul>
		          </li>
		        </ul>

		        <?php echo qtranxf_generateLanguageSelectCode('text'); ?>
		        <script>jQuery(document).ready(function(){
		        	jQuery('.qtranxs_language_chooser').addClass('nav navbar-nav');
		        	})
		        </script>

					</div>

				</div> <!-- end .navbar -->

			</div>

		</header> <!-- end header -->

		<div class="flexwrap">

		<div class="container-fluid container-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<?php if ( function_exists('yoast_breadcrumb') ) {
						yoast_breadcrumb('<p id="breadcrumbs">','</p>');
						} ?>
					</div>
				</div>
			</div>
		</div>