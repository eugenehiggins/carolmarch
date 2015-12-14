<?php
//
// Uncomment one of the following two. Their functions are in panel/generic.php
//
add_action('wp_enqueue_scripts', 'ci_enqueue_modernizr', 1);
//add_action('wp_enqueue_scripts', 'ci_print_html5shim', 1);


// This function lives in panel/generic.php
add_action('wp_footer', 'ci_print_selectivizr', 100);



add_action('init', 'ci_register_theme_scripts');
if( !function_exists('ci_register_theme_scripts') ):
function ci_register_theme_scripts()
{
	//
	// Register all scripts here, both front-end and admin. 
	// There is no need to register them conditionally, as the enqueueing can be conditional.
	//

	wp_register_script('pinterest', 'http://assets.pinterest.com/js/pinit.js', array(), false, true);

	wp_register_script('jquery-superfish', get_child_or_parent_file_uri('/panel/scripts/superfish.js'), array('jquery'), false, true);

	wp_register_script('supersubs', get_child_or_parent_file_uri('/js/supersubs.js'), array('jquery'), false, true);
	wp_register_script('mousewheel', get_child_or_parent_file_uri('/js/jquery.mousewheel-3.0.6.pack.js'), array('jquery'), false, true);

	wp_register_script('ci-front-scripts', get_child_or_parent_file_uri('/js/scripts.js'),
		array(
			'jquery',
			'jquery-superfish',
			'jquery-flexslider',
			'supersubs',
			'jquery-fitVids',
			'mousewheel'
		),
		CI_THEME_VERSION, true);
		
}
endif;


add_action('wp_enqueue_scripts', 'ci_enqueue_theme_scripts');
if( !function_exists('ci_enqueue_theme_scripts') ):
function ci_enqueue_theme_scripts()
{
	//
	// Enqueue all (or most) front-end scripts here.
	// They can be also enqueued from within template files.
	//	
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );


	//
	// Slider options export for ci-front-scripts
	//
	$params['slider_autoslide'] = ci_setting('slider_autoslide')=='enabled' ? true : false;
	$params['slider_effect'] = ci_setting('slider_effect');
	$params['slider_direction'] = ci_setting('slider_direction');
	$params['slider_duration'] = (string)ci_setting('slider_duration');
	$params['slider_speed'] = (string)ci_setting('slider_speed');

	$params['internal_slider_autoslide'] = ci_setting('internal_slider_autoslide')=='enabled' ? true : false;
	$params['internal_slider_effect'] = ci_setting('internal_slider_effect');
	$params['internal_slider_direction'] = ci_setting('internal_slider_direction');
	$params['internal_slider_duration'] = (string)ci_setting('internal_slider_duration');
	$params['internal_slider_speed'] = (string)ci_setting('internal_slider_speed');


	wp_enqueue_script('ci-front-scripts');
	wp_localize_script('ci-front-scripts', 'ThemeOption', $params);

	wp_enqueue_script('pinterest');
	

}
endif;


if( !function_exists('ci_enqueue_admin_theme_scripts') ):
add_action('admin_enqueue_scripts','ci_enqueue_admin_theme_scripts');
function ci_enqueue_admin_theme_scripts() 
{
	global $pagenow;

	//
	// Enqueue here scripts that are to be loaded on all admin pages.
	//

	if(is_admin() and $pagenow=='themes.php' and isset($_GET['page']) and $_GET['page']=='ci_panel.php')
	{
		//
		// Enqueue here scripts that are to be loaded only on CSSIgniter Settings panel.
		//

	}
}
endif;

if( !function_exists('ci_add_fb_connect') ):
add_action('wp_footer','ci_add_fb_connect');
function ci_add_fb_connect() 
{
	?>
	<!-- FB Script -->
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<?php 
}
endif;

?>