<?php
/*
 * Template Name: Post Archives
 */
?>

<?php get_header(); ?>
<?php
	global $paged;
	$arrParams = array(
		'paged' => $paged,
		'ignore_sticky_posts'=>1,
		'showposts' => ci_setting('archive_no'));
	query_posts($arrParams);
?>
<div class="content row">
	<section class="main-content two-thirds columns alpha">
		<article <?php post_class('post'); ?>>
			<header>
				<h2 class="post-title"><?php the_title(); ?></h2>
			</header>

			<div class="post-content ispace">
				<ul class="lst archive">
					<?php while (have_posts() ) : the_post(); ?>
						<li><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'ci_theme' ), get_the_title() ) ); ?>"><?php the_title(); ?></a> - <?php echo get_the_date(); ?><?php the_excerpt(); ?></li>
					<?php endwhile; ?>
				</ul>

				<?php if (ci_setting('archive_week')=='enabled'): ?>
					<h2 class="hdr"><?php _e('Weekly Archive', 'ci_theme'); ?></h2>
					<ul class="lst archive"><?php wp_get_archives('type=weekly&show_post_count=1'); ?></ul>
				<?php endif; ?>

				<?php if (ci_setting('archive_month')=='enabled'): ?>
					<h2 class="hdr"><?php _e('Monthly Archive', 'ci_theme'); ?></h2>
					<ul class="lst archive"><?php wp_get_archives('type=monthly&show_post_count=1'); ?></ul>
				<?php endif; ?>

				<?php if (ci_setting('archive_year')=='enabled'): ?>
					<h2 class="hdr"><?php _e('Yearly Archive', 'ci_theme'); ?></h2>
					<ul class="lst archive"><?php wp_get_archives('type=yearly&show_post_count=1'); ?></ul>
				<?php endif; ?>
			</div> <!-- .post-content -->
		</article>

	</section> <!-- .main-content -->

	<?php get_sidebar(); ?>

</div> <!-- .content -->

<?php get_footer(); ?>