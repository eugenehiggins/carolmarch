<?php
/*
 * Template Name: Archives Template
 */
?>
<?php get_header(); ?>

<main id="main">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-sm-8">
				<?php while ( have_posts() ) : the_post (); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
						<div class="row">
							<div class="col-sm-7">
								<?php
									$archive_posts = new WP_Query(array(
										'ignore_sticky_posts' => 1,
										'posts_per_page' => ci_setting('archive_no')
									));
								?>

								<h3><?php _e('Latest posts', 'ci_theme'); ?></h3>
								<?php while ( $archive_posts->have_posts() ) : $archive_posts->the_post(); ?>
									<article <?php post_class(); ?>>
										<time><?php echo get_the_date(); ?></time><h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'ci_theme' ), get_the_title() ) ); ?>"><?php the_title(); ?></a></h1>
									</article>
								<?php endwhile; wp_reset_postdata(); ?>
							</div>

							<div class="col-sm-5">
								<?php if (ci_setting('archive_week')=='enabled'): ?>
									<h4><?php _e('Weekly Archive', 'ci_theme'); ?></h4>
									<ul class="lst archive"><?php wp_get_archives('type=weekly&show_post_count=1'); ?></ul>
								<?php endif; ?>

								<?php if (ci_setting('archive_month')=='enabled'): ?>
									<h4><?php _e('Monthly Archive', 'ci_theme'); ?></h4>
									<ul class="lst archive"><?php wp_get_archives('type=monthly&show_post_count=1'); ?></ul>
								<?php endif; ?>

								<?php if (ci_setting('archive_year')=='enabled'): ?>
									<h4><?php _e('Yearly Archive', 'ci_theme'); ?></h4>
									<ul class="lst archive"><?php wp_get_archives('type=yearly&show_post_count=1'); ?></ul>
								<?php endif; ?>
							</div>
						</div>
					</article>
				<?php endwhile; ?>
			</div> <!-- col-md-9 -->
			<?php get_sidebar(); ?>
		</div>
	</div>
</main>

<?php get_footer(); ?>