<?php get_header(); ?>

<div class="content row">
	<section class="main-content two-thirds columns alpha">

		<article <?php post_class('post'); ?>>
			<header>
				<h3 class="widget-title"><span><?php _e( 'Oh, no! The page you requested could not be found. Perhaps searching will help...', 'ci_theme' ); ?></span></h3>
			</header>

			<div class="post-content ispace">
				<div class="post-text">
					<?php get_search_form(); ?>
				</div>
			</div> <!-- .post-content -->
		</article>

	</section> <!-- .main-content -->

	<?php get_sidebar(); ?>

</div> <!-- .content -->

<?php get_footer(); ?>