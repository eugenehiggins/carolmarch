<?php
	$slider_query = new WP_Query(array(
		'posts_per_page' => -1,
		'meta_key' => 'ci_cpt_gallery_slider',
		'meta_value' => 'disabled'
	));
?>
<?php if ( $slider_query->have_posts() ) : ?>
	<div class="row home-slider">
		<div class="banner flexslider">
			<ul class="slides">
				<?php while ( $slider_query->have_posts() ) : $slider_query->the_post(); ?>
					<li>
						<div class="flex-caption slider-info">
							<h6 class="flex-caption"><span><?php the_category(', '); ?></span></h6>
							<p class="flex-caption"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr(sprintf(__('Permanent link to %s', 'ci_theme'), get_the_title())); ?>"><?php the_title(); ?></a></p>
						</div> <!-- Slider Info -->
						<?php the_post_thumbnail('ci_slider_thumb'); ?>
					</li>
				<?php endwhile; ?>
			</ul>
		</div> <!-- .banner // flexslider -->
	</div> <!-- .row -->
<?php endif; wp_reset_postdata(); ?>