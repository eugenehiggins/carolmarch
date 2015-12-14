<?php get_header(); ?>

<div class="content row">
	<section class="main-content two-thirds columns alpha">

		<?php while ( have_posts() ) : the_post(); ?>

		<article <?php post_class('post'); ?>>
			<header>
				<h2 class="post-title"><?php the_title(); ?></h2>
			</header>

			<div class="post-content ispace">
				<div class="post-image">
					<?php the_post_thumbnail('ci_listing_thumb', array( 'class'=>'scale-with-grid') ); ?>
				</div> <!-- .post-image -->
				<div class="post-text">
					<?php the_content(); ?>
					<?php wp_link_pages(); ?>
				</div>
			</div> <!-- .post-content -->
		</article>

		<?php get_template_part('part-social-share'); ?>

		<?php comments_template(); ?>

		<?php endwhile; ?>

	</section> <!-- .main-content -->

	<?php get_sidebar(); ?>

</div> <!-- .content -->

<?php get_footer(); ?>