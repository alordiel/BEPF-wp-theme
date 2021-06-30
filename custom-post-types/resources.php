<?php
//Creating a post type for lessons
add_action('init', 'pp_phrase_lessons_cpt');
function pp_phrase_lessons_cpt()
{
	$labels = array(
		'name' => _x('Resources', 'post type general name', 'bepf'),
		'singular_name' => _x('Resource', 'post type singular name', 'bepf'),
		'menu_name' => _x('Resources', 'admin menu', 'bepf'),
		'name_admin_bar' => _x('Resource', 'add new on admin bar', 'bepf'),
		'add_new' => _x('Add New', 'Resource', 'bepf'),
		'add_new_item' => __('Add New', 'bepf'),
		'new_item' => __('New resource', 'bepf'),
		'edit_item' => __('Edit resource', 'bepf'),
		'view_item' => __('View resource', 'bepf'),
		'all_items' => __('All resources', 'bepf'),
		'search_items' => __('Search resources', 'bepf'),
		'parent_item_colon' => __('Parent resources:', 'bepf'),
		'not_found' => __('No resource found.', 'bepf'),
		'not_found_in_trash' => __('No resource found in Trash.', 'bepf')
	);

	$args = array(
		'labels' => $labels,
		'description' => __('Description.', 'bepf'),
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_nav_menus' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'resources'),
		'capability_type' => 'post',
		'exclude_from_search' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'menu_icon' => 'dashicons-media-interactive',
		'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments')
	);
	register_post_type('resources', $args);
}

add_action('init', 'bepf_resources_taxonomy');
function bepf_resources_taxonomy()
{
	register_taxonomy(
		'resource-type',
		'resources',
		array(
			'hierarchical' => true,
			'public' => true,
			'label' => __('Resource type', 'bepf'),
			'query_var' => true,
			'rewrite' => array('slug' => 'resource-type', 'hierarchical' => true),
			'show_ui' => true,
			'show_admin_column' => true
		)
	);

	register_taxonomy(
		'resource-topic',
		'resources',
		array(
			'hierarchical' => true,
			'public' => true,
			'query_var' => true,
			'label' => __('Resource topic', 'bepf'),
			'rewrite' => array('slug' => 'resource-topic', 'hierarchical' => true),
			'show_ui' => true,
			'show_admin_column' => true
		)
	);
}


add_action('add_meta_boxes', 'bepf_add_meta_box_for_video_views');
function bepf_add_meta_box_for_video_views()
{
	add_meta_box(
		'video_watches',
		__('Number of video views', 'bepf'),
		'bepf_video_unique_count',
		'resources',
		'side',
		'high'
	);
}

//showing custom form fields
function bepf_video_unique_count()
{
	global $post;

	$type = get_the_terms($post->ID, 'resource-type');
	if ($type[0]->slug === 'videos') {
		$count = get_post_meta($post->ID, 'video_watches', true);
		echo "<p>Video was viewed: {$count['total']}</p>";
	}
}


//Create mani admin menu for Phrase Pairs
add_action('admin_menu', 'bepf_add_custom_settings_page');
function bepf_add_custom_settings_page()
{
	add_submenu_page('options-general.php',
		__('Special Pages', 'bepf_i18n'),
		__('Special Pages', 'bepf_i18n'),
		'manage_options',
		'special-pages',
		'bepf_html_of_special_pages'
	);
}

function bepf_html_of_special_pages()
{
	?>
	<div id="list-phrases-app">
		<h1><?php _e('Special pages', 'bepf_l10n') ?></h1>
		<?php

		if (isset($_POST['experts-description'])) {
			update_option('experts-description', $_POST['experts-description']);
		}

		$selected_page = get_option('experts-description');
		$select_options = '';
		$list = bepf_get_posts_by_post_typ('page');
		//build the select options for students
		foreach ($list as $key => $value) {
			$selected = (isset($selected_page) && (int)$selected_page === (int)$key) ? 'selected="selected"' : '';
			$select_options .= "<option $selected value='$key'>$value</option>";
		}
		?>
		<form name="form1" method="post" action="">
			<label><?php _e('Select which page will be used for the "Our experts" description.', 'bepf_l10n') ?><br>
				<select name="experts-description"
						value="<?php echo isset($selected_page) ? esc_attr($selected_page) : ''; ?>">
					<?php echo $select_options ?>
				</select>
			</label>
			<p class="submit">
				<input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>"/>
			</p>
		</form>
	</div>
	<?php
}


function bepf_get_posts_by_post_typ(string $post_type): array
{

	global $wpdb;
	$post_data = $wpdb->get_results($wpdb->prepare("SELECT ID, post_title
    FROM $wpdb->posts
    WHERE post_type = '%s'
    AND (post_status = 'publish' OR post_status = 'private');", $post_type));

	$pairs["none"] = '---';

	if ($post_data) {
		foreach ($post_data as $data) {
			$pairs[$data->ID] = $data->post_title;
		}
	}

	return $pairs;
}
