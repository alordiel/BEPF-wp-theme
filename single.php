<?php get_header(); ?>

			<div id="content" class="row clearfix">

				<div id="main" class="col-md-9 clearfix" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

						<header>

							<?php the_post_thumbnail( 'wpbs-featured-carousel' ); ?>

							<div class="page-header">
								<h1 class="single-title" itemprop="headline"><?php the_title(); ?></h1>
								<span class="label label-warning" itemprop="datePublished"><?php the_date(); ?></span>
							</div>

						</header> <!-- end article header -->

						<section class="post_content clearfix" itemprop="articleBody">

							<?php the_content(); ?>

							<?php wp_link_pages(); ?>

						</section> <!-- end article section -->

						<section class="post-nav">
							<div class="row">
								<div id="post-nav-next" class="col-sm-6 col-md-5 text-left">
									<?php next_post_link('%link', '%title', TRUE); ?>
								</div>

								<div id="post-nav-prev" class="col-sm-6 col-md-offset-2 col-md-5 text-right">
									<?php previous_post_link('%link', '%title', TRUE); ?>
								</div>
							</div>
						</section>

						<footer>

							<?php the_tags('<p class="tags"><span class="tags-title">' . __("Tags","wpbootstrap") . ':</span> ', ' ', '</p>'); ?>

							<?php
							// only show edit button if user has permission to edit posts
							if( $user_level > 0 ) {
							?>
							<a href="<?php echo get_edit_post_link(); ?>" class="btn btn-success edit-post"><i class="glyphicon glyphicon-wrench"></i> <?php _e("Edit post","wpbootstrap"); ?></a>
							<?php } ?>

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

			<script type="text/javascript">
				jQuery(function() {
						jQuery('.gallery-caption').matchHeight();
				});
			</script>

			<?php get_sidebar('sidebar-right'); // sidebar right ?>

			</div> <!-- end #content -->

<?php get_footer(); ?>