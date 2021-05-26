<?php
/**
 * The WordPress template hierarchy first checks for any
 * MIME-types and then looks for the attachment.php file.
 *
 * @link codex.wordpress.org/Template_Hierarchy#Attachment_display
 */

get_header(); ?>

			<div id="content" class="clearfix row">

				<div id="main" class="col-sm-12 clearfix" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

						<header>

							<div class="page-header"><h1 class="single-title" itemprop="headline"><a href="<?php echo get_permalink($post->post_parent); ?>" rev="attachment"><?php echo get_the_title($post->post_parent); ?></a> &raquo; <?php the_title(); ?></h1></div>

						</header> <!-- end article header -->

						<section class="post_content clearfix" itemprop="articleBody">

							<!-- To display current image in the photo gallery -->
							<div class="attachment-img text-center">
							      <a href="<?php echo wp_get_attachment_url($post->ID); ?>">

							      <?php
							      	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

								      if ($image) : ?>
								          <img class="img-responsive" src="<?php echo $image[0]; ?>" alt="" />
								      <?php endif; ?>

							      </a>
							</div>

							<!-- To display thumbnail of previous and next image in the photo gallery -->
							<ul id="gallery-nav" class="clearfix">
								<li class="next pull-left"><?php next_image_link() ?></li>
								<li class="previous pull-right"><?php previous_image_link() ?></li>
							</ul>

						</section> <!-- end article section -->

						<footer>

							<?php the_tags('<p class="tags"><span class="tags-title">' . __("Tags","wpbootstrap") . ':</span> ', ' ', '</p>'); ?>

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

				<div id="sidebar1" class="col col-lg-4 fluid-sidebar sidebar" role="complementary">

					<?php if ( !empty($post->post_excerpt) ) { ?>
					<p class="alert alert-block success"><?php echo get_the_excerpt(); ?></p>
					<?php } ?>



				</div>

			</div> <!-- end #content -->

<?php get_footer(); ?>