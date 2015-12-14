<?php
	$featured_q = new WP_Query(array(
		'posts_per_page' => 3,
		'meta_key' => 'ci_cpt_gallery_slider'
	));
?>

<?php if ( $featured_q->have_posts() ) : ?>
	<div class="category-row row">

		<?php ci_column_classes(3, '1-1-1', true); ?>
		<?php while ( $featured_q->have_posts() ) : $featured_q->the_post(); ?>
			<article class="post category-post columns <?php echo ci_column_classes(3, '1-1-1'); ?>">
				<div class="post-content ispace">
					<div class="post-image">
						<?php the_post_thumbnail('ci_listing_thumb', array('class'=>'scale-with-grid wp-post-image')); ?>
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
			</article> <!-- .post // Single Post block (title,content etc.) -->
		<?php endwhile; ?>

	</div>
<?php endif; wp_reset_postdata(); ?>