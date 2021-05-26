<?php
// Thumbnail sizes
add_image_size('thumb-200', 200, 200, true);
add_image_size('thumb-300', 300, 300, true);
add_image_size('wpbs-featured', 780, 300, true);
add_image_size('wpbs-featured-home', 970, 311, true);
add_image_size('wpbs-featured-carousel', 970, 400, true);

// Set content width
if (!isset($content_width)) {
	$content_width = 580;
}
