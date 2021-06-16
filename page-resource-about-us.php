<?php
/**
 * Template name: Resources About US
 */
get_header('resource');
?>
	<section>
			<div class="container">
				<h2 class="text-center"><?php the_title(); ?> </h2>
				<div class="container">
				<?php the_content(); ?>
				</div>
			</div>
	</section>
<?php
get_footer('resource');
