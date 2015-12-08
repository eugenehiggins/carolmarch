<?php 
	get_template_part('panel/constants');

	load_theme_textdomain( 'ci_theme', get_template_directory() . '/lang' );

	// This is the main options array. Can be accessed as a global in order to reduce function calls.
	$ci = get_option(THEME_OPTIONS);
	$ci_defaults = array();

	// The $content_width needs to be before the inclusion of the rest of the files, as it is used inside of some of them.
	if ( ! isset( $content_width ) ) $content_width = 880;

	//
	// Let's bootstrap the theme.
	//
	get_template_part('panel/bootstrap');

	//
	// Use HTML5 on galleries
	//
	add_theme_support( 'html5', array( 'gallery' ) );

	//
	// Define our various image sizes.
	//
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'main_thumb', 880, 475, true);
	add_image_size( 'featured_thumb', 1920, 600, true);

	//
	// Enable supported post formats
	//
	add_theme_support( 'post-formats', array( 'video', 'audio' ) );

	//
	// Add fancybox support.
	//
	add_fancybox_support();


	/**
	 * Display an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index
	 * views, or a figure element when on single views.
	 *
	 */
	if ( !function_exists('ci_post_thumbnail') ):
	function ci_post_thumbnail() {

		if ( post_password_required() || is_attachment() || !has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			if ( !ci_has_image_to_show() ) {
				return;
			}
		?>

		<figure class="entry-thumb <?php ci_e_setting('featured_single_align'); ?>">
			<a href="<?php echo ci_get_featured_image_src('large'); ?>" class="fancybox">
				<?php
					if ( is_page_template('template-fullwidth.php') ) {
						ci_the_post_thumbnail_full();
					} else {
						ci_the_post_thumbnail();
					}
				?>
			</a>
		</figure>

		<?php	else : ?>

		<figure class="entry-thumb">
			<a title="<?php echo esc_attr(sprintf( __('Permanent link to: %s', 'ci_theme'), get_the_title() )); ?>" href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('main_thumb'); ?>
			</a>
		</figure>

		<?php
		endif; // is_singular
	}
	endif;
