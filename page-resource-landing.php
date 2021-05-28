<?php
/**
 * Template name: Resources Landing page
 */
get_header('resource');
$experts = bepf_get_experts(4);
$webinars = bepf_get_resource(3, 'webinars');
$videos = bepf_get_resource(3, 'videos');
$materials = bepf_get_resource(3, 'publikacii');
?>
	<section class="resources-landing">
		<div class="our-vision">
			<div class="container">
				<h2 class="text-center">Ние сме граждански организации, работещи за независимо и процъфтяващо гражданско
					пространство. Помогни ни да го изградим!</h2>
			</div>
		</div>
		<div class="latest-resources">
			<div class="latest-webinars"></div>
			<div class="latest-materials"></div>
			<div class="latest-videos"></div>
		</div>

		<?php if ($experts !== []) : ?>
			<div class="our-experts container">
				<h2 class="text-center">Консултации</h2>
				<div class="the-experts">
					<?php foreach ($experts as $expert): ?>
						<div class="single-expert-card">
							<a href="<?php echo get_permalink($expert->ID); ?>"
							   title="<?php echo $expert->post_title ?>">
								<div class="expert-thumbnail"
									 style="background-image: url('<?php echo esc_url(get_the_post_thumbnail_url($expert->ID, 'medium') ); ?>')"></div>
								<h3><?php echo $expert->post_title ?></h3>
								<h4><?php echo get_post_meta($expert->ID, 'expert_title', true); ?></h4>
							</a>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endif; ?>

		<div class="partner container">
			<h2 class="text-center">Партньори</h2>
			<div class="partners-logos">
				<img src="<?php echo BEPF_REL_PATH . '/assets/images/partners-1.png' ?>" alt="">
				<img src="<?php echo BEPF_REL_PATH . '/assets/images/partners-2.png' ?>" alt="">
				<img src="<?php echo BEPF_REL_PATH . '/assets/images/partners-3.png' ?>" alt="">
				<img src="<?php echo BEPF_REL_PATH . '/assets/images/partners-4.png' ?>" alt="">
				<img src="<?php echo BEPF_REL_PATH . '/assets/images/partners-5.png' ?>" alt="">
			</div>
		</div>
	</section>
<?php
get_footer('resource');
