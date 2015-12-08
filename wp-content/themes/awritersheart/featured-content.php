<?php
	global $paged;
	$sticky_ids = get_option( 'sticky_posts' );
	if( $paged <= 1 and !empty($sticky_ids) )
	{

		$sticky_posts = new WP_Query( array(
			'posts_per_page' => 1,
			'ignore_sticky_posts' => true,
			'post__in' => $sticky_ids,
		));
		while ( $sticky_posts->have_posts() ) : $sticky_posts->the_post();
			?>
			<section id="hero">
				<div class="hero-container">
					<?php the_post_thumbnail('featured_thumb'); ?>
					<div class="hero-content">
						<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo get_the_date(); ?></time>
						<h1><?php the_title(); ?></h1>
						<?php //the_content(); ?>
						<a class="btn white" href="<?php the_permalink(); ?>"><?php ci_e_setting('read_more_text'); ?></a>
					</div>
				</div> <!-- .hero-container -->
			</section>
			<?php
		endwhile;
		wp_reset_postdata();
	}
?>