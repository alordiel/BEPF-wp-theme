<div id="sidebar-right" class="col-md-3 secondary-sidebar" role="complementary">

	<?php if (is_active_sidebar('sidebar-twr-right')) : ?>

		<div class="row clearfix">

			<?php dynamic_sidebar('sidebar-twr-right'); ?>

		</div>

	<?php else : ?>

		<!-- This content shows up if there are no widgets defined in the backend. -->

		<div class="alert alert-message">

			<p><?php _e("Please activate some Widgets", "wpbootstrap"); ?>.</p>

		</div>

	<?php endif; ?>

</div>
