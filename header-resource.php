<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8">
	<title><?php wp_title('&raquo;', 'true', 'right'); ?><?php bloginfo('name'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<?php echo bepf_get_the_logo_icons() ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class('resources-page'); ?>>

<div class="main-container">
	<div class="donors-logos"></div>
	<header class="navigation">
		<?php
		wp_nav_menu( array(
			'theme_location' => 'resources-menu',
			'container_class' => 'resources-menu-class'
		) );
		?>
	</header>
