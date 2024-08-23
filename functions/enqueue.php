<?php
// Add Twitter Bootstrap's standard 'active' class name to the active nav link item

function bepf_theme_styles_and_scripts()
{

	if (!is_resources_page(get_page_template_slug())) {
		// This is the compiled css file from LESS - this means you compile the LESS file locally and put it in the appropriate directory if you want to make any changes to the master bootstrap.css.
		wp_enqueue_style('webfonts', 'https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700|Open+Sans:300,400,700,800&subset=cyrillic', array(), '1.0');
		wp_enqueue_style('bootstrap', BEPF_REL_PATH . '/lib/css/ecs.min.css', array(), '1.0' );
		wp_enqueue_style(
			'wpbs-style',
			BEPF_REL_PATH . '/style.css',
			[],
			filemtime(BEPF_ABS_PATH . '/style.css')
		);

		wp_enqueue_script('bootstrap',
			BEPF_REL_PATH . '/lib/js/bootstrap.min.js',
			['jquery'],
			'1.2'
		);

		wp_enqueue_script('bepf-scripts',
			BEPF_REL_PATH . '/lib/js/scripts.js',
			['jquery'],
			'1.2'
		);

		wp_enqueue_script('matchheight',
			BEPF_REL_PATH . '/lib/js/jquery.matchHeight-min.js',
			['jquery'],
			'1.2'
		);
	} else {
		wp_enqueue_style('webfont-roboto', 'https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;500&display=swap&subset=cyrillic', [], '1.0');
		wp_enqueue_style('webfont-montserrat', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@500&subset=cyrillic', [], '1.0');
		wp_enqueue_style(
			'bootstrap',
			BEPF_REL_PATH . '/assets/css/bootstrap.min.css',
			[],
			'1.0'
		);
		wp_enqueue_style(
			'resources-styles',
			BEPF_REL_PATH . '/assets/css/resources-styles.css',
			['bootstrap'],
			filemtime(BEPF_ABS_PATH . '/assets/css/resources-styles.css'),
		);
	}
}

add_action('wp_enqueue_scripts', 'bepf_theme_styles_and_scripts');
