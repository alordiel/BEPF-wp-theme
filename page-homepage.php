
<?php
/*
Template Name: Homepage
*/
?>

<?php get_header(); ?>

			<div id="content" class="row clearfix">
						
				<div id="main" class="col-md-9 clearfix" role="main">
				
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<div id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> >
						
						<div class="page-header"><h1 class="homepage-title"><?php the_title(); ?></h1></div>
						
						<section class="post_content">
							<?php the_content(); ?>
							<!-- Main Hero -->
							<div class="row container-hero">
							<?php $post_object = get_field('post_page_id_main');
								if( $post_object ): 
									// override $post
									$post = $post_object;
									setup_postdata( $post );
									$hero_background = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
									?>

										<div class="col-xs-12">
											<div class="hero hero-primary" style="background-image: url('<?php echo $hero_background['0']; ?>')">
												<span class="label label-success pub-date pub-date-fp" itemprop="datePublished"><?php the_date(); ?></span>
												<div class="front-page-excerpt">
													<article role="article">
														<h2 itemprop="headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
														<section class="" itemprop="articleBody">
															<?php the_excerpt(); ?>
														</section>
													</article>
												</div>
											</div>
										</div>

									<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
								<?php endif; ?>
								</div>
								<!-- Main Hero Ends -->
								
								<!-- Secondary Heroes -->
								<div class="row container-hero">

								<?php $post_object = get_field('post_page_id_small_left');
									if( $post_object ): 
										// override $post
										$post = $post_object;
										setup_postdata( $post );
										$hero_background = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
										?>

											<div class="col-md-6">
												<div class="hero hero-secondary" style="background-image: url('<?php echo $hero_background['0']; ?>')">
													<span class="label label-success pub-date pub-date-fp" itemprop="datePublished"><?php the_date(); ?></span>
													<div class="front-page-excerpt">
														<article role="article">
															<h2 class="h3" itemprop="headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
															<section class="" itemprop="articleBody">
																<?php the_excerpt(); ?>
															</section>
														</article>
													</div>
												</div>
											</div>
										<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
									<?php endif; ?>

									<?php $post_object = get_field('post_page_id_small_right');
										if( $post_object ): 
											// override $post
											$post = $post_object;
											setup_postdata( $post );
											$hero_background = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
											?>
												<div class="col-md-6">
													<div class="hero hero-secondary" style="background-image: url('<?php echo $hero_background['0']; ?>')">
														<span class="label label-success pub-date pub-date-fp" itemprop="datePublished"><?php the_date(); ?></span>
														<div class="front-page-excerpt">
															<article role="article">
																<h2 class="h3" itemprop="headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
																<section class="" itemprop="articleBody">
																	<?php the_excerpt(); ?>
																</section>
															</article>
														</div>
													</div>
												</div>
											<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
										<?php endif; ?>

									</div>
									<!-- Secondary Heroes Ends -->

						</section> <!-- end article section -->
						
					</div> <!-- end article -->
					
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

				<script type="text/javascript">
					jQuery(function() {
							jQuery('.front-page-excerpt').matchHeight();
					});
				</script>

				<?php get_sidebar('sidebar-right'); // sidebar 1 ?>
				
			</div> <!-- end #content -->

		</div> <!-- end .container -->

<?php get_footer(); ?>