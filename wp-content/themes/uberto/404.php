<?php get_header(); ?>

<main id="main">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-sm-8">
				<article class="entry">
					<h1><?php _e('Error 404', 'ci_theme'); ?></h1>
					<h3><?php _e('The page you requested could not be found. Perhaps try searching?', 'ci_theme'); ?></h3>
					<?php get_search_form(); ?>
				</article>
			</div> <!-- col-md-9 -->
			<?php get_sidebar(); ?>
		</div>
	</div>
</main>

<?php get_footer(); ?>