<?php
/*
Template Name: [ДСК] Default
*/
?>

<?php get_header('twr'); ?>

	<div class="container">

		<div id="content" class="row clearfix">

			<div id="main" class="col-md-7 col-md-push-2 clearfix" role="main">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

						<header>

							<div class="page-header"><h1><?php the_title(); ?></h1></div>

						</header> <!-- end article header -->

						<section class="post_content">

							<?php the_content(); ?>

						</section> <!-- end article section -->

						<footer>

							<p class="clearfix"><?php the_tags('<span class="tags">' . __("Tags", "wpbootstrap") . ': ', ', ', '</span>'); ?></p>

						</footer> <!-- end article footer -->

					</article> <!-- end article -->

				<?php endwhile; ?>

				<?php else : ?>

					<article id="post-not-found">
						<header>
							<h1><?php _e("Not Found", "wpbootstrap"); ?></h1>
						</header>
						<section class="post_content">
							<p><?php _e("Sorry, but the requested resource was not found on this site.", "wpbootstrap"); ?></p>
						</section>
						<footer>
						</footer>
					</article>

				<?php endif; ?>

			</div> <!-- end #main -->

			<?php get_sidebar('sidebar-left'); //sidebar left ?>

			<?php get_sidebar('sidebar-twr-right'); // sidebar right ?>

		</div> <!-- end #content -->

	</div> <!-- end .container -->

<?php get_footer('twr'); ?>
