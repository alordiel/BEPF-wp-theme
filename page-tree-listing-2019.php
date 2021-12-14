<?php
/*
Template Name: [ДСК] Финалисти 2019
*/
?>

<?php get_header('twr'); ?>

	<div class="container">

		<div id="content" class="row clearfix">

			<div id="main" class="col-md-9 clearfix" role="main">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

						<header>

							<div class="page-header">
								<h1><?php the_title(); ?></h1>
							</div>

						</header> <!-- end article header -->

						<section class="post_content">

							<?php the_content(); ?>

							<div class="row">
								<div class="col-xs-12">
									<?php if (get_field('tree-twr-title')) : ?>
										<h2 class="h2-finalists"><?php the_field('tree-twr-title'); ?></h2>
									<?php endif; ?>
								</div>
							</div>

							<div id="chooser" class="row">

								<!-- Loop Starts -->
								<?php

								$args = array(
									'posts_per_page' => 11,
									'post_parent' => 3614,
									'post_type' => 'page',
									'orderby' => 'menu_order'
								);

								$posts_list_trees = get_posts($args);

								foreach ($posts_list_trees as $post) :

									setup_postdata($post);
									$image_thumbnail_id = get_post_thumbnail_id($post->ID);
									$image = wp_get_attachment_image_src($image_thumbnail_id, 'thumb-300');

									?>

									<div class="col-xs-12 col-lg-15 col-tree">
										<div class="row">
											<div class="col-xs-12 col-sm-5 col-md-4 col-lg-12">
												<img class="img-responsive" src='<?php echo $image['0']; ?>'/>
											</div>
											<div class="col-xs-12 col-sm-7 col-md-8 col-lg-12">
												<div class="tree-excerpt">
													<h2 class="h3 h3-tree"><?php the_title(); ?></h2>
													<?php if (get_field('tree_type')) : ?>
														<p class=""><i
																class="fa fa-fw fa-leaf"></i><?php the_field('tree_type'); ?>
														</p>
													<?php endif; ?>
													<?php if (get_field('tree_age')) : ?>
														<p class=""><i
																class="fa fa-fw fa-birthday-cake"></i><?php the_field('tree_age'); ?>
														</p>
													<?php endif; ?>
													<?php if (get_field('tree_location')) : ?>
														<p class=""><i
																class="fa fa-fw fa-map-marker"></i><?php the_field('tree_location'); ?>
														</p>
													<?php endif; ?>
													<?php if (get_field('tree_nominator')) : ?>
														<p class=""><i
																class="fa fa-fw fa-user-plus"></i><?php the_field('tree_nominator'); ?>
														</p>
													<?php endif; ?>
													<?php if (get_field('tree_votes_display') == false) : ?>
														<!-- ACTIVE! need to be commented out later on -->
														<!-- <p><i class="fa fa-fw fa-thumbs-up text-success"></i><?php echo get_votes_for(get_field('tree_id'), 19); ?></p> -->
													<?php endif; ?>

													<?php the_excerpt(); ?>

												</div>
												<?php // ACTIVE! here we display the button for vote
												?>
												<?php if (1 == 2 && get_field('tree_id')) : ?>
													<?php $vote_link = home_url() . '/дърво-с-корен/treec-voting?tree_id=' . get_field('tree_id'); ?>
													<a class="btn-vote" href="<?php echo $vote_link ?>"><img
															src="<?php echo get_template_directory_uri(); ?>/lib/images/btn-vote-for.png"/></a>
												<?php endif; ?>

											</div>
										</div>

										<hr>
									</div>

								<?php
								endforeach;
								wp_reset_postdata();
								?>
								<!-- Loop Ends -->

								<!-- Vote Form -->
								<div id="shower" class="col-lg-8 container-vote-form" style="display:none;">

									<?php wd_form_maker(15, "embedded"); ?>

									<div class="form-group">
										<a id="btn-reset"
										   class="btn btn-default"><?php _e("Back to Finalists", "wpbootstrap"); ?></a>
									</div>
								</div>
								<!-- Vote Form Ends -->
							</div>

							<div class="row">
								<div class="col-xs-12">
									<?php if (get_field('tree-c-title')) : ?>
										<h2 class="h2-finalists"><?php the_field('tree-c-title'); ?></h2>
									<?php endif; ?>
								</div>
							</div>

							<div id="chooser-c" class="row">
								<!-- Loop Centuries Starts -->
								<?php //$this_page_id = $wp_query->post->ID;

								$args = array(
									'showposts' => 10,
									'post_parent' => 3619, //$this_page_id,
									'post_type' => 'page',
									'orderby' => 'menu_order'
								);

								$posts_list_ents = get_posts($args);

								foreach ($posts_list_ents as $post) :
									setup_postdata($post); ?>

									<div class="col-xs-12 col-lg-15 col-tree">
										<div class="row">
											<div class="col-xs-12 col-sm-5 col-md-4 col-lg-12">
												<img
													class="img-responsive" <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumb-300');
												echo "src='" . $image['0'] . "'"; ?> />
											</div>
											<div class="col-xs-12 col-sm-7 col-md-8 col-lg-12">
												<div class="tree-excerpt">
													<h2 class="h3 h3-tree"><?php the_title(); ?></h2>
													<?php if (get_field('tree_type')) : ?>
														<p class=""><i
																class="fa fa-fw fa-leaf"></i><?php the_field('tree_type'); ?>
														</p>
													<?php endif; ?>
													<?php if (get_field('tree_age')) : ?>
														<p class=""><i
																class="fa fa-fw fa-birthday-cake"></i><?php the_field('tree_age'); ?>
														</p>
													<?php endif; ?>
													<?php if (get_field('tree_location')) : ?>
														<p class=""><i
																class="fa fa-fw fa-map-marker"></i><?php the_field('tree_location'); ?>
														</p>
													<?php endif; ?>
													<?php if (get_field('tree_nominator')) : ?>
														<p class=""><i
																class="fa fa-fw fa-user-plus"></i><?php the_field('tree_nominator'); ?>
														</p>
													<?php endif; ?>
													<?php if (get_field('tree_votes_display') == false) : ?>
														<!-- ACTIVE! need to be commented out at some point -->
														<!-- <p><i class="fa fa-fw fa-thumbs-up text-success"></i><?php echo get_votes_for(get_field('tree_id'), 20); ?></p> -->
													<?php endif; ?>

													<?php the_excerpt(); ?>

												</div>
												<?php // ACTIVE! here we display the button for vote
												?>
												<?php if (1 == 2 && get_field('tree_id')) : ?>
													<?php $vote_link = home_url() . '/дърво-с-корен/гласуване-за-вековните-дървета?tree_id=' . get_field('tree_id'); ?>
													<a class="btn-vote-c" href="<?php echo $vote_link; ?>"><img
															src="<?php echo get_template_directory_uri(); ?>/lib/images/btn-vote-for.png"/></a>
												<?php endif; ?>

											</div>
										</div>

										<hr>
									</div>

								<?php
								endforeach;
								wp_reset_postdata();
								?>
								<!-- Loop Centuries Ends -->
								<!-- Centuries Vote Form -->
								<div id="shower-c" class="col-lg-8 container-vote-form" style="display:none;">

									<?php wd_form_maker(16, "embedded"); ?>

									<div class="form-group">
										<a id="btn-reset-c"
										   class="btn btn-default"><?php _e("Back to Finalists", "wpbootstrap"); ?></a>
									</div>
								</div>
								<!-- Centuries Vote Form Ends -->
							</div>


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

			<?php get_sidebar('sidebar-twr-right'); // sidebar right
			?>

		</div> <!-- end #content -->

	</div> <!-- end .container -->

	<script type="text/javascript">
		$ = jQuery;

		$(function () {
			$(' .tree-excerpt').matchHeight();
		}); // Beautify the Vote Form $("form button").addClass("btn btn-success"); $("form input, form select, form textarea").addClass("form-control"); $(".wdform_row").addClass("form-group"); if ( $( ".fm-form-message" ).length ) { var voteValue=sessionStorage.getItem('voteValue'); $("#wdform_7_element15").val(voteValue); $("#chooser> .col-tree").toggleClass("hidden");

		$("#shower").slideDown(500);

		}

		// Tree Actions
		$(".btn-vote").click(function () {
			var voteValue = $(this).attr("href").substr(1);
			sessionStorage.setItem('voteValue', voteValue);
			$("#wdform_7_element15").val(voteValue);
			$(this).closest(".col-tree").toggleClass("chosen col-lg-4 col-lg-15");
			$("#chooser > :not(.chosen, .container-vote-form)").addClass("hidden");
			$("#shower").slideDown(500);
		});

		$(".btn-vote").click(function () {
			$('html, body').animate({
				scrollTop: $(".container-vote-form").offset().top - 100
			}, 500);
		});

		$("#btn-reset").click(function () {
			$("#shower").slideUp(200, function () {
				$("#tree_id").val("");
				sessionStorage.removeItem('voteValue');
				$("#chooser > .hidden").removeClass("hidden");
				$("#chooser > .chosen").toggleClass("chosen col-lg-4 col-lg-15");
				$('.tree-excerpt').matchHeight();
			});
		});

		jQuery(function ($) {
			// Tree Actions Centurions
			$(".btn-vote-c").click(function () {
				var voteValue = $(this).attr("href").substr(1);
				sessionStorage.setItem('voteValue', voteValue);
				$("#wdform_7_element16").val(voteValue);
				$(this).closest(".col-tree").toggleClass("chosen col-lg-4 col-lg-15");
				$("#chooser-c > :not(.chosen, .container-vote-form)").addClass("hidden");
				$("#shower-c").slideDown(300);
			});
		});


		$(".btn-vote-c").click(function () {
			$('html, body').animate({
				scrollTop: $(".container-vote-form").offset().top - 100
			}, 500);
		});

		$("#btn-reset-c").click(function () {
			$("#shower-c").slideUp(200, function () {
				$("#tree_id").val("");
				$("#chooser-c > .hidden").removeClass("hidden");
				$("#chooser-c > .chosen").toggleClass("chosen col-lg-4 col-lg-15");
				$('.tree-excerpt').matchHeight();
			});
		});
	</script>
	<style>
		.chosen .btn-vote-c,
		.chosen .btn-vote {
			display: none;
		}
	</style>
<?php get_footer('twr'); ?>
