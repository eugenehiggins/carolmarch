<?php
	$format = get_post_format($post->ID);

	if ( $format === false ) {
		$format = 'standard';
	}

	if ( is_page_template('template-frontpage-4.php') || is_page_template('template-frontpage-5.php') ) {
		$ci_thumb_select = 'ci_listing_cols_thumb';
	} else {
		$ci_thumb_select = 'ci_listing_thumb';
	}
?>

<?php if ( $format === 'standard' && has_post_thumbnail() ): ?>

	<div class="img-wrap">
		<a href="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'large') ); ?>" class="fancybox">
			<?php
				if(is_singular())
					ci_the_post_thumbnail(array('class'=>'scale-with-grid'));
				else
					the_post_thumbnail($ci_thumb_select, array('class'=>'scale-with-grid'));
			?>
		</a>
		<div class="overlay"></div>
	</div>

<?php elseif ( $format === 'gallery' ): ?>

	<?php
		$args = array( 'post_type' => 'attachment', 'numberposts' => -1, 'post_status' => null, 'post_parent' => $post->ID );
		$attachments = get_posts($args);
		$image_count = count($attachments);
	?>

	<?php if ( $image_count > 0 ): ?>
		<div class="ci-gallery flexslider">
			<ul class="slides">
				<?php
				foreach ( $attachments as $attachment )
				{
					$attr = array(
						'alt'   => trim(strip_tags( get_post_meta($attachment->ID, '_wp_attachment_image_alt', true) )),
						'class' => 'scale-with-grid',
						'title' => trim(strip_tags( $attachment->post_title ))
					);
					$img_attrs = wp_get_attachment_image_src( $attachment->ID, 'large' );
					echo '<li><a href="'.esc_url($img_attrs[0]).'" data-fancybox-group="gallery['.get_the_ID().']" class="fancybox" title="">'.wp_get_attachment_image( $attachment->ID, $ci_thumb_select, false, $attr ).'</a><div class="overlay"></div></li>';
				}
				?>
			</ul>
		</div>
	<?php endif; // $image_count > 0 ?>

<?php elseif ( $format === 'video' ): ?>

	<?php ci_embed_video(620, 380, '', 'video-wrap'); ?>

<?php endif; ?>