<?php 
add_filter('ci_footer_credits', 'ci_theme_footer_credits');
if( !function_exists('ci_theme_footer_credits') ):
function ci_theme_footer_credits($string){

	if ( ! CI_WHITELABEL ) {
		return sprintf( __( '<a href="%s">Powered by WordPress</a> - A theme by CSSIgniter.com', 'ci_theme' ),
			esc_url( 'https://wordpress.org' )
		);
	} else {
		/* translators: %2$s is replaced by the website's name. */
		return sprintf( __( '<a href="%1$s">%2$s</a> - <a href="%3$s">Powered by WordPress</a>', 'ci_theme' ),
			esc_url( home_url() ),
			get_bloginfo( 'name' ),
			esc_url( 'https://wordpress.org' )
		);
	}

}
endif;

add_filter('ci_pagination_default_args', 'ci_pagination_default_args');
if( !function_exists('ci_pagination_default_args') ):
	function ci_pagination_default_args($defaults)
	{
		$defaults['container_class'] = 'page-nav wp-pagenavi group';
		return $defaults;
	}
endif;
?>