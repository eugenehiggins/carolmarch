<?php get_header(); ?>

<?php
	if ( is_front_page() ) {
		get_template_part('featured-content');
	}
?>

<main id="main">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-sm-8">
				<?php
					if ( is_archive() ) {
						echo '<h1>' . single_term_title('', false) . '</h1>';
					}
				?>
				<?php
					if ( have_posts() ) :
						// Start the loop
						while ( have_posts() ) : the_post ();
							get_template_part('content', get_post_format());
						endwhile;
						ci_pagination();
					endif;
				?>
			</div> <!-- col-md-9 -->
			<?php get_sidebar(); ?>
		</div>
	</div>
</main>

<?php get_footer(); ?>