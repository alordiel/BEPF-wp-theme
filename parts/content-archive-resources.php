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
					<span class="label-date"><?php echo $article_date; ?></span>
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
				</header>

				<section class="post-content">
					<?php the_excerpt(); ?>
				</section>
			</div>

			<hr>

		</div>

	</article>

<?php endwhile; ?>
	<?php page_navi(); ?>
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
