<?php get_header(); ?>

<div class="content row">
	<section class="main-content two-thirds columns alpha">

		<?php while ( have_posts() ) : the_post(); ?>
			<article  <?php post_class('post'); ?>>

				<header>
					<h2 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr(sprintf(__('Permanent link to %s', 'ci_theme'), get_the_title())); ?>"><?php the_title(); ?></a></h2>
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
						<?php ci_e_content(); ?>
					</div>
				</div> <!-- .post-content -->
					
				<?php ci_read_more(); ?>

			</article>
		<?php endwhile; ?>

		<?php ci_pagination(); ?>

	</section> <!-- .main-content -->

	<?php get_sidebar(); ?>

</div> <!-- .content -->

<?php get_footer(); ?>