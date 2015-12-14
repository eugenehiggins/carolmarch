<?php
/*
 * Template Name: Fullwidth Page
 */
?>

<?php get_header(); ?>

<div class="content row">
	<section class="main-content row alpha">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<article <?php post_class('post'); ?>>
			<header>
				<h2 class="post-title"><?php the_title(); ?></h2>
			</header>

			<div class="post-content ispace">
				<?php if ( has_post_thumbnail() ): ?>
					<div class="post-image">
						<?php ci_the_post_thumbnail_full(array( 'class'=>'scale-with-grid') ); ?>
					</div> <!-- .post-image -->
				<?php endif; ?>

				<div class="post-text">
					<?php the_content(); ?>
					<?php wp_link_pages(); ?>
				</div>
			</div> <!-- .post-content -->
		</article>

		<?php get_template_part('part-social-share'); ?>
		<?php comments_template(); ?>

		<?php endwhile; endif; ?>

	</section> <!-- .main-content -->

</div> <!-- .content -->

<?php get_footer(); ?>