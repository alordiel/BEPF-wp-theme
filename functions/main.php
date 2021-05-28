<?php


/****************** password protected post form *****/

add_filter('the_password_form', 'custom_password_form');

function custom_password_form()
{
	global $post;
	$label = 'pwbox-' . (empty($post->ID) ? rand() : $post->ID);
	$o = '<div class="clearfix"><form class="protected-post-form" action="' . get_option('siteurl') . '/wp-login.php?action=postpass" method="post">
		' . '<p>' . __("This post is password protected. To view it please enter your password below:", 'wpbootstrap') . '</p>' . '
		<label for="' . $label . '">' . __("Password:", 'wpbootstrap') . ' </label><div class="input-append"><input name="post_password" id="' . $label . '" type="password" size="20" /><input type="submit" name="Submit" class="btn btn-primary" value="' . esc_attr__("Submit", 'wpbootstrap') . '" /></div>
		</form></div>
		';
	return $o;
}

/*********** update standard wp tag cloud widget so it looks better ************/

add_filter('widget_tag_cloud_args', 'my_widget_tag_cloud_args');

function my_widget_tag_cloud_args($args)
{
	$args['number'] = 20; // show less tags
	$args['largest'] = 9.75; // make largest and smallest the same - i don't like the varying font-size look
	$args['smallest'] = 9.75;
	$args['unit'] = 'px';
	return $args;
}

// filter tag cloud output so that it can be styled by CSS
function add_tag_class($taglinks)
{
	$tags = explode('</a>', $taglinks);
	$regex = "#(.*tag-link[-])(.*)(' title.*)#";
	$tagn = [];
	foreach ($tags as $tag) {
		$tagn[] = preg_replace($regex, "('$1$2 label tag-'.get_tag($2)->slug.'$3')", $tag);
	}

	return implode('</a>', $tagn);
}

add_action('wp_tag_cloud', 'add_tag_class');

add_filter('wp_tag_cloud', 'wp_tag_cloud_filter', 10, 2);

function wp_tag_cloud_filter($return, $args)
{
	return '<div id="tag-cloud">' . $return . '</div>';
}

// Enable shortcodes in widgets
add_filter('widget_text', 'do_shortcode');

// Disable jump in 'read more' link
function remove_more_jump_link($link)
{
	$offset = strpos($link, '#more-');
	if ($offset) {
		$end = strpos($link, '"', $offset);
	}
	if ($end) {
		$link = substr_replace($link, '', $offset, $end - $offset);
	}
	return $link;
}

add_filter('the_content_more_link', 'remove_more_jump_link');

// Remove height/width attributes on images so they can be responsive
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10);
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10);

function remove_thumbnail_dimensions($html)
{
	$html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
	return $html;
}

/*
function neuro_register_custom_widgets() {
	register_widget( 'neuro_Widget_Recent_Posts' );
}
add_action( 'widgets_init', 'neuro_register_custom_widgets' );
*/

// Add the Meta Box to the homepage template
function add_homepage_meta_box()
{
	global $post;

	// Only add homepage meta box if template being used is the homepage template
	// $post_id = isset($_GET['post']) ? $_GET['post'] : (isset($_POST['post_ID']) ? $_POST['post_ID'] : "");
	$post_id = $post->ID;
	$template_file = get_post_meta($post_id, '_wp_page_template', TRUE);

	if ($template_file == 'page-homepage.php') {
		add_meta_box(
			'homepage_meta_box', // $id
			'Optional Homepage Tagline', // $title
			'show_homepage_meta_box', // $callback
			'page', // $page
			'normal', // $context
			'high'); // $priority
	}
}

add_action('add_meta_boxes', 'add_homepage_meta_box');

// Field Array
$prefix = 'custom_';
$custom_meta_fields = array(
	array(
		'label' => 'Homepage tagline area',
		'desc' => 'Displayed underneath page title. Only used on homepage template. HTML can be used.',
		'id' => $prefix . 'tagline',
		'type' => 'textarea'
	)
);

// The Homepage Meta Box Callback
function show_homepage_meta_box()
{
	global $custom_meta_fields, $post;

	// Use nonce for verification
	wp_nonce_field(basename(__FILE__), 'wpbs_nonce');

	// Begin the field table and loop
	echo '<table class="form-table">';

	foreach ($custom_meta_fields as $field) {
		// get value of this field if it exists for this post
		$meta = get_post_meta($post->ID, $field['id'], true);
		// begin a table row with
		echo '<tr>
		<th><label for="' . $field['id'] . '">' . $field['label'] . '</label></th>
		<td>';
		switch ($field['type']) {
			// text
			case 'text':
				echo '<input type="text" name="' . $field['id'] . '" id="' . $field['id'] . '" value="' . $meta . '" size="60" />
			<br /><span class="description">' . $field['desc'] . '</span>';
				break;

			// textarea
			case 'textarea':
				echo '<textarea name="' . $field['id'] . '" id="' . $field['id'] . '" cols="80" rows="4">' . $meta . '</textarea>
			<br /><span class="description">' . $field['desc'] . '</span>';
				break;
		} //end switch
		echo '</td></tr>';
	} // end foreach
	echo '</table>'; // end table
}

// Save the Data
function save_homepage_meta($post_id)
{

	global $custom_meta_fields;

	// verify nonce
	if (!isset($_POST['wpbs_nonce']) || !wp_verify_nonce($_POST['wpbs_nonce'], basename(__FILE__))) {
		return $post_id;
	}

	// check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}

	// check permissions
	if ('page' === $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	} elseif (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}

	// loop through fields and save the data
	foreach ($custom_meta_fields as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];

		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], $new);
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	} // end foreach
}

add_action('save_post', 'save_homepage_meta');

// Add thumbnail class to thumbnail links
function add_class_attachment_link($html)
{
	$postid = get_the_ID();
	$html = str_replace('<a', '<a class="thumbnail"', $html);
	return $html;
}

add_filter('wp_get_attachment_link', 'add_class_attachment_link', 10, 1);

add_filter('nav_menu_css_class', 'add_active_class', 10, 2);

function add_active_class($classes, $item)
{
	if ($item->menu_item_parent == 0 && in_array('current-menu-item', $classes)) {
		$classes[] = "active";
	}

	return $classes;
}


function dbga($something)
{
	error_log(print_r($something, true));
}


function is_resources_page($page_template): bool
{
	return (is_singular('resource') || in_array($page_template, ['page-resource-landing.php', 'page-resources-filters.php']));
}
