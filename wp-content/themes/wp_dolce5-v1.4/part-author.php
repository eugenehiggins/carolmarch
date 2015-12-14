<?php if ( ci_setting('show_author_info') == 'enabled' ) : ?>
	<aside class="widget_author widget">
		<h3 class="widget-title"><span><?php _e('About the Author', 'ci_theme'); ?></span></h3>

		<div class="row author-text ispace">
			<?php echo get_avatar( get_the_author_meta('email'), '90' ); ?>
	
			<div class="author-info">
				<p><?php the_author_meta('description'); ?></p>

				<div class="author-social">
					<?php if ( get_the_author_meta('user_facebook') ) : ?>
						<a class="fb" href="http://www.facebook.com/<?php the_author_meta('user_facebook'); ?>"></a> <!-- facebook -->
					<?php endif; ?>

					<?php if ( get_the_author_meta('user_twitter') ) : ?>
						<a class="tw" href="http://www.twitter.com/<?php the_author_meta('user_twitter'); ?>"></a> <!-- twitter -->
					<?php endif; ?>
				</div> <!-- .author-social -->

			</div> <!-- .author-info -->

		</div>

	</aside> <!-- .widget_author -->
<?php endif; ?>