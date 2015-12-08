<?php get_header(); ?>

<?php
	global $wp_query;

	$found = $wp_query->found_posts;
	$none  = __( 'No results found. Please broaden your terms and search again.', 'ci_theme' );
	$one   = __( 'Just one result found. We either nailed it, or you might want to broaden your terms and search again.', 'ci_theme' );
	$many  = sprintf( _n( '%d result found.', '%d results found.', $found, 'ci_theme' ), $found );
?>

<main id="main">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-sm-8">
				<div class="search-notice">
					<h2><?php ci_e_inflect($found, $none, $one, $many); ?></h2>
					<?php if($found==0) get_search_form(); ?>
				</div>
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