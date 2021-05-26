<?php

// Sidebars & Widgetizes Areas
function wp_bootstrap_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar-left',
		'name' => 'Left Sidebar',
		'description' => 'Used on every page BUT the homepage page template.',
		'before_widget' => '<div id="%1$s" class="widget %2$s col-xs-12">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'id' => 'sidebar-right',
		'name' => 'Right Sidebar',
		'description' => 'Used on every page BUT the homepage page template.',
		'before_widget' => '<div id="%1$s" class="widget %2$s col-xs-12">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'id' => 'footer1',
		'name' => 'Footer 1',
		'before_widget' => '<div id="%1$s" class="widget col-xs-12 col-sm-6 col-md-3 %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'id' => 'footer2',
		'name' => 'Footer 2',
		'before_widget' => '<div id="%1$s" class="widget col-xs-12 col-sm-6 col-md-3 %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'id' => 'footer3',
		'name' => 'Footer 3',
		'before_widget' => '<div id="%1$s" class="widget col-xs-12 col-sm-6 col-md-3 %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'id' => 'footer4',
		'name' => 'Footer 4',
		'before_widget' => '<div id="%1$s" class="widget col-xs-12 col-sm-6 col-md-3 %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'id' => 'sidebar-twr-right',
		'name' => '[ДСК] Дясна колона',
		'description' => 'Дясна колона за Дърво с корен.',
		'before_widget' => '<div id="%1$s" class="widget %2$s col-xs-12">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'id' => 'footer-twr-1',
		'name' => '[ДСК] Footer Logos',
		'description' => 'Футър с лога за Дърво с корен.',
		'before_widget' => '<div id="%1$s" class="widget col-xs-12 %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'id' => 'footer-twr-2',
		'name' => '[ДСК] Footer Text',
		'description' => 'Футър текст за Дърво с корен.',
		'before_widget' => '<div id="%1$s" class="widget col-xs-12 %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));


	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!
