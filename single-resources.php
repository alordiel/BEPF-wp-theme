<?php
get_header('resource');
?>


	<div class="container">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php $post_id = get_the_ID(); ?>
			<article class="mt-3">

				<header class="text-center">

					<?php the_post_thumbnail('wpbs-featured-carousel'); ?>

					<div class="page-header mt-3 mb-5">
						<h1 class="single-title" itemprop="headline"><?php the_title(); ?></h1>
						<span class="label-date"><?php the_date(); ?></span>
						<?php
						$type = get_the_terms($post_id, 'resource-type');
						if (!empty($type) && !is_wp_error($type)) :?>
							<span
								class="label-taxonomy"><strong>Тип:</strong> <?php echo $type[0]->name; ?></span>
						<?php endif; ?>
						<?php
						$topics = get_the_terms($post_id, 'resource-topic');
						if (!empty($topics) && !is_wp_error($topics)) {
							$topics_names = [];
							foreach ($topics as $topic) {
								$topics_names[] = $topic->name;
							}
							?>
							<span
								class="label-taxonomy"><strong>Тема:</strong> <?php echo implode(', ', $topics_names); ?></span>
							<?php
						}
						?>
					</div>

				</header> <!-- end article header -->

				<section class="post_content" itemprop="articleBody">
					<?php the_content(); ?>
				</section> <!-- end article section -->
			</article> <!-- end article -->
		<?php if ($type[0]->slug === 'videos') : ?>
			<script src="https://player.vimeo.com/api/player.js"></script>
			<script>
				jQuery(function ($) {

					$('section').on('click', 'iframe', function () {
						console.log('clicked');
						$.ajax({
							method: 'POST',
							post_id: <?php echo $post_id ?>,
							action: 'record_vimeo_watch'
						});
					});
					var iframe = document.querySelector('iframe');
					var player = new Vimeo.Player(iframe);
					var isTracked = false

					player.on('play', function () {
						if (!isTracked) {
							isTracked = true;
							$.ajax({
								url: '<?php echo admin_url("admin-ajax.php"); ?>',
								method: 'POST',
								data: {
									post_id: <?php echo $post_id ?>,
									action: 'record_vimeo_watch',
									dataType: 'JSON',
								},
							});
						}

					});
				});
			</script>
		<?php endif; ?>
		<?php endwhile; ?>
		<?php endif; ?>
	</div> <!-- end #main -->

<?php
get_footer('resource');
