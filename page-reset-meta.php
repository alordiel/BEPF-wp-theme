<?php
/*
Template Name: META DATA RESET
*/
?>

<?php get_header(); ?>

<div class="container container-twr">
	<div id="content" class="row clearfix">

		<?php 
		if ( ! function_exists( 'wp_read_video_metadata' ) ) {
			include( ABSPATH . 'wp-admin/includes/media.php' );
		}		
		echo ABSPATH . 'wp-admin/includes/image.php';
		$upload_dir   = wp_upload_dir();
		$videos = [7632,7631,7630,7629,7628,7539];
		foreach($videos as $video_id) {
			$video = get_post_meta($video_id,'_wp_attached_file', true);
			$file_path = $upload_dir['basedir'].'/'.$video;
			echo $file_path . '<br>';
			$meta = wp_read_video_metadata($file_path);
			update_post_meta($video_id,'_wp_attachment_metadata', $meta);
			echo 'done for ' . $video_id;
		}


		?>

			

	</div> <!-- end #content -->
</div> <!-- end .container -->

<?php get_footer(); ?>
