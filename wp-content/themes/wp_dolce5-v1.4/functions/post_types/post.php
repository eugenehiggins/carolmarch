<?php
//
// Normal Post related functions.
//
add_action('admin_init', 'ci_add_cpt_post_meta');
add_action('save_post', 'ci_update_cpt_post_meta');

if( !function_exists('ci_add_cpt_post_meta') ):
function ci_add_cpt_post_meta()
{
	add_meta_box("ci_show_slider", __('Featured Details', 'ci_theme'), "ci_add_slider_option_meta_box", "post", "normal", "high");
	add_meta_box("ci_format_box_gallery", __('Gallery Details', 'ci_theme'), "ci_add_format_gallery_meta_box", "post", "normal", "high");
	add_meta_box("ci_format_box_video", __('Video Details', 'ci_theme'), "ci_add_format_video_meta_box", "post", "normal", "high");
}
endif;

if( !function_exists('ci_update_cpt_post_meta') ):
function ci_update_cpt_post_meta($post_id)
{
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return;
	if (isset($_POST['post_view']) and $_POST['post_view']=='list') return;
	
	if (isset($_POST['post_type']) && $_POST['post_type'] == "post")
	{
		update_post_meta($post_id, "ci_format_video_url", (isset($_POST["ci_format_video_url"]) ? $_POST["ci_format_video_url"] : '') );
		update_post_meta($post_id, "ci_cpt_gallery_slider", (isset($_POST["ci_cpt_gallery_slider"]) ? $_POST["ci_cpt_gallery_slider"] : '') );
	}
}
endif;

if( !function_exists('ci_add_slider_option_meta_box') ):
function ci_add_slider_option_meta_box () {
	global $post;
	$homepage_slider = get_post_meta($post->ID, 'ci_cpt_gallery_slider', true);
	?>
	<p><?php _e('Featured posts appear in the slider if you have selected a slider template as your frontpage, or in the top three columns if you have selected the column layout for your frontpage. (Note that videos will not work for these areas, so you will need to set a featured image).', 'ci_theme'); ?></p>
	<p><input type="checkbox" id="ci_cpt_gallery_slider" name="ci_cpt_gallery_slider" value="disabled" <?php checked($homepage_slider, 'disabled'); ?> /> <label for="ci_cpt_gallery_slider"><?php _e('Mark this post as featured.', 'ci_theme'); ?></label></p>
	<?php
}
endif;

if( !function_exists('ci_add_format_gallery_meta_box') ):
function ci_add_format_gallery_meta_box()
{
	?>
	<p><?php echo sprintf(__('You need to upload (or assign) two images to the post. This can be done by clicking <a href="#" class="ci-upload">here</a>, or pressing the <strong>Upload Images</strong> button bellow, or via the <strong>Add Media <img src="%s" /> button</strong>, just below the post\'s title.', 'ci_theme'), get_admin_url().'/images/media-button.png'); ?></p>
	<p><input type="button" class="button ci-upload" value="<?php _e('Upload Images', 'ci_theme'); ?>" /></p>
	<?php
}
endif;

if( !function_exists('ci_add_format_video_meta_box') ):
function ci_add_format_video_meta_box()
{
	?>
	<p><?php echo sprintf(__('In the following box, you can simply enter the URL of a supported website\'s video. It needs to start with <strong>http://</strong> or <strong>https://</strong> (E.g. <em>%1$s</em>). A list of supported websites can be <a href="%2$s">found here</a>.', 'ci_theme'), 'http://www.youtube.com/watch?v=4Z9WVZddH9w', 'http://codex.wordpress.org/Embeds#Okay.2C_So_What_Sites_Can_I_Embed_From.3F'); ?></p>
	<p><?php _e("If you want to embed a video from an unsupported website, copy the video's embed code and paste it into the same box below.", 'ci_theme'); ?></p>
	<p><?php _e('Your video will be resized automatically to fit the width of the post area.', 'ci_theme'); ?></p>
	<?php
	ci_metabox_input('ci_format_video_url', __('The URL of the video to be embedded:', 'ci_theme'), array('esc_func' => 'esc_url'));
}
endif;
?>