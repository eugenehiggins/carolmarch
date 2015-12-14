<?php
/*
 * Template Name: Front Page 2Col /w Top Cols
 */
?>

<?php get_header(); ?>

<div class="content row">
	<section class="main-content two-thirds columns alpha columned">
		<?php
			global $paged;
			$paged = (get_query_var('paged')) ? get_query_var('paged') : get_query_var('page');
			$paged = !empty($paged) ? $paged : 1;
	
			$args = array(
				'post_type' => 'post',
				'paged' => $paged
			);
			query_posts($args);
		?>

		<?php ci_column_classes(2, '1-1', true); ?>

		<?php if ( have_posts() ) : $i = 1; while ( have_posts() ) : the_post(); ?>

			<?php
				$format = get_post_format($post->ID);
		
				if ( $format === false ) {
					$format = 'standard';
				}
			?>
		
			<?php if ( $i%2 == 1 ) : ?>
				<?php $div_closed = false; ?>
				<div class="category-row row">
			<?php endif; ?>
	
			<article class="post <?php echo ci_column_classes(2, '1-1'); ?> columns category-post">
	
				<div class="post-content ispace">
					<div class="post-image">
						<?php get_template_part('formats'); ?>
					</div> <!-- .post-image -->
					<h3><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr(sprintf(__('Permanent link to %s', 'ci_theme'), get_the_title())); ?>"><?php the_title(); ?></a></h3>
				</div> <!-- .post-content -->
	
				<div class="post-meta">
					<?php the_category(', '); ?>
					<span class="meta-bullet"></span>
					<time class="post-date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo get_the_date(); ?></time>
					<span class="meta-bullet"></span>
					<a href="<?php comments_link(); ?>" class="post-comments-link"><?php comments_number( __('0 Comments', 'ci_theme'), __('1 Comment', 'ci_theme'), __('% Comments', 'ci_theme')); ?></a>
				</div> <!-- .post-meta -->
	
			</article>
	
			<?php if ( $i%2 == 0 ) : ?>
				<?php $div_closed = true; ?>
				</div><!-- .category-row -->
			<?php endif; ?>

		<?php $i++; endwhile; endif; ?>

		<?php if( !$div_closed ): ?>
			</div><!-- .row -->
		<?php endif; ?>

		<?php ci_pagination(); ?>

		<?php wp_reset_query(); ?>

	</section> <!-- .main-content -->

	<?php get_sidebar(); ?>

</div> <!-- .content -->

<?php get_footer(); ?>