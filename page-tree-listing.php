<?php
/*
Template Name: [ДСК] Финалисти
*/
?>

<?php get_header('twr'); ?>

	<div class="container">
			
			<div id="content" class="row clearfix">

				<div id="main" class="col-md-10 clearfix" role="main">
				
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						
						<header>
							
							<div class="page-header"><h1><?php the_title(); ?></h1></div>
						
						</header> <!-- end article header -->
					
						<section class="post_content">

							<?php the_content(); ?>

							<div class="row">
								<div class="col-xs-12">
									<?php if( get_field('tree-twr-title') ): ?>
										<h2 class="h2-finalists"><?php the_field( 'tree-twr-title' ); ?></h2>
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
									while ( have_posts() ) : the_post(); ?>
										
										<div class="col-xs-12 col-lg-15 col-tree">
											<div class="row">
												<div class="col-xs-12 col-sm-5 col-md-4 col-lg-12">
													<img class="img-responsive" <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumb-200' );
																echo "src='" . $image['0'] . "'"; ?>/>
												</div>
												
												<div class="col-xs-12 col-sm-7 col-md-8 col-lg-12">
													<div class="tree-excerpt">
														<h2 class="h3"><?php the_title(); ?></h2>
														<?php if( get_field('tree_type') ): ?>
															<p class=""><span class="label label-default"><?php _e("Tree type:", "wpbootstrap"); ?></span><br /><?php the_field( 'tree_type' ); ?></p>
														<?php endif; ?>
														<?php if( get_field('tree_age') ): ?>
															<p class=""><span class="label label-default"><?php _e("Age:", "wpbootstrap"); ?></span><br /><?php the_field( 'tree_age' ); ?></p>
														<?php endif; ?>
														<?php if( get_field('tree_location') ): ?>
															<p class=""><span class="label label-default"><?php _e("Location:", "wpbootstrap"); ?></span><br /><?php the_field( 'tree_location' ); ?></p>
														<?php endif; ?>
														<?php if( get_field('tree_nominator') ): ?>
															<p class=""><span class="label label-default"><?php _e("Nominator:", "wpbootstrap"); ?></span><br /><?php the_field( 'tree_nominator' ); ?></p>
														<?php endif; ?>

														<?php the_excerpt(); ?>
														
													</div>
												</div>
													
												</div>
												
												<p class="text-right"><a class="text-success" href="<?php the_permalink(); ?>"><?php _e("Read more &raquo;", "wpbootstrap"); ?></a></p>
												<?php if( get_field('tree_id') ): ?>
													<a class="" href="http://bepf-bg.org/tree-voting?tree_id=<?php the_field( 'tree_id' ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/lib/images/btn-vote-for.png" /></a>
												<?php endif; ?>

												<hr>
											</div>
		
							        <?php endwhile; 
										  wp_reset_query(); 
									?>
									<!-- Loop Ends -->
								</div>
								
								<div class="row">
									<div class="col-xs-12">
										<?php if( get_field('tree-c-title') ): ?>
											<h2 class="h2-finalists"><?php the_field( 'tree-c-title' ); ?></h2>
										<?php endif; ?>
									</div>
								</div>

								<div class="row">
									<!-- Loop Centuries Starts -->
									<?php $this_page_id = $wp_query->post->ID;

											query_posts(array(
												'showposts' => 10,
												'post_parent' => 1193,
												'orderby' => 'menu_order',
												'post_type' => 'page'
												)
											);
											while ( have_posts() ) : the_post(); ?>
												
												<div class="col-xs-12 col-lg-15 col-tree">
													<div class="row">
														<div class="col-xs-12 col-sm-5 col-md-4 col-lg-12">
															<img class="img-responsive" <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumb-200' );
																		echo "src='" . $image['0'] . "'"; ?>/>
														</div>
														<div class="col-xs-12 col-sm-7 col-md-8 col-lg-12">
															<h2 class="h3"><?php the_title(); ?></h2>
															<?php if( get_field('tree_type') ): ?>
																<p class=""><span class="label label-default"><?php _e("Tree type:", "wpbootstrap"); ?></span><br /><?php the_field( 'tree_type' ); ?></p>
															<?php endif; ?>
															<?php if( get_field('tree_age') ): ?>
																<p class=""><span class="label label-default"><?php _e("Age:", "wpbootstrap"); ?></span><br /><?php the_field( 'tree_age' ); ?></p>
															<?php endif; ?>
															<?php if( get_field('tree_location') ): ?>
																<p class=""><span class="label label-default"><?php _e("Location:", "wpbootstrap"); ?></span><br /><?php the_field( 'tree_location' ); ?></p>
															<?php endif; ?>
															<?php if( get_field('tree_nominator') ): ?>
																<p class=""><span class="label label-default"><?php _e("Nominator:", "wpbootstrap"); ?></span><br /><?php the_field( 'tree_nominator' ); ?></p>
															<?php endif; ?>


														</div>
														</div>
														<div class="tree-excerpt">
															<?php the_excerpt(); ?>
														</div>
														
														<p class="text-right"><a class="text-success" href="<?php the_permalink(); ?>"><?php _e("Read more &raquo;", "wpbootstrap"); ?></a></p>
														<?php if( get_field('tree_id') ): ?>
															<a class="" href="http://bepf-bg.org/treec-voting?tree_id=<?php the_field( 'tree_id' ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/lib/images/btn-vote-for.png" /></a>
														<?php endif; ?>

														<hr>
													</div>
									
									        <?php endwhile; 
												  wp_reset_query(); 
											?>
									<!-- Loop Centuries Ends -->
								</div>
												
						</section> <!-- end article section -->

						<script type="text/javascript">
							jQuery(function() {
							    jQuery('.tree-excerpt').matchHeight();
							});
						</script>
						
						<footer>
			
							<p class="clearfix"><?php the_tags('<span class="tags">' . __("Tags","wpbootstrap") . ': ', ', ', '</span>'); ?></p>
							
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