<?php
add_action( 'widgets_init', 'ci_widgets_init' );
if( !function_exists('ci_widgets_init') ):
function ci_widgets_init() {

	register_sidebar(array(
		'name' => __( 'Blog Sidebar', 'ci_theme'),
		'id' => 'blog-sidebar',
		'description' => __( 'Insert your blog widgets here.', 'ci_theme'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));

	register_sidebar(array(
		'name' => __( 'Pages Sidebar', 'ci_theme'),
		'id' => 'page-sidebar',
		'description' => __( 'Insert your page widgets here.', 'ci_theme'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));

	register_sidebar(array(
		'name' => __( 'Footer Column 1', 'ci_theme'),
		'id' => 'footer-widgets-row-1',
		'description' => __( 'Enter your footer widgets here. They will be assigned in the first column of the footer.', 'ci_theme'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));

	register_sidebar(array(
		'name' => __( 'Footer Column 2', 'ci_theme'),
		'id' => 'footer-widgets-row-2',
		'description' => __( 'Enter your footer widgets here. They will be assigned in the second column of the footer.', 'ci_theme'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));

	register_sidebar(array(
		'name' => __( 'Footer Column 3', 'ci_theme'),
		'id' => 'footer-widgets-row-3',
		'description' => __( 'Enter your footer widgets here. They will be assigned in the third column of the footer.', 'ci_theme'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));

}
endif;
?>