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
		if ($query->is_post_type_archive('expert')) {
			$query->query_vars['posts_per_page'] = -1;
		} elseif ($query->is_tax('resource-type')) {
			$query->query_vars['posts_per_page'] = -1;
			$query->query_vars['post_type'][] = 'resources';
		}
	}
}

// Hook my above function to the pre_get_posts action
add_action('pre_get_posts', 'bepf_modify_main_query');


function bepf_record_vimeo_watch()
{
	if (empty($_POST['post_id'])) {
		die(0);
	}

	$video_stats = get_post_meta($_POST['post_id'], 'video_watches', true);
	$user_ip = bepf_get_user_IP();
	if (empty($video_stats)) {
		$video_stats = [
			'IPs' => [$user_ip],
			'total' => 1,
		];
		update_post_meta($_POST['post_id'],'video_watches', $video_stats);
		die(2);

	}

	if (!in_array($user_ip, $video_stats['IPs'], true)) {
		$video_stats['IPs'][] = $user_ip;
		$video_stats = [
			'IPs' => $video_stats['IPs'],
			'total' => $video_stats['total'] ++,
		];
		update_post_meta($_POST['post_id'],'video_watches', $video_stats);
		die(1);
	}
}

add_action('wp_ajax_record_vimeo_watch', 'bepf_record_vimeo_watch');
add_action('wp_ajax_nopriv_record_vimeo_watch', 'bepf_record_vimeo_watch');


function bepf_get_user_IP()
{
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		//ip from share internet
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		//ip pass from proxy
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	return $ip;
}
