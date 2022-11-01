<?php
/*
Template Name: [ДСК] Начална
*/
?>

<?php get_header('twr'); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<!-- TWR Home Row 1 News -->
	<div class="container-fluid container-twr container-twr-news">

		<div class="container">

			<div class="row">

				<!-- Main Hero -->
				<?php $twr_recent = new WP_Query("showposts=3&cat=21");
				while ($twr_recent->have_posts()) : $twr_recent->the_post(); ?>

					<div class="col-xs-12 col-lg-4">
						<div class="twr-home-page-excerpt">
							<h2 class="h3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<?php the_excerpt(); ?>
						</div>
					</div>

					<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
				<?php endwhile; ?>
				<!-- Main Hero Ends -->

			</div>

		</div>

	</div> <!-- end .container-twr-news -->
	<!-- TWR Home Row 1 News Ends -->

	<!-- TWR Home Row 2 Vote -->
	<div class="container-fluid container-twr container-twr-vote" style="background-image: none;">

		<div class="container">

			<div class="row">

				<!-- Main Hero -->
				<?php if (get_field('twr-home-vote-image')): ?>

					<h1 style="color: #fff;font-weight: bold;text-align: center;font-style: italic;">За дърветата и климата</h1>
					<div class="col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-4 col-md-4">
						<div class="twr-home-page-image text-center">
							<h2 style="display:none;color: #fff;font-size: 3rem;font-weight: bold;margin-top: 55px;">
								Дърво с корен 2021
							</h2>

						<!-- 	 <a style="visibility: visible" href="<?php echo get_permalink(6156); ?>">
								 <img class="img-responsive" src="https://bepf-bg.org/bepf2015/wp-content/uploads/2017/09/btn-vote-twr.png" alt="Гласува за Дърво с корен">
							 </a> -->
							 <!--<h2>
								<a href="https://www.treeoftheyear.org/Hlasovani?lang=bg-BG" style="font-size: 3rem;font-weight: bold;color: #fff;padding: 10px 10px 15px;display: inline-block;border: 3px solid #fff; margin-bottom: 10px;">
									Гласувай за любимо дърво на Европа
								</a>
							 </h2>-->
							<img src="https://bepf-bg.org/bepf2015/wp-content/uploads/2017/09/ety_logo_RGB_PNG_1primary2.png"
								alt="Дърво с корен - лого" width="300">
						</div>
					</div>

				<?php endif; ?>
				<!-- Main Hero Ends -->

			</div>

		</div>

	</div> <!-- end .container-twr-news -->
	<!-- TWR Home Row 2 Vote Ends -->

	<!-- TWR Home Row 3 -->
	<div class="container-fluid container-twr container-twr-row-3">

		<div class="container">

			<div class="row">

				<!-- Main Hero -->
				<?php $post_object = get_field('twr-home-subpage-1-1');
				if ($post_object):
					// override $post
					$post = $post_object;
					setup_postdata($post);
					$hero_background = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
					?>

					<div class="col-xs-12 col-md-offset-1 col-md-5">
						<div class="twr-home-page-excerpt">
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<?php the_excerpt(); ?>
						</div>
					</div>

					<?php wp_reset_postdata(); ?>
				<?php endif; ?>
				<!-- Main Hero Ends -->

				<!-- Main Hero -->
				<?php $post_object = get_field('twr-home-subpage-1-2');
				if ($post_object):
					// override $post
					$post = $post_object;
					setup_postdata($post);
					$hero_background = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
					?>

					<div class="col-xs-12 col-md-5">
						<div class="twr-home-page-excerpt">
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<?php the_excerpt(); ?>
						</div>
					</div>

					<?php wp_reset_postdata(); ?>
				<?php endif; ?>
				<!-- Main Hero Ends -->

			</div>

		</div>

	</div> <!-- end .container-twr-news -->
	<!-- TWR Home Row 3 Ends -->

	<!-- TWR Home Row 4 -->
	<div class="container-fluid container-twr container-twr-row-4">

		<div class="container">

			<div class="row">

				<!-- Main Hero -->
				<?php $post_object = get_field('twr-home-subpage-2-1');
				if ($post_object):
					// override $post
					$post = $post_object;
					setup_postdata($post);
					$hero_background = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
					?>

					<div class="col-xs-12 col-md-offset-1 col-md-5">
						<div class="twr-home-page-excerpt">
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<?php the_excerpt(); ?>
						</div>
					</div>

					<?php wp_reset_postdata(); ?>
				<?php endif; ?>
				<!-- Main Hero Ends -->

				<!-- Main Hero -->
				<?php $post_object = get_field('twr-home-subpage-2-2');
				if ($post_object):
					// override $post
					$post = $post_object;
					setup_postdata($post);
					$hero_background = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
					?>

					<div class="col-xs-12 col-md-5">
						<div class="twr-home-page-excerpt">
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<?php the_excerpt(); ?>
						</div>
					</div>

					<?php wp_reset_postdata(); ?>
				<?php endif; ?>
				<!-- Main Hero Ends -->

			</div>

		</div>

	</div> <!-- end .container-twr-news -->
	<!-- TWR Home Row 4 Ends -->

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

	<script type="text/javascript">

	</script>

<?php get_footer('twr'); ?>
