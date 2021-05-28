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
	<div class="donors-logos">
		<div class="container">
			<img class="left-logo" src="<?php echo BEPF_REL_PATH . '/assets/images/logo-left.png' ?>"
				 alt="Iceland Lichtenstein Norway Grants logo">
			<div class="connecting-logo-line"></div>
			<img class="right-logo" src="<?php echo BEPF_REL_PATH . '/assets/images/logo-right.png' ?>"
				 alt="Norway Grants logo">
		</div>
	</div>
	<header class="navigation">
		<div class="container">
			<?php
			wp_nav_menu(array(
				'theme_location' => 'resources-menu',
				'container_class' => 'resources-menu-class'
			));
			?>
		</div>
	</header>
