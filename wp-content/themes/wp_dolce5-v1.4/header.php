<!doctype html>
<!--[if lt IE 7 ]><html class="ie ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
<?php do_action('after_open_body_tag'); ?>

<div class="container wrapper">
	<div class="sixteen columns clearfix">
		<header class="header">
			<?php
				if ( is_page_template('template-frontpage-2.php') ) {
					get_template_part('part-slider');
				} else if ( is_page_template('template-frontpage-3.php') || is_page_template('template-frontpage-4.php')) {
					get_template_part('part-top-featured');
				}
			?>
			<div class="logo">
				<div class="logo-wrap <?php logo_class(); ?>">
					<?php ci_e_logo('<h1>', '</h1>'); ?>
					<?php ci_e_slogan('<span class="logo-tagline">', '</span>'); ?>
				</div>
			</div> <!-- .logo -->
			<div class="nav-bar clearfix">
				<nav class="navigation twelve columns alpha">
					<?php
						if (has_nav_menu('ci_main_menu')) 
							wp_nav_menu( array(
								'theme_location' 	=> 'ci_main_menu',
								'fallback_cb' 		=> '',
								'container' 		=> '',
								'menu_id' 			=> 'navigation',
								'menu_class' 		=> 'sf-menu'
							));
						else 
							wp_page_menu(array('menu_class'=>''));
							
					?>
				</nav> <!-- .navigation -->
				<div class="quick-search four columns omega">
					<aside class="quick-search">
						<?php get_search_form(); ?>
					</aside>
				</div> <!-- .quick-search -->
			</div> <!-- .nav-bar -->
		</header> <!-- .header -->