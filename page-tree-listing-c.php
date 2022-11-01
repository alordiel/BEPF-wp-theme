<?php
/*
Template Name: [ДСК] Финалисти Вековни
*/
?>

<?php get_header('twr'); ?>

<div class="container">

	<div id="content" class="row clearfix">

		<div id="main" class="col-md-9 clearfix" role="main">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

					<header>

						<div class="page-header"><h1><?php the_title(); ?></h1></div>

					</header> <!-- end article header -->

					<section class="post_content">

						<?php the_content(); ?>

						<div class="row">
							<div class="col-xs-12">
								<?php if (get_field('tree-twr-title')): ?>
									<h2 class="h2-finalists"><?php the_field('tree-twr-title'); ?></h2>
								<?php endif; ?>
							</div>
						</div>

						<div class="row">

							<!-- Loop Starts -->
							<?php $this_page_id = $wp_query->post->ID;

							query_posts(array(
									'showposts' => 10,
									'post_parent' => $this_page_id,
									'orderby' => 'menu_order',
									'post_type' => 'page'
								)
							);
							while (have_posts()) : the_post(); ?>

								<div class="col-xs-12 col-md-4 col-tree">
									<div class="row">
										<div class="col-xs-12 col-sm-5 col-md-4 col-lg-12">
											<img
												class="img-responsive" <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumb-300');
											echo "src='" . $image['0'] . "'"; ?>/>
										</div>

										<div class="col-xs-12 col-sm-7 col-md-8 col-lg-12">
											<div class="tree-excerpt">
												<h2 class="h3"><?php the_title(); ?></h2>
												<?php if (get_field('tree_type')): ?>
													<p class=""><i
															class="fa fa-fw fa-leaf text-success"></i><?php the_field('tree_type'); ?>
													</p>
												<?php endif; ?>
												<?php if (get_field('tree_age')): ?>
													<p class=""><i
															class="fa fa-fw fa-birthday-cake text-success"></i><?php the_field('tree_age'); ?>
													</p>
												<?php endif; ?>
												<?php if (get_field('tree_location')): ?>
													<p class=""><i
															class="fa fa-fw fa-map-marker text-success"></i><?php the_field('tree_location'); ?>
													</p>
												<?php endif; ?>
												<?php if (get_field('tree_nominator')): ?>
													<p class=""><i
															class="fa fa-fw fa-user-plus text-success"></i><?php the_field('tree_nominator'); ?>
													</p>
												<?php endif; ?>
<!-- 
													<p>
														<i class="fa fa-fw fa-thumbs-up text-success"></i><?php echo get_votes_for(get_field('tree_id'), 20); ?>
													</p> -->

												<?php the_excerpt(); ?>

											</div>


											<?php if (get_field('tree_id')): ?>
												<!-- <a class=""
												   href="https://bepf-bg.org/%D0%B4%D1%8A%D1%80%D0%B2%D0%BE-%D1%81-%D0%BA%D0%BE%D1%80%D0%B5%D0%BD/%D0%B3%D0%BB%D0%B0%D1%81%D1%83%D0%B2%D0%B0%D0%BD%D0%B5-%D0%B7%D0%B0-%D0%B2%D0%B5%D0%BA%D0%BE%D0%B2%D0%BD%D0%B8%D1%82%D0%B5-%D0%B4%D1%8A%D1%80%D0%B2%D0%B5%D1%82%D0%B0?tree_id=<?php the_field('tree_id'); ?>"><img
														src="<?php echo get_template_directory_uri(); ?>/lib/images/btn-vote-for.png"/></a> -->
											<?php endif; ?>

										</div>

									</div>
									<hr>
								</div>

							<?php endwhile;
							wp_reset_query();
							?>
							<!-- Loop Ends -->
						</div>

						<div class="row">
							<div class="col-xs-12">
								<?php if (get_field('tree-c-title')): ?>
									<h2 class="h2-finalists"><?php the_field('tree-c-title'); ?></h2>
								<?php endif; ?>
							</div>
						</div>

					</section> <!-- end article section -->

					<script type="text/javascript">
						jQuery(function () {
							jQuery('.tree-excerpt').matchHeight();
						});
					</script>

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

		<?php get_sidebar('sidebar-twr-right'); // sidebar right ?>

	</div> <!-- end #content -->

</div> <!-- end .container -->

<?php get_footer('twr'); ?>
