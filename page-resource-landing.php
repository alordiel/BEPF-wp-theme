<?php
/**
 * Template name: Resources Landing page
 */
get_header('resource');
$experts = bepf_get_experts(4);
$resources = [
	'webinars' => [
		'title' => 'Уебинари',
		'entries' => bepf_get_resource(3, 'webinars'),
	],
	'videos' => [
		'title' => 'Видео',
		'entries' => bepf_get_resource(3, 'videos'),
	],
	'materials' => [
		'title' => 'Публикации и Материали',
		'entries' => bepf_get_resource(3, 'publikacii'),
	],
];
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
		<?php foreach ($resources as $type => $data): ?>
			<?php if ($data['entries'] !== []) : ?>
				<div class="our-resources container">
					<h2 class="text-center mb-5"><?php echo $data['title']; ?></h2>
					<div class="resources-list">
						<?php $view_stats = bepf_get_view_statistics($data['entries'])?>
						<?php foreach ($data['entries'] as $resource): ?>
							<div class="single-resource-card">
								<a href="<?php echo get_permalink($resource->ID); ?>"
								   title="<?php echo $resource->post_title ?>">
									<div class="resource-thumbnail"
										 style="background-image: url('<?php echo esc_url(get_the_post_thumbnail_url($resource->ID, 'medium')); ?>')"></div>
									<div class="resource-title-and-views">
										<h3><?php echo $resource->post_title ?></h3>
										<span class="number-of-views">
											<svg aria-hidden="true" focusable="false" role="img"
												 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path
													fill="currentColor"
													d="M288 144a110.94 110.94 0 0 0-31.24 5 55.4 55.4 0 0 1 7.24 27 56 56 0 0 1-56 56 55.4 55.4 0 0 1-27-7.24A111.71 111.71 0 1 0 288 144zm284.52 97.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400c-98.65 0-189.09-55-237.93-144C98.91 167 189.34 112 288 112s189.09 55 237.93 144C477.1 345 386.66 400 288 400z"></path></svg>
											<?php echo $view_stats[$resource->ID] ?? 0; ?>
										</span>
									</div>
									<p><?php echo get_the_excerpt($resource->ID); ?></p>
								</a>
							</div>
						<?php endforeach; ?>
					</div>
					<div class="end-line"></div>
				</div>
			<?php endif; ?>
		<?php endforeach; ?>
		<div class="container">
			<a href="" class="like-orange-button">Всички ресурси</a>
			<div class="end-line"></div>
		</div>
		<?php if ($experts !== []) : ?>
			<div class="our-experts container">
				<h2 class="text-center my-5">Консултации</h2>
				<div class="the-experts">
					<?php foreach ($experts as $expert): ?>
						<div class="single-expert-card">
							<a href="<?php echo get_permalink($expert->ID); ?>"
							   title="<?php echo $expert->post_title ?>">
								<div class="expert-thumbnail"
									 style="background-image: url('<?php echo esc_url(get_the_post_thumbnail_url($expert->ID, 'medium')); ?>')"></div>
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
