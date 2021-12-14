<?php get_header(); ?>

	<div id="content" class="clearfix row">


		<div id="main" class="col-md-9 clearfix" role="main">

			<div class="page-header">
				<?php if (is_category()) { ?>
					<h1 class="archive_title h2">
						<!--<span><?php _e("Now reading:", "wpbootstrap"); ?></span>--> <?php single_cat_title(); ?>
					</h1>
				<?php } elseif (is_tag()) { ?>
					<h1 class="archive_title h2">
						<span><?php _e("Posts Tagged:", "wpbootstrap"); ?></span> <?php single_tag_title(); ?>
					</h1>
				<?php } elseif (is_author()) { ?>
					<h1 class="archive_title h2">
						<span><?php _e("Posts By:", "wpbootstrap"); ?></span> <?php get_the_author_meta('display_name'); ?>
					</h1>
				<?php } elseif (is_day()) { ?>
					<h1 class="archive_title h2">
						<span><?php _e("Daily Archives:", "wpbootstrap"); ?></span> <?php the_time('l, F j, Y'); ?>
					</h1>
				<?php } elseif (is_month()) { ?>
					<h1 class="archive_title h2">
						<span><?php _e("Monthly Archives:", "wpbootstrap"); ?>:</span> <?php the_time('F Y'); ?>
					</h1>
				<?php } elseif (is_year()) { ?>
					<h1 class="archive_title h2">
						<span><?php _e("Yearly Archives:", "wpbootstrap"); ?>:</span> <?php the_time('Y'); ?>
					</h1>
				<?php } ?>
			</div>

			<div class="row clearfix">
				<div class="col-xs-12">
					<?php echo category_description($category_id); ?>
				</div>
			</div>

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

					<div class="row container-news-excerpts">
						<div class="col-xs-12 col-sm-3">

							<?php
							// Must be inside a loop.

							if (has_post_thumbnail()) {
								the_post_thumbnail('thumb-200', array('class' => "img-responsive attachment-post-thumbnail alignleft"));
							} else {
								echo '<img class="img-responsive attachment-post-thumbnail alignleft" src="' . get_bloginfo('stylesheet_directory')
									. '/lib/images/thumbnail-default.png" />';
							}
							?>

						</div>
						<div class="col-xs-12 col-sm-9">

							<header>

								<h3 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark"
												  title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
								<span class="label label-warning"><?php the_date(); ?></span>

							</header> <!-- end article header -->

							<section class="post-content">

								<?php the_excerpt(); ?>

							</section> <!-- end article section -->
						</div>

						<hr>

					</div>

				</article> <!-- end article -->

			<?php endwhile; ?>

				<?php if (function_exists('page_navi')) { // if expirimental feature is active ?>

					<?php page_navi(); // use the page navi function ?>

				<?php } else { // if it is disabled, display regular wp prev & next links ?>
					<nav class="wp-prev-next">
						<ul class="pager">
							<li class="previous"><?php next_posts_link(_e('&laquo; Older Entries', "wpbootstrap")) ?></li>
							<li class="next"><?php previous_posts_link(_e('Newer Entries &raquo;', "wpbootstrap")) ?></li>
						</ul>
					</nav>
				<?php } ?>


			<?php else : ?>

				<article id="post-not-found">
					<header>
						<h1><?php _e("No Posts Yet", "wpbootstrap"); ?></h1>
					</header>
					<section class="post_content">
						<p><?php _e("Sorry, What you were looking for is not here.", "wpbootstrap"); ?></p>
					</section>
					<footer>
					</footer>
				</article>

			<?php endif; ?>

		</div> <!-- end #main -->

		<?php get_sidebar('sidebar-right'); // sidebar 1 ?>

	</div> <!-- end #content -->

<?php get_footer(); ?>
