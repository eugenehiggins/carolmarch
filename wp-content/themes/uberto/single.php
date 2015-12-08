<?php get_header(); ?>

<main id="main">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-sm-8">
				<?php
					if ( have_posts() ) :
						// Start the loop
						while ( have_posts() ) : the_post ();
							get_template_part('content', get_post_format());
						endwhile;
					endif;
					wp_link_pages();
				?>
				<?php comments_template(); ?>
			</div> <!-- col-md-9 -->
			<?php get_sidebar(); ?>
		</div>
	</div>
</main>

<?php get_footer(); ?>