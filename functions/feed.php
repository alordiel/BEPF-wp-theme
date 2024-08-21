<?php
class BEPF_rss_feed {

	public function __construct() {
		add_action( 'rss2_item', array( $this, 'rss_insert' ), 10, 1 );
		add_action( 'rss2_ns', array( $this, 'rss_ns_insert' ), 10, 1 );

		// Modify the content/description of your articles
		add_filter( 'the_content', array( $this, 'the_content' ), 10, 1 );
	}

	public function the_content( $content ) {
		if ( !is_feed() ) {
			return $content;
		}

		global $post;
		if ( !empty( $post->post_excerpt ) ) {
			$content = wp_strip_all_tags( $post->post_excerpt );
			if ( !empty( $content ) ) {
				return wp_trim_excerpt($content);
			}
		}
		if ( !empty( $post->post_content ) ) {
			$content = wp_strip_all_tags( $post->post_content );
			if ( !empty( $content ) ) {
				return wp_trim_excerpt($content);
			}
		}
		return "";
	}

	public function rss_ns_insert(): void
	{
		echo 'xmlns:media="https://search.yahoo.com/mrss/"' . "\n";
	}

	public function rss_insert(): void
	{
		global $post;
		if ( !has_post_thumbnail($post->ID) ) {
			return;
		}
		$size = apply_filters( 'rfi_rss_image_size', 'medium' );
		$image = get_the_post_thumbnail_url( $post->ID, $size );
		if ( !empty( $image ) ) {
			echo "	" . '<media:content url="' . esc_url( $image ) . '" medium="image" />' . "\n";
		}
	}
}

new BEPF_rss_feed();
