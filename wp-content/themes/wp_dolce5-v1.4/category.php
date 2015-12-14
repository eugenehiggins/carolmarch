<?php get_header(); ?>

<div class="content row">
	<section class="main-content row">

		<div class="breadcrump clearfix">
			<?php the_breadcrumb(); ?>
		</div>

		<?php ci_column_classes(3, '1-1-1', true); ?>

		<?php if ( have_posts() ) : $i = 1; while ( have_posts() ) : the_post(); ?>

			<?php if( $i%3 == 1 ): ?>
				<?php $div_closed = false; ?>
				<div class="category-row row">
			<?php endif; ?>
			
			<article class="post <?php echo ci_column_classes(3, '1-1-1'); ?> columns category-post">
	
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
	
			<?php if( $i%3 == 0 ): ?>
				<?php $div_closed = true; ?>
				</div><!-- .row -->
			<?php endif; ?>

		<?php $i++; endwhile; endif; ?>

		<?php if( !$div_closed ): ?>
			</div><!-- .row -->
		<?php endif; ?>

		<?php ci_pagination(); ?>

	</section> <!-- .main-content -->

</div> <!-- .content -->

<?php get_footer(); ?>