<?php
get_header('resource');
?>
	<div id="main" class="container" role="main">

		<div class="page-header">
			<h1 class="text-center mt-5 mb-3">
				<?php
				$term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
				?>
				<span>Категория: </span> <?php echo $term->name ?>
			</h1>

			<?php include_once 'parts/content-archive-resources.php' ?>
		</div>
	</div> <!-- end #main -->

<?php
get_footer('resource');
