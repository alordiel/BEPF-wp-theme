<?php get_header(); ?>
			
			<div id="content" class="row clearfix">

				<div id="main" class="col-md-9 clearfix" role="main">
				
							<?php woocommerce_content(); ?>

				</div> <!-- end #main -->

				<?php get_sidebar('sidebar-right'); // sidebar right ?>
				
			</div> <!-- end #content -->

		</div> <!-- end .container -->

<?php get_footer(); ?>
	