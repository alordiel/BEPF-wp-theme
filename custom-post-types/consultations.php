<?php
//Creating a post type for lessons
add_action('init', 'bepf_add_experts');
function bepf_add_experts()
{
	$labels = array(
		'name' => _x('Consultation experts', 'post type general name', 'bepf'),
		'singular_name' => _x('Expert', 'post type singular name', 'bepf'),
		'menu_name' => _x('Experts', 'admin menu', 'bepf'),
		'name_admin_bar' => _x('Expert', 'add new on admin bar', 'bepf'),
		'add_new' => _x('Add New', 'Expert', 'bepf'),
		'add_new_item' => __('Add New', 'bepf'),
		'new_item' => __('New expert', 'bepf'),
		'edit_item' => __('Edit expert', 'bepf'),
		'view_item' => __('View expert', 'bepf'),
		'all_items' => __('All experts', 'bepf'),
		'search_items' => __('Search experts', 'bepf'),
		'parent_item_colon' => __('Parent experts:', 'bepf'),
		'not_found' => __('No expert found.', 'bepf'),
		'not_found_in_trash' => __('No expert found in Trash.', 'bepf')
	);

	$args = array(
		'labels' => $labels,
		'description' => __('Biography.', 'bepf'),
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_nav_menus' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'expert'),
		'capability_type' => 'post',
		'exclude_from_search' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'menu_icon' => 'dashicons-buddicons-buddypress-logo',
		'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt')
	);
	register_post_type('expert', $args);
}
