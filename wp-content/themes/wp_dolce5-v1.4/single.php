<?php get_header(); ?>

<div class="content row">
	<section class="main-content two-thirds columns alpha">
		<?php while ( have_posts() ) : the_post(); ?>

			<?php
				$format = get_post_format($post->ID);
		
				if ( $format === false ) {
					$format = 'standard';
				}
			?>
			<article  <?php post_class('post'); ?>>
				<header>
					<h2 class="post-title"><?php the_title(); ?></h2>
					<div class="post-meta">
						<?php the_category(', '); ?>
						<span class="meta-bullet"></span>
						<time class="post-date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo get_the_date(); ?></time>
						<span class="meta-bullet"></span>
						<a href="<?php comments_link(); ?>" class="post-comments-link"><?php comments_number( __('0 Comments', 'ci_theme'), __('1 Comment', 'ci_theme'), __('% Comments', 'ci_theme')); ?></a>
					</div> <!-- .post-meta -->
				</header>
	
				<div class="post-content ispace">
					<div class="post-image">
						<?php get_template_part('formats'); ?>
					</div> <!-- .post-image -->
					<div class="post-text">
						<?php the_content(); ?>
						<?php wp_link_pages(); ?>
					</div>
				</div> <!-- .post-content -->
			</article>
	
			<?php get_template_part('part-social-share'); ?>
	
			<?php get_template_part('part-author'); ?>
	
			<?php get_template_part('part-related-posts'); ?>
	
			<?php comments_template(); ?>

		<?php endwhile; ?>

	</section> <!-- .main-content -->

	<?php get_sidebar(); ?>

</div> <!-- .content -->

<?php get_footer(); ?>