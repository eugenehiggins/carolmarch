<?php if ( ci_setting( 'show_related_posts' ) == 'enabled' ): ?>

<?php
	$term_list = array();
	$taxonomies = get_object_taxonomies( get_post_type() );
	$terms = array();

	if(count($taxonomies >= 1))
		$taxonomy = $taxonomies[0];
	else
		$taxonomy = 'category';

	$terms = get_the_terms( get_the_ID(), $taxonomy );

	if ( is_array( $terms ) ) {
		foreach ( $terms as $term ) {
			$term_list[] = $term->slug;
		}
	}

	$term_list = !empty( $term_list ) ? $term_list : array( '' );

	$args = array(
		'post_type' => get_post_type(),
		'numberposts' => 2,
		'post_status' => 'publish',
		'post__not_in' => array( get_the_ID() ),
		'orderby' => 'rand',
		'tax_query' => array(
			array(
				'taxonomy' => $taxonomy,
				'field' => 'slug',
				'terms' => $term_list
			)
		)
	);
	$related_posts = get_posts( $args );
	?>
<?php if ( !empty( $related_posts ) ): ?>
	<section class="widget_related-articles widget">
		<h3 class="widget-title"><span><?php _e('Related Articles', 'ci_theme'); ?></span></h3>

		<div class="category-row row">
			<?php
				global $post;
				$old_post = $post;
				
				ci_column_classes(2, '1-1', true);
			?>
			
			<?php foreach ( $related_posts as $post ): ?>
				<?php
						setup_postdata( $post );
						$attr = array(
							'title' => trim( strip_tags( $post->post_title ) )
						);

				?>
				<?php  ?>
				<article class="post category-post columns <?php echo ci_column_classes(2, '1-1'); ?>">
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
			<?php endforeach; ?>
			
			<?php
				$post = $old_post;
				setup_postdata($post);
			?>
		</div>
	</section>
	<?php endif; ?>
<?php endif; ?>
