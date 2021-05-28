<?php
// Get Bones Core Up & Running!
require_once('lib/bones.php');

// Shortcodes
require_once('lib/shortcodes.php');

// Admin Functions (commented out by default)
require_once('lib/admin.php');

// Register Custom Navigation Walker
require_once('lib/wp_bootstrap_navwalker.php');

require_once ('functions/enqueue.php');
require_once ('functions/comments.php');
require_once ('functions/main.php');
require_once ('functions/theme.php');
require_once ('functions/sidebar.php');
require_once ('functions/header.php');

require_once ('custom-post-types/consultations.php');
require_once ('custom-post-types/resources.php');
