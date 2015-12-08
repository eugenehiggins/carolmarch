<!doctype html>
<!--[if IE 8]> <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action('after_open_body_tag'); ?>

<div id="mobile-bar">
	<a class="menu-trigger" href="#mobilemenu"><i class="fa fa-bars"></i></a>
	<h1 class="mob-title"><?php bloginfo('name'); ?></h1>
</div>

<div id="page">

	<header id="header">
		<?php ci_e_logo('<h1 id="logo" class="' . get_logo_class() . '">', '</h1>'); ?>

		<nav id="nav">
			<?php
				wp_nav_menu( array(
					'theme_location' 	=> 'ci_main_menu',
					'fallback_cb' 		=> '',
					'container' 		=> '',
					'menu_id' 			=> 'navigation',
					'menu_class' 		=> ''
				));
			?>
		</nav><!-- #nav -->

		<div id="mobilemenu">
			<?php
				wp_nav_menu( array(
					'theme_location' 	=> 'ci_main_menu',
					'fallback_cb' 		=> '',
					'container' 		=> '',
					'menu_id' 			=> '',
					'menu_class' 		=> ''
				));
			?>
		</div>
	</header>