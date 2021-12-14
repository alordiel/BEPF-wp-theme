</div> <!-- Ends .container opened in header -->
</div> <!-- Ends #content-container opened in header -->
</div> <!-- Ends .flexwrap opened in header -->
<div id="footer-container">

	<footer role="contentinfo">

		<div id="inner-footer" class="container clearfix">

			<div id="widget-footer" class="clearfix row">
				<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer1')) : ?>
				<?php endif; ?>
				<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer2')) : ?>
				<?php endif; ?>
				<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer3')) : ?>
				<?php endif; ?>
				<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer4')) : ?>
				<?php endif; ?>
			</div>

			<nav class="clearfix">
				<?php wp_bootstrap_footer_links(); // Adjust using Menus in Wordpress Admin ?>
			</nav>

		</div> <!-- end #inner-footer -->

		<div class="container-attribution">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<p class="attribution">&copy; <?php bloginfo('name'); ?></p>
					</div>
				</div>
			</div>
		</div>

	</footer> <!-- end footer -->

</div> <!-- Ends footer-container -->

<?php wp_footer(); ?>

</body>

</html>
