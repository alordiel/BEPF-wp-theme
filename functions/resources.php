<?php
function bepf_get_experts(int $count): array
{
	$experts = get_posts([
		'post_type' => 'expert',
		'posts_per_page' => $count,
		'post_status' => 'public',
	]);
	if (empty($experts)) {
		return [];
	}
	return $experts;
}

function bepf_get_resource(int $count, string $taxonomy): array
{
	$posts = get_posts([
		'post_type' => 'resources',
		'posts_per_page' => $count,
		'post_status' => 'public',
		'tax_query' => [
			[
				'taxonomy' => 'resource-type',
				'field' => 'slug',
				'terms' => $taxonomy,

			]
		],
	]);
	if (empty($posts)) {
		return [];
	}
	return $posts;
}

function bepf_get_view_statistics(array $posts): array
{
	$post_ids = array_map(static function ($e) {
		return $e->ID;
	}, $posts);
	$post_ids = implode(',', $post_ids);

	global $wpdb;
	$sql = "SELECT postnum AS ID, postcount AS total FROM {$wpdb->prefix}pvc_total WHERE postnum IN ($post_ids)";
	$results = $wpdb->get_results($sql);
	if (empty($results)) {
		return [];
	}

	// transform the results into array with the post ID as a key
	$stats = [];
	foreach ($results as $post) {
		$stats[$post->ID] = $post->total;
	}
	return $stats;

}

/**
 * Show all experts on the archive page
 * @param $query
 */
function bepf_modify_main_query($query)
{
	if ($query->is_main_query()) {
		if ($query->is_post_type_archive('expert') ) {
			$query->query_vars['posts_per_page'] = -1;
		} elseif ($query->is_tax('resource-type')) {
			$query->query_vars['posts_per_page'] = -1;
			$query->query_vars['post_type'][] = 'resources';
		}
	}
}

// Hook my above function to the pre_get_posts action
add_action('pre_get_posts', 'bepf_modify_main_query');
