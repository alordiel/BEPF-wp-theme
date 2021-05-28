<?php
get_header('resource');
?>
	<div id="main" class="container" role="main">

		<div class="page-header">
			<h1 class="text-center my-5">
				<span>Експерти</span>
			</h1>

			<?php $article_date = ''; ?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php
				$article_date = the_date('', '', '', false) ?: $article_date;
				$post_id = get_the_ID();
				?>
				<article id="post-<?php echo $post_id; ?>" <?php post_class('clearfix'); ?> role="article">

					<div class="row container-news-excerpts">
						<div class="col-xs-12 col-sm-3">

							<?php
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
								<h3 class="h2">
									<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
										<?php the_title(); ?>
									</a>
								</h3>
								<span class="label-taxonomy mb-3"> <?php echo get_post_meta($post_id, 'expert_title', true); ?></span>
							</header>

							<section class="post-content">
								<?php the_excerpt(); ?>
							</section>
						</div>

						<hr>

					</div>

				</article>

			<?php endwhile; ?>

			<?php endif; ?>
		</div>
	</div> <!-- end #main -->

<?php
get_footer('resource');
