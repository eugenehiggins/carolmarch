<?php global $ci, $ci_defaults, $load_defaults, $content_width; ?>
<?php if ($load_defaults===TRUE): ?>
<?php
	add_filter('ci_panel_tabs', 'ci_add_tab_display_options', 40);
	if( !function_exists('ci_add_tab_display_options') ):
		function ci_add_tab_display_options($tabs) 
		{ 
			$tabs[sanitize_key(basename(__FILE__, '.php'))] = __('Display Options', 'ci_theme'); 
			return $tabs; 
		}
	endif;
	
	// Default values for options go here.
	// $ci_defaults['option_name'] = 'default_value';
	// or
	// load_panel_snippet( 'snippet_name' );

	$ci_defaults['show_related_posts']	= 'enabled';
	$ci_defaults['show_author_info']= 'enabled';

	load_panel_snippet('pagination');
	load_panel_snippet('excerpt');
	load_panel_snippet('seo');
	load_panel_snippet('comments');


	load_panel_snippet('featured_image_single');


	// Set our full width template width and options.
	add_filter('ci_full_template_width', 'ci_fullwidth_width');
	function ci_fullwidth_width()
	{ 
		return 940; 
	}
	load_panel_snippet('featured_image_fullwidth');



	// Change the Read More markup.
	add_filter('ci-read-more-link', 'ci_theme_readmore', 10, 3);
	function ci_theme_readmore($html, $text, $link)
	{
		return '<a class="read-more-btn" href="'.esc_url($link).'">'.$text.'</a>';
	}

	
?>
<?php else: ?>

	<?php load_panel_snippet('pagination'); ?>	

	<?php load_panel_snippet('excerpt'); ?>	

	<?php load_panel_snippet('seo'); ?>	

	<?php load_panel_snippet('comments'); ?>	

	<fieldset class="set">
		<p class="guide"><?php _e('You can enable and disable the Related Posts functionality displayed on the bottom of each post.' , 'ci_theme'); ?></p>
		<?php ci_panel_checkbox('show_related_posts', 'enabled', __('Enable Related Posts', 'ci_theme')); ?>
	</fieldset>
	
	<fieldset class="set">
		<p class="guide"><?php _e('You can enable and disable the Author Information functionality displayed on the bottom of each post.' , 'ci_theme'); ?></p>
		<?php ci_panel_checkbox('show_author_info', 'enabled', __('Enable Author Information', 'ci_theme')); ?>
	</fieldset>

	<?php load_panel_snippet('featured_image_single'); ?>

	<?php load_panel_snippet('featured_image_fullwidth'); ?>

<?php endif; ?>