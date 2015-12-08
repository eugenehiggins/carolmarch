<article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
	<?php ci_post_thumbnail(); ?>

	<?php if ( !is_page() ) : ?>
		<div class="entry-meta">
			<time class="entry-time" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo get_the_date(); ?></time> &ndash;
			<span class="entry-categories"><b><?php _e('Posted Under:', 'ci_theme'); ?></b> <?php the_category(', '); ?></span>
			<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'ci_theme' ), __( '1 Comment', 'ci_theme' ), __( '% Comments', 'ci_theme' ) ); ?></span>
		</div>
	<?php endif; ?>

	<?php
		if ( is_singular() ):
			the_title( '<h1 class="entry-title">', '</h1>' );
		else:
			the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
		endif;
	?>

	<div class="entry-content group">
		<?php ci_e_content(); ?>
	</div>

	<?php if ( !is_singular() ): ?>
		<a class="btn read-more" href="<?php the_permalink(); ?>"><?php ci_e_setting('read_more_text'); ?></a>
	<?php endif; ?>
</article>