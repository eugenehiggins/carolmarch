<aside class="widget_social_share widget">
	<div class="row social-content ispace">
		<div class="author-social-share">
			<a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
			<script>!function (d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (!d.getElementById(id)) {
					js = d.createElement(s);
					js.id = id;
					js.src = "//platform.twitter.com/widgets.js";
					fjs.parentNode.insertBefore(js, fjs);
				}
			}(document, "script", "twitter-wjs");</script>

			<div class="fb-like" data-href="<?php echo get_permalink(); ?>" data-send="true" data-layout="button_count" data-width="450" data-show-faces="false"></div>

			<?php
				$url='';
				$format = get_post_format($post->ID);

				if ( $format == 'video' )
				{
					$url = get_post_meta($post->ID, 'ci_format_video_url', true);
				}
				else if ( has_post_thumbnail() ) 
				{
					$pinImgUrl = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
					$url = $pinImgUrl[0];
				}
			?>
			<?php if(!empty($url)): ?>
				<a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo $url; ?>&description=<?php the_title(); ?>" class="pin-it-button" count-layout="horizontal"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="<?php _e('Pin It', 'ci_theme'); ?>" /></a>
			<?php endif; ?>

		</div> <!-- .author-social // Author Social Links -->
	</div>
</aside> <!-- blog social -->