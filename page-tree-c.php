<?php
/*
Template Name: [ДСК] Единично дърво Вековно
*/
?>

<?php get_header('twr'); ?>

<div class="container container-twr">
 <div id="content" class="row clearfix">

	<div id="main" class="col-md-7 col-md-push-2 clearfix" role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

					<header>

						<div class="page-header">
							<h1><?php the_title(); ?></h1>
						</div>

					</header> <!-- end article header -->

					<section class="post_content">

						<?php if (get_field('tree_type')) : ?>
							<p class=""><span class="label label-warning"><?php _e("Tree type:", "wpbootstrap"); ?></span> <?php the_field('tree_type'); ?></p>
						<?php endif; ?>
						<?php if (get_field('tree_age')) : ?>
							<p class=""><span class="label label-warning"><?php _e("Age:", "wpbootstrap"); ?></span> <?php the_field('tree_age'); ?></p>
						<?php endif; ?>
						<?php if (get_field('tree_location')) : ?>
							<p class=""><span class="label label-warning"><?php _e("Location:", "wpbootstrap"); ?></span> <?php the_field('tree_location'); ?></p>
						<?php endif; ?>
						<?php if (get_field('tree_nominator')) : ?>
							<p class=""><span class="label label-warning"><?php _e("Nominator:", "wpbootstrap"); ?></span> <?php the_field('tree_nominator'); ?></p>
						<?php endif; ?>
						<!-- ACTIVE! -->
						<p><span class="label label-default"><?php _e("No of votes:", "wpbootstrap"); ?></span>&nbsp;<span class="text-success"><strong><?php echo get_votes_for(get_field('tree_id'), 20); ?></strong></span></p>

						<hr>

						<button type="submit" id="twr_vote" style="border: 0; background: transparent">
							<img src="<?php echo get_template_directory_uri(); ?>/lib/images/btn-vote-for.png" alt="Vote" />
						</button>

						<hr>

						<?php the_content(); ?>

						<script type="text/javascript">
							var twr_tree_id = '<?php the_field('tree_id'); ?>';

							jQuery(function() {
								jQuery("#twr_vote").bind("click", function() {
									var url = "https://bepf-bg.org/дърво-с-корен/гласуване-за-вековните?tree_id=" + twr_tree_id;
									window.location.href = url;
								});
							});
						</script>

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

	<?php get_sidebar('sidebar-left'); //sidebar left
	?>

	<?php get_sidebar('sidebar-twr-right'); // sidebar right
	?>

</div> <!-- end #content -->

</div> <!-- end .container -->

<?php get_footer('twr'); ?>
