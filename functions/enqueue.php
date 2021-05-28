<?php
// Add Twitter Bootstrap's standard 'active' class name to the active nav link item

function bepf_theme_styles_and_scripts()
{
	$theme_url = get_template_directory_uri();
	if (!is_resources_page(get_page_template_slug())) {
		// This is the compiled css file from LESS - this means you compile the LESS file locally and put it in the appropriate directory if you want to make any changes to the master bootstrap.css.
		wp_enqueue_style('webfonts', 'https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700|Open+Sans:300,400,700,800&subset=cyrillic', array(), '1.0', 'all');
		wp_enqueue_style('bootstrap', $theme_url . '/lib/css/ecs.min.css', array(), '1.0', 'all');
		wp_enqueue_style('wpbs-style', $theme_url . '/style.css', array(), '1.0', 'all');

		wp_enqueue_script('bootstrap',
			$theme_url . '/lib/js/bootstrap.min.js',
			array('jquery'),
			'1.2');

		wp_enqueue_script('bepf-scripts',
			$theme_url . '/lib/js/scripts.js',
			array('jquery'),
			'1.2');

		wp_enqueue_script('matchheight',
			$theme_url . '/lib/js/jquery.matchHeight-min.js',
			array('jquery'),
			'1.2');
	} else {
		wp_enqueue_style(
			'bootstrap',
			$theme_url . '/assets/css/bootstrap.min.css',
			array(),
			'1.0',
			'all'
		);
	}
}
add_action('wp_enqueue_scripts', 'bepf_theme_styles_and_scripts');
