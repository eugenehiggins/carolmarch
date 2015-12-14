<?php
	get_template_part('panel/constants');

	load_theme_textdomain( 'ci_theme', get_template_directory() . '/lang' );

	// This is the main options array. Can be accessed as a global in order to reduce function calls.
	$ci = get_option(THEME_OPTIONS);
	$ci_defaults = array();

	// The $content_width needs to be before the inclusion of the rest of the files, as it is used inside of some of them.
	if ( ! isset( $content_width ) ) $content_width = 620;


	//
	// Let's bootstrap the theme.
	//
	get_template_part('panel/bootstrap');

	get_template_part('functions/user_meta');

	//
	// HTML5 Support for galleries
	//
	add_theme_support( 'html5', array('gallery') );

	//
	// Define our various image sizes.
	//
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'ci_listing_thumb', 620, 350, true);
	add_image_size( 'ci_listing_cols_thumb', 400, 250, true);
	add_image_size( 'ci_slider_thumb', 940, 550, true);


	// Define our post formats
	add_theme_support( 'post-formats', array('gallery', 'video') );
	add_post_type_support( 'post', 'post-formats' );

	// Let the theme know that we have WP-PageNavi styled.
	add_ci_theme_support('wp_pagenavi');


	add_fancybox_support();

	// Let the user choose a color scheme on each post individually.
	add_ci_theme_support('post-color-scheme', array('page', 'post'));


	// Don't use default styles for galleries
	add_filter( 'use_default_gallery_style', '__return_false' );


	// Remove width and height attributes from the <img> tag.
	// Remove also when an image is sent to the editor. When the user resizes the image from the handles, width and height
	// are re-inserted, so expected behaviour is not lost.
	add_filter('post_thumbnail_html', 'ci_remove_thumbnail_dimentions');
	add_filter('image_send_to_editor', 'ci_remove_thumbnail_dimentions');
	function ci_remove_thumbnail_dimentions($html)
	{
		$html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
		return $html;
	}


	if( !function_exists('the_breadcrumb') ):
	function the_breadcrumb() {
		if (!is_home()) {
			echo '<a href="';
			echo get_option('home');
			echo '">';
			_e("Home", 'ci_theme');
			echo "</a> &raquo; ";
			if (is_category() || is_single()) {
				the_category(' &raquo; ');
				if (is_single()) {
					echo " &raquo; ";
					the_title();
				}
			} elseif (is_page()) {
				echo the_title();
			}
		}
	}
	endif;


	if( !function_exists('ci_add_wmode_transparent') ):
	function ci_add_wmode_transparent($html)
	{
		if (strpos($html, "<embed src=" ) !== false) {
			$html = str_replace('</param><embed', '</param><param name="wmode" value="transparent"></param><embed wmode="transparent" ', $html);
			return $html;
		}
		else {
			if(strpos($html, "wmode=transparent") == false){
				if(strpos($html, "?fs=" ) !== false){
					$search = array('?fs=1', '?fs=0');
					$replace = array('?fs=1&wmode=transparent', '?fs=0&wmode=transparent');
					$html = str_replace($search, $replace, $html);
					return $html;
				}
				else{
					$youtube_embed_code = $html;
					$patterns[] = '/youtube.com\/embed\/([a-zA-Z0-9._-]+)/';
					$replacements[] = 'youtube.com/embed/$1?wmode=transparent';
					return preg_replace($patterns, $replacements, $html);
				}
			}
			else{
				return $html;
			}
		}
	}
	endif;
	add_filter('embed_oembed_html', 'ci_add_wmode_transparent');

	// Correctly embed a video, depending if it's just a URL or HTML embed code.
	if( !function_exists('ci_embed_video') ):
	function ci_embed_video($width=620, $height=380, $div_id='entry-video', $div_class='entry-video', $post_id=null)
	{
		global $post;
		if($post_id===null) $post_id = $post->ID;

		$url = get_post_meta( $post_id, 'ci_format_video_url', true );
		if ( !empty( $url ) )
		{

			$div = '<div';
			if(!empty($div_id)) $div .= ' id="'.$div_id.'"';
			if(!empty($div_class)) $div .= ' class="'.$div_class.'"';
			$div .= '>';

			echo $div;

			if ( substr( $url, 0, 7 ) == 'http://' or substr( $url, 0, 8 ) == 'https://' ) {
				// It's a URL. Let's try oEmbed.
				$url = wp_oembed_get( $url, array( 'width' => $width ) );
			}

			// It's not a URL. Adjust width and height and spit out whatever they wrote.
			$count_width = 0;
			$count_height = 0;

			// Replace width
			$replacement_width = 'width="' . $width . '"';
			$url = preg_replace( '/width=["|\']?\d*["|\']?/', $replacement_width, $url, -1, $count_width );

			// Replace height
			$replacement_height = 'height="' . $height . '"';
			$url = preg_replace( '/height=["|\']?\d*["|\']?/', $replacement_height, $url, -1, $count_height );

			// No width? Let's add it
			if ( $count_width == 0 ) {
				$url = str_replace( '<iframe ', '<iframe ' . $replacement_width . ' ', $url );
				$url = str_replace( '<object ', '<object ' . $replacement_width . ' ', $url );
				$url = str_replace( '<embed ', '<embed ' . $replacement_width . ' ', $url );
			}

			// No height? Let's add it
			if ( $count_height == 0 ) {
				$url = str_replace( '<iframe ', '<iframe ' . $replacement_height . ' ', $url );
				$url = str_replace( '<object ', '<object ' . $replacement_height . ' ', $url );
				$url = str_replace( '<embed ', '<embed ' . $replacement_height . ' ', $url );
			}

			echo $url;

			echo '</div>';
		}
	}
	endif;
