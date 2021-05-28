<?php
add_action('wp_head', 'bepf_add_google_analytics');
function bepf_add_google_analytics()
{
	echo "<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			ga('create', 'UA-69449442-1', 'auto');
			ga('send', 'pageview');
			</script>";
}

function bepf_get_the_logo_icons(): string
{
	$theme_url = get_template_directory_uri();

	return "<link rel='apple-touch-icon' sizes='60x60' href='$theme_url/lib/images/apple-touch-icon-60x60.png'>
	<link rel='apple-touch-icon' sizes='76x76' href='$theme_url/lib/images/apple-touch-icon-76x76.png'>
	<link rel='apple-touch-icon' sizes='120x120' href='$theme_url/lib/images/apple-touch-icon-120x120.png'>
	<link rel='apple-touch-icon' sizes='152x152' href='$theme_url/lib/images/apple-touch-icon-152x152.png'>
	<link rel='apple-touch-icon' sizes='180x180' href='$theme_url/lib/images/apple-touch-icon-180x180.png'>
	<link rel='icon' type='image/png' href='$theme_url/lib/images/android-chrome-192x192.png' sizes='192x192'>
	<link rel='manifest' href='$theme_url/lib/images/manifest.json'>
	<link rel='shortcut icon' href='$theme_url/lib/images/favicon.ico'>";

}


function bepf_resources_navigation_menu() {
  register_nav_menu('resources-menu', __( 'Resources Menu', 'bepf' ) );
}
add_action( 'init', 'bepf_resources_navigation_menu' );
