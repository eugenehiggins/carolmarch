<?php
//
// Normal Post related functions.
//
add_action('admin_init', 'ci_add_cpt_post_meta');
add_action('save_post', 'ci_update_cpt_post_meta');

if( !function_exists('ci_add_cpt_post_meta') ):
function ci_add_cpt_post_meta()
{
	add_meta_box("ci_format_box_video", __('Video Details', 'ci_theme'), "ci_add_format_video_meta_box", "post", "normal", "high");
	add_meta_box("ci_format_box_audio", __('Audio Details', 'ci_theme'), "ci_add_format_audio_meta_box", "post", "normal", "high");
}
endif;

if( !function_exists('ci_update_cpt_post_meta') ):
function ci_update_cpt_post_meta($post_id)
{
	if ( !ci_can_save_meta('post') ) return;

	update_post_meta($post_id, "ci_format_video_url", esc_url_raw($_POST["ci_format_video_url"]));
	update_post_meta($post_id, "ci_format_audio_url", esc_url_raw($_POST["ci_format_audio_url"]));
}
endif;

if( !function_exists('ci_add_format_video_meta_box') ):
function ci_add_format_video_meta_box()
{
	ci_prepare_metabox('post');

	?><p><?php echo sprintf(__('In the following box, you can simply enter the URL of a supported website\'s video. It needs to start with <strong>http://</strong> or <strong>https://</strong> (E.g. <em>%1$s</em>). A list of supported websites can be <a href="%2$s">found here</a>.', 'ci_theme'), 'http://www.youtube.com/watch?v=4Z9WVZddH9w', 'http://codex.wordpress.org/Embeds#Okay.2C_So_What_Sites_Can_I_Embed_From.3F'); ?></p><?php
	ci_metabox_input('ci_format_video_url', __('The URL to the video to be embedded:', 'ci_theme'));

}
endif;

if( !function_exists('ci_add_format_audio_meta_box') ):
function ci_add_format_audio_meta_box()
{
	ci_prepare_metabox('post');

	?>
	<p><?php _e('In the following box, you can simply enter the URL of an <strong>MP3</strong> file, or click on the <strong>Upload</strong> button to upload and/or select an MP3 file from within WordPress.', 'ci_theme'); ?></p>
	<p>
		<?php 
			$audio_args = array(
				'input_class' => 'widefat uploaded code',
				'esc_func' => 'esc_url',
				'before' => '',
				'after' => ''
			);
			ci_metabox_input('ci_format_audio_url', __('The URL to the audio file to embed:', 'ci_theme'), $audio_args);
		?>
		<input id="ci-upload-audio-button" type="button" class="button ci-upload" value="<?php echo esc_attr(__('Upload MP3', 'ci_theme')); ?>" />
	</p>
	<?php

}
endif;

?>