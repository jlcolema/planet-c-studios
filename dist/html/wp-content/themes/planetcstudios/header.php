<?php
/**
 * Header file for the Planet C Studios WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Planet_C_Studios
 * @since Planet C Studios 1.0
 */

?>

<!doctype html>

<html class="no-js" <?php language_attributes(); ?>>

<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">

	<!-- <meta name="description" content=""> -->

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- <link rel="manifest" href="site.webmanifest"> -->
	<!-- <link rel="apple-touch-icon" href="icon.png"> -->

	<!-- <link rel="stylesheet" href="css/normalize.css"> -->
	<!-- <link rel="stylesheet" href="css/styles.css"> -->

	<meta name="theme-color" content="#000000">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<header role="banner" class="header">

		<div class="wrap heaer__wrap">

			<div class="logo">

				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo__link">

					<!-- If possible, use embedded SVG markup. -->

					<?php bloginfo( 'name' ); ?>

				</a>

			</div>

			<nav role="navigation" class="nav nav--primary">

				<div class="nav__toggle">

					<span class="nav__label">Menu</span>

				</div>

				<?php

					wp_nav_menu(
			
						array(
			
							'menu'					=> 'Primary Navigation',
							'menu_class'			=> '',
							'menu_id'				=> '',
							'container'				=> '',
							// 'container_class'	=> '',
							// 'container_id'		=> '',
							// 'fallback_cb'		=> '',
							// 'before'				=> '',
							// 'after'				=> '',
							// 'link_before'		=> '',
							// 'link_after'			=> '',
							// 'echo'				=> true,
							'depth'					=> 1,
							// 'walker'				=> '',
							'theme_location'		=> 'primary',
							'items_wrap'			=> '<ol class="nav__list %2$s">%3$s</ol>',
							// 'item_spacing'		=> 'preserve'
							
						)
						
					);

				?>

			</nav>

		</div>

	</header>

	<main role="main" class="main">

		<div class="wrap main__wrap">
