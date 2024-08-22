<?php
/*
Template Name: Homepage
*/
?>

<?php get_header(); ?>
<?php
    $posts = get_posts([
        'post_type' => 'post',
        'posts_per_page' => 5,
        'suppress_filters' => false,
    ]);
?>
<div id="content" class="row">
	<div id="main" class="col-md-9 clearfix" role="main">
        <?php if(!empty($posts)): ?>
        <?php $first_post = $posts[0]; ?>


			<div id="post-<?php echo $first_post->ID; ?>" <?php post_class('clearfix'); ?> >
				<section class="post_content">

					<!-- Main Hero -->
					<div class="row container-hero">
						<?php
                        $hero_background = wp_get_attachment_image_src(get_post_thumbnail_id($first_post->ID), 'full');
                        ?>

							<div class="col-xs-12">
								<div class="hero hero-primary" style="background-image: url('<?php echo $hero_background['0']; ?>')">
									<span class="label label-success pub-date pub-date-fp"
										  itemprop="datePublished"><?php echo get_the_date('d F Y', $first_post->ID); ?></span>
									<div class="front-page-excerpt">
										<article role="article">
											<h2 itemprop="headline">
											    <a href="<?php echo get_permalink($first_post->ID); ?>">
													<?php echo $first_post->post_title; ?>
												</a>
											</h2>
											<section class="" itemprop="articleBody">
												<?php echo get_the_excerpt($first_post->ID) ?>
											</section>
										</article>
									</div>
								</div>
							</div>
					</div>
					<!-- Main Hero Ends -->
                    <?php if (count($posts) > 1 ) :?>
                    <?php $count_of_posts =count($posts); ?>
					<!-- Secondary Heroes -->
					<div class="row container-hero secondary">
                        <?php for($i=1; $i < $count_of_posts; $i++):?>
                            <?php
							$post = $posts[$i];
							$hero_background = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
							?>

							<div class="col-md-6">
								<div class="hero hero-secondary"
									 style="background-image: url('<?php echo $hero_background['0']; ?>')">
									<span class="label label-success pub-date pub-date-fp"
										  itemprop="datePublished"><?php echo get_the_date('d F Y', $post->ID); ?></span>
									<div class="front-page-excerpt">
										<article role="article">
											<h2 class="h3" itemprop="headline">
                                                <a href="<?php echo get_permalink($post->ID); ?>">
                                                    <?php echo $post->post_title ?>
                                                </a>
                                            </h2>
											<section class="" itemprop="articleBody">
												<?php echo get_the_excerpt($post->ID); ?>
											</section>
										</article>
									</div>
								</div>
							</div>

                        <?php endfor; ?>
                    <?php endif; ?>
					</div>
					<!-- Secondary Heroes Ends -->
				</section> <!-- end article section -->
			</div> <!-- end article -->

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

		<?php the_content(); ?>

	</div> <!-- end #main -->

	<?php get_sidebar('sidebar-right'); // sidebar 1 ?>

</div> <!-- end #content -->

<?php get_footer(); ?>
