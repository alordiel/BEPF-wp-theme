<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8">
	<title><?php wp_title( '&raquo;', 'true', 'right' ); ?><?php bloginfo( 'name' ); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<?php echo bepf_get_the_logo_icons() ?>
	<?php wp_head(); ?>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/lib/css/ecs-overrides.min.css">
	<meta name="facebook-domain-verification" content="kgbpbcnkecyp7j1jhk958wlktsxo44"/>
	<!-- Meta Pixel Code -->
	<script>
		!function (f, b, e, v, n, t, s) {
			if (f.fbq) return;
			n = f.fbq = function () {
				n.callMethod ?
					n.callMethod.apply(n, arguments) : n.queue.push(arguments)
			};
			if (!f._fbq) f._fbq = n;
			n.push = n;
			n.loaded = !0;
			n.version = '2.0';
			n.queue = [];
			t = b.createElement(e);
			t.async = !0;
			t.src = v;
			s = b.getElementsByTagName(e)[0];
			s.parentNode.insertBefore(t, s)
		}(window, document, 'script',
			'https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '3038620996441908');
		fbq('track', 'PageView');
	</script>
	<noscript><img height="1" width="1" style="display:none"
				   src="https://www.facebook.com/tr?id=3038620996441908&ev=PageView&noscript=1"
		/></noscript>
	<!-- End Meta Pixel Code -->
</head>
<body <?php body_class( "ecs-site" ); ?>>
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
                <?php
                $current_lang =  apply_filters( 'wpml_current_language', null );
                $lang = $current_lang === 'en' ? 'en' : '';
                ?>
				<a class="navbar-brand" href="<?php echo site_url($lang)?>"></a>
			</div>

			<div class="collapse navbar-collapse navbar-responsive-collapse navbar-right">
				<?php wp_bootstrap_main_nav(); // Adjust using Menus in Wordpress Admin ?>
				<div class="nav navbar-nav">
					<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>"
						  class="form-inline navbar-form">
						<div class="form-group pull-right">
							<label class="sr-only" for="">Search for:</label>
							<div class="input-group">
								<input class="form-control" type="text" value="" name="s" id="s"
									   placeholder="<?php _e( "Search", "wpbootstrap" ); ?>">
								<div class="input-group-btn">
									<button type="submit" id="searchsubmit" class="btn btn-success"><i
											class="glyphicon glyphicon-search"></i></button>
								</div>
							</div>
						</div>
					</form>
				</div>

				<?php if ( function_exists( 'qtranxf_generateLanguageSelectCode' ) ) {
					qtranxf_generateLanguageSelectCode( 'text' );
				} ?>
				<script>jQuery(document).ready(function () {
						jQuery('.qtranxs_language_chooser').addClass('nav navbar-nav');
					})
				</script>

			</div>
		</div>
	</div>

</header> <!-- end header -->

<?php if ( is_front_page() ) { ?>
	<div class="container-fluid container-slider hidden-xs hidden-sm">
		<?php if ( function_exists( 'show_simpleresponsiveslider' ) ) {
			show_simpleresponsiveslider();
		} ?>
	</div>
<?php } ?>


<div class="flexwrap">
	<div class="container-fluid container-breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<?php if ( function_exists( 'yoast_breadcrumb' ) ) {
						yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
					} ?>
				</div>
			</div>
		</div>
	</div>

	<div id="content-container">
		<div class="container">
