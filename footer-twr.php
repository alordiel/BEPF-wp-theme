		</div> <!-- Ends .flexwrap opened in header -->

		<footer id="footer-container-twr" role="contentinfo">

			<div id="inner-footer" class="container clearfix">

	          <div id="widget-footer" class="clearfix">
	          	<div class="row container-logos">
		            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-twr-1') ) : ?>
		            <?php endif; ?>
	          	</div>
	          	<div class="row">
		            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-twr-2') ) : ?>
		            <?php endif; ?>
	            </div>
	          </div>

				<nav class="clearfix">
					<?php wp_bootstrap_footer_links(); // Adjust using Menus in Wordpress Admin ?>
				</nav>

			</div> <!-- end #inner-footer -->

			<div class="container-attribution container-attribution-twr">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<p class="attribution">&copy; <?php bloginfo('name'); ?></p>
						</div>
					</div>
				</div>
			</div>

		</footer> <!-- end footer -->

		<?php wp_footer(); // js scripts are inserted using this function ?>

	</body>

</html>