				<div id="sidebar-left" class="col-md-2 col-md-pull-7 primary-sidebar" role="complementary">
				
					<?php if ( is_active_sidebar( 'sidebar-left' ) ) : ?>

						<div class="row clearfix">

							<?php dynamic_sidebar( 'sidebar-left' ); ?>

						</div>

					<?php else : ?>

						<!-- This content shows up if there are no widgets defined in the backend. -->
						
						<div class="alert alert-message">
						
							<p><?php _e("Please activate some Widgets","wpbootstrap"); ?>.</p>
						
						</div>

					<?php endif; ?>

				</div>