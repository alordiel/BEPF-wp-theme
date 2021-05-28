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
