<?php
get_header('resource');
?>


	<div class="container">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<article class="mt-3">

				<header class="text-center">

					<?php the_post_thumbnail('wpbs-featured-carousel'); ?>

					<div class="page-header mt-3 mb-5">
						<h1 class="single-title" itemprop="headline"><?php the_title(); ?></h1>
						<span
							class="label-taxonomy mb-3"> <?php echo get_post_meta(get_the_ID(), 'expert_title', true); ?></span>
					</div>

				</header> <!-- end article header -->

				<section class="post_content clearfix" itemprop="articleBody">
					<?php the_content(); ?>
					<a href="/expert" class="like-orange-button my-4" title="към всички експерти">Виж всички
						експерти</a>
				</section> <!-- end article section -->
			</article> <!-- end article -->

		<?php endwhile; ?>
		<?php endif; ?>
	</div> <!-- end #main -->

<?php
get_footer('resource');
