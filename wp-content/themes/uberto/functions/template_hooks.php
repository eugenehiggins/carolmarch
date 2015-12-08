<?php

add_filter('ci_footer_credits', 'ci_theme_footer_credits');
if( !function_exists('ci_theme_footer_credits') ):
function ci_theme_footer_credits($string)
{
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

//Exclude sticky posts from the main query
if ( !function_exists('ci_theme_exclude_home_stickies') ):
function ci_theme_exclude_home_stickies($query)
{
	$sticky_ids = get_option( 'sticky_posts' );
	if ( is_home() && $query->is_main_query() && !empty($sticky_ids) )
	{
		$sticky_posts = new WP_Query( array(
			'posts_per_page'      => 1,
			'ignore_sticky_posts' => true,
			'post__in'            => $sticky_ids,
			'fields'              => 'ids'
		) );

		if( count($sticky_posts->posts) > 0 )
		{
			$excluded = $sticky_posts->posts;

			// We need to respect post ids already in the blacklist.
			$post__not_in = $query->get( 'post__not_in' );

			if ( ! empty( $post__not_in ) ) {
				$excluded = array_merge( (array) $post__not_in, array($sticky_ids[0]) );
				$excluded = array_unique( $excluded );
			}

			$query->set( 'post__not_in', $excluded );
		}
	}
}
endif;
add_action('pre_get_posts', 'ci_theme_exclude_home_stickies');

?>