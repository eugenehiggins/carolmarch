<?php
add_action( 'show_user_profile', 'ci_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'ci_show_extra_profile_fields' );

if( !function_exists('ci_show_extra_profile_fields') ):
function ci_show_extra_profile_fields( $user ) 
{ 
	?>
		<h3><?php _e('Author social networks information', 'ci_theme'); ?></h3>
		
		<table class="form-table">
			<tr>
				<th><label for="user_twitter"><?php _e('Twitter', 'ci_theme'); ?></label></th>
		
				<td>
					<input type="text" name="user_twitter" id="user_twitter" value="<?php echo esc_attr( get_the_author_meta( 'user_twitter', $user->ID ) ); ?>" class="regular-text" /><br />
					<span class="description"><?php _e('Please enter your Twitter username.', 'ci_theme'); ?></span>
				</td>
			</tr>
		
			<tr>
				<th><label for="user_facebook"><?php _e('Facebook', 'ci_theme'); ?></label></th>
		
				<td>
					<input type="text" name="user_facebook" id="user_facebook" value="<?php echo esc_attr( get_the_author_meta( 'user_facebook', $user->ID ) ); ?>" class="regular-text" /><br />
					<span class="description"><?php _e("Please enter your Facebook username.", 'ci_theme'); ?></span>
				</td>
			</tr>
		</table>
	<?php 
}
endif;

add_action( 'personal_options_update', 'ci_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'ci_save_extra_profile_fields' );

if( !function_exists('ci_save_extra_profile_fields') ):
function ci_save_extra_profile_fields( $user_id ) 
{
	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	/* Copy and paste this line for additional fields. Make sure to change 'twitter' to the field ID. */
	update_user_meta( $user_id, 'user_twitter', $_POST['user_twitter'] );
	update_user_meta( $user_id, 'user_facebook', $_POST['user_facebook'] );
}
endif;
?>