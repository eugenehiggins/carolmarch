<?php global $ci, $ci_defaults, $load_defaults; ?>
<?php if ($load_defaults===TRUE): ?>
<?php
	add_filter('ci_panel_tabs', 'ci_add_tab_blog_options', 20);
	if( !function_exists('ci_add_tab_blog_options') ):
		function ci_add_tab_blog_options($tabs) 
		{ 
			$tabs[sanitize_key(basename(__FILE__, '.php'))] = __('Blog Options', 'ci_theme'); 
			return $tabs; 
		}
	endif;

	// Default values for options go here.
	// $ci_defaults['option_name'] = 'default_value';
	// or
	// load_panel_snippet( 'snippet_name' );

	load_panel_snippet('slider_flexslider');
	load_panel_snippet('slider_flexslider_internal');

?>
<?php else: ?>
	
	<?php load_panel_snippet('slider_flexslider'); ?>

	<?php load_panel_snippet('slider_flexslider_internal'); ?>

	<style>
		select#slider_effect, 
		select#slider_direction, 
		label[for="slider_effect"], 
		label[for="slider_direction"] 
		{ display: none; }
	</style>
	
<?php endif; ?>