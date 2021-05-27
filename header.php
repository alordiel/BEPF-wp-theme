<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php $theme_url = get_template_directory_uri(); ?>
	<meta charset="utf-8">
	<title><?php wp_title('&raquo;', 'true', 'right'); ?><?php bloginfo('name'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="apple-touch-icon" sizes="57x57"
		  href="<?php echo $theme_url; ?>/lib/images/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60"
		  href="<?php echo $theme_url; ?>/lib/images/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72"
		  href="<?php echo $theme_url; ?>/lib/images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76"
		  href="<?php echo $theme_url; ?>/lib/images/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114"
		  href="<?php echo $theme_url; ?>/lib/images/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120"
		  href="<?php echo $theme_url; ?>/lib/images/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144"
		  href="<?php echo $theme_url; ?>/lib/images/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152"
		  href="<?php echo $theme_url; ?>/lib/images/apple-touch-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180"
		  href="<?php echo $theme_url; ?>/lib/images/apple-touch-icon-180x180.png">
	<link rel="icon" type="image/png"
		  href="<?php echo $theme_url; ?>/lib/images/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png"
		  href="<?php echo $theme_url; ?>/lib/images/favicon-194x194.png"
		  sizes="194x194">
	<link rel="icon" type="image/png"
		  href="<?php echo $theme_url; ?>/lib/images/favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png"
		  href="<?php echo $theme_url; ?>/lib/images/android-chrome-192x192.png"
		  sizes="192x192">
	<link rel="icon" type="image/png"
		  href="<?php echo $theme_url; ?>/lib/images/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="<?php echo $theme_url; ?>/lib/images/manifest.json">
	<link rel="shortcut icon" href="<?php echo $theme_url; ?>/lib/images/favicon.ico">
	<?php wp_head(); ?>
	<link rel="stylesheet" href="<?php echo $theme_url; ?>/lib/css/ecs-overrides.min.css">

</head>

<body <?php body_class("ecs-site"); ?>>
<header role="banner">
	<div class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
						data-target=".navbar-responsive-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/"></a>
			</div>

			<div class="collapse navbar-collapse navbar-responsive-collapse navbar-right">
				<?php wp_bootstrap_main_nav(); // Adjust using Menus in Wordpress Admin ?>
				<div class="nav navbar-nav">
					<form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>"
						  class="form-inline navbar-form">
						<div class="form-group pull-right">
							<label class="sr-only" for="">Search for:</label>
							<div class="input-group">
								<input class="form-control" type="text" value="" name="s" id="s"
									   placeholder="<?php _e("Search", "wpbootstrap"); ?>">
								<div class="input-group-btn">
									<button type="submit" id="searchsubmit" class="btn btn-success"><i
											class="glyphicon glyphicon-search"></i></button>
								</div>
							</div>
						</div>
					</form>
				</div>

				<?php qtranxf_generateLanguageSelectCode('text'); ?>
				<script>jQuery(document).ready(function () {
						jQuery('.qtranxs_language_chooser').addClass('nav navbar-nav');
					})
				</script>

			</div>
		</div>
	</div>

</header> <!-- end header -->

<?php if (is_front_page()) { ?>
	<div class="container-fluid container-slider hidden-xs hidden-sm">
		<?php if (function_exists('show_simpleresponsiveslider')) {
			show_simpleresponsiveslider();
		} ?>
	</div>
<?php } ?>


<div class="flexwrap">
	<div class="container-fluid container-breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<?php if (function_exists('yoast_breadcrumb')) {
						yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
					} ?>
				</div>
			</div>
		</div>
	</div>

	<div id="content-container">
		<div class="container">
