<?php
/*
Template Name: [ДСК] Финалисти 2017
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

							<div id="chooser" class="row">

								<!-- Loop Starts -->
								<?php //$this_page_id = $wp_query->post->ID;

								$args = array(
									'showposts' => 10,
									'post_parent' => 2890,//$this_page_id,
									'post_type' => 'page',
									'orderby' => 'menu_order'
								);

								$postslist = get_posts($args);

								foreach ($postslist as $post) :
									setup_postdata($post); ?>

									<div class="col-xs-12 col-lg-15 col-tree">
										<div class="row">
											<div class="col-xs-12 col-sm-5 col-md-4 col-lg-12">
												<img
													class="img-responsive" <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumb-300');
												echo "src='" . $image['0'] . "'"; ?>/>
											</div>
											<div class="col-xs-12 col-sm-7 col-md-8 col-lg-12">
												<div class="tree-excerpt">
													<h2 class="h3 h3-tree"><?php the_title(); ?></h2>
													<?php if (get_field('tree_type')): ?>
														<p class=""><i
																class="fa fa-fw fa-leaf"></i><?php the_field('tree_type'); ?>
														</p>
													<?php endif; ?>
													<?php if (get_field('tree_age')): ?>
														<p class=""><i
																class="fa fa-fw fa-birthday-cake"></i><?php the_field('tree_age'); ?>
														</p>
													<?php endif; ?>
													<?php if (get_field('tree_location')): ?>
														<p class=""><i
																class="fa fa-fw fa-map-marker"></i><?php the_field('tree_location'); ?>
														</p>
													<?php endif; ?>
													<?php if (get_field('tree_nominator')): ?>
														<p class=""><i
																class="fa fa-fw fa-user-plus"></i><?php the_field('tree_nominator'); ?>
														</p>
													<?php endif; ?>

													<!-- ACTIVE! should be hidden on the last week of the votes -->
													<?php if (get_field('tree_votes_display') == false): ?>
														<!-- <p><i class="fa fa-fw fa-thumbs-up text-success"></i><?php echo get_votes_for(get_field('tree_id')); ?></p> -->
													<?php endif; ?>

													<?php the_excerpt(); ?>

												</div>

												<p class="text-right"><a class="text-success"
																		 href="<?php the_permalink(); ?>"><?php _e("Read more &raquo;", "wpbootstrap"); ?></a>
												</p>

												<?php if (get_field('tree_id')): ?>
													<a class="btn-vote" href="#<?php the_field('tree_id'); ?>"><img
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

									<?php wd_form_maker(13, "embedded"); ?>

									<div class="form-group">
										<a id="btn-reset"
										   class="btn btn-default"><?php _e("Back to Finalists", "wpbootstrap"); ?></a>
									</div>
								</div>
								<!-- Vote Form Ends -->
							</div>

							<div class="row">
								<div class="col-xs-12">
									<?php if (get_field('tree-c-title')): ?>
										<h2 class="h2-finalists"><?php the_field('tree-c-title'); ?></h2>
									<?php endif; ?>
								</div>
							</div>

							<div id="chooser-c" class="row">
								<!-- Loop Centuries Starts -->
								<?php //$this_page_id = $wp_query->post->ID;

								$args = array(
									'showposts' => 10,
									'post_parent' => 2891,//$this_page_id,
									'post_type' => 'page',
									'orderby' => 'menu_order'
								);

								$postslist = get_posts($args);

								foreach ($postslist as $post) :
									setup_postdata($post); ?>

									<div class="col-xs-12 col-lg-15 col-tree">
										<div class="row">
											<div class="col-xs-12 col-sm-5 col-md-4 col-lg-12">
												<img
													class="img-responsive" <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumb-300');
												echo "src='" . $image['0'] . "'"; ?>/>
											</div>
											<div class="col-xs-12 col-sm-7 col-md-8 col-lg-12">
												<div class="tree-excerpt">
													<h2 class="h3 h3-tree"><?php the_title(); ?></h2>
													<?php if (get_field('tree_type')): ?>
														<p class=""><i
																class="fa fa-fw fa-leaf"></i><?php the_field('tree_type'); ?>
														</p>
													<?php endif; ?>
													<?php if (get_field('tree_age')): ?>
														<p class=""><i
																class="fa fa-fw fa-birthday-cake"></i><?php the_field('tree_age'); ?>
														</p>
													<?php endif; ?>
													<?php if (get_field('tree_location')): ?>
														<p class=""><i
																class="fa fa-fw fa-map-marker"></i><?php the_field('tree_location'); ?>
														</p>
													<?php endif; ?>
													<?php if (get_field('tree_nominator')): ?>
														<p class=""><i
																class="fa fa-fw fa-user-plus"></i><?php the_field('tree_nominator'); ?>
														</p>
													<?php endif; ?>
													<!-- !ACTIVE should be hidden when votes are closed -->
													<?php if (get_field('tree_votes_display') == false): ?>
														<p>
															<i class="fa fa-fw fa-thumbs-up text-success"></i><?php echo get_cvotes_for(get_field('tree_id')); ?>
														</p>
													<?php endif; ?>

													<?php the_excerpt(); ?>

												</div>

												<p class="text-right"><a class="text-success"
																		 href="<?php the_permalink(); ?>"><?php _e("Read more &raquo;", "wpbootstrap"); ?></a>
												</p>

												<?php if (get_field('tree_id')): ?>
													<a class=""
													   href="http://bepf-bg.org/%D0%B4%D1%8A%D1%80%D0%B2%D0%BE-%D1%81-%D0%BA%D0%BE%D1%80%D0%B5%D0%BD/treec-voting?tree_id=<?php the_field('tree_id'); ?>"><img
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

									<?php wd_form_maker(14, "embedded"); ?>

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

			<?php get_sidebar('sidebar-twr-right'); // sidebar right ?>

		</div> <!-- end #content -->

	</div> <!-- end .container -->

	<script type="text/javascript">

		$ = jQuery;

		$(function () {
			$('.tree-excerpt').matchHeight();
		});

		// Beautify the Vote Form
		$("form button").addClass("btn btn-success");
		$("form input, form select, form textarea").addClass("form-control");
		$(".wdform_row").addClass("form-group");

		if ($(".fm-form-message").length) {

			var voteValue = sessionStorage.getItem('voteValue');
			$("#wdform_7_element13").val(voteValue);
			$("#chooser > .col-tree").toggleClass("hidden");

			//$("#chooser").addClass("hidden");

			$("#shower").slideDown(500);

		}

		// Tree Actions
		$(".btn-vote").click(function () {
			var voteValue = $(this).attr("href").substr(1);
			sessionStorage.setItem('voteValue', voteValue);
			$("#wdform_7_element13").val(voteValue);
			$(this).closest(".col-tree").toggleClass("chosen col-lg-4 col-lg-15");
			//$(this).closest(".col-tree").removeClass("col-lg-15");
			//$("#chooser > :not(.chosen)").hide();
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

		// Tree Actions Centurions
		$(".btn-vote-c").click(function () {
			var voteValue = $(this).attr("href").substr(1);
			$("#wdform_7_element14").val(voteValue);
			$(this).closest(".col-tree").toggleClass("chosen col-lg-4 col-lg-15");
			//$(this).closest(".col-tree").removeClass("col-lg-15");
			//$("#chooser > :not(.chosen)").hide();
			$("#chooser-c > :not(.chosen, .container-vote-form)").addClass("hidden");
			$("#shower-c").slideDown(300);
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

<?php get_footer('twr'); ?>
