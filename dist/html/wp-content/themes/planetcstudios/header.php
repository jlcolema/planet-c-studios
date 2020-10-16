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

	<!-- <title>Title</title> -->

	<!-- <meta name="description" content=""> -->

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- <meta property="og:title" content=""> -->
	<!-- <meta property="og:type" content=""> -->
	<!-- <meta property="og:url" content=""> -->
	<!-- <meta property="og:image" content=""> -->

	<!-- <link rel="manifest" href="site.webmanifest"> -->
	<!-- <link rel="apple-touch-icon" href="icon.png"> -->
	<!-- Place favicon.ico in the root directory -->

	<!-- <link rel="stylesheet" href="css/normalize.css"> -->
	<!-- <link rel="stylesheet" href="css/styles.css"> -->

	<meta name="theme-color" content="#fafafa">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<header role="banner" class="">

		<div class="wrap">

			<div class="logo">

				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo__link">

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

	<?php
	wp_body_open();
	?>

	<header id="site-header" class="header-footer-group" role="banner">

		<div class="header-inner section-inner">

			<div class="header-titles-wrapper">

				<?php

				// Check whether the header search is activated in the customizer.
				$enable_header_search = get_theme_mod( 'enable_header_search', true );

				if ( true === $enable_header_search ) {

					?>

					<button class="toggle search-toggle mobile-search-toggle" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false">
						<span class="toggle-inner">
							<span class="toggle-icon">
								<?php planetcstudios_the_theme_svg( 'search' ); ?>
							</span>
							<span class="toggle-text"><?php _e( 'Search', 'planetcstudios' ); ?></span>
						</span>
					</button><!-- .search-toggle -->

				<?php } ?>

				<div class="header-titles">

					<?php
						// Site title or logo.
						planetcstudios_site_logo();

						// Site description.
						planetcstudios_site_description();
					?>

				</div><!-- .header-titles -->

				<button class="toggle nav-toggle mobile-nav-toggle" data-toggle-target=".menu-modal"  data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">
					<span class="toggle-inner">
						<span class="toggle-icon">
							<?php planetcstudios_the_theme_svg( 'ellipsis' ); ?>
						</span>
						<span class="toggle-text"><?php _e( 'Menu', 'planetcstudios' ); ?></span>
					</span>
				</button><!-- .nav-toggle -->

			</div><!-- .header-titles-wrapper -->

			<div class="header-navigation-wrapper">

				<?php
				if ( has_nav_menu( 'primary' ) || ! has_nav_menu( 'expanded' ) ) {
					?>

						<nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e( 'Horizontal', 'planetcstudios' ); ?>" role="navigation">

							<ul class="primary-menu reset-list-style">

							<?php
							if ( has_nav_menu( 'primary' ) ) {

								wp_nav_menu(
									array(
										'container'  => '',
										'items_wrap' => '%3$s',
										'theme_location' => 'primary',
									)
								);

							} elseif ( ! has_nav_menu( 'expanded' ) ) {

								wp_list_pages(
									array(
										'match_menu_classes' => true,
										'show_sub_menu_icons' => true,
										'title_li' => false,
										'walker'   => new PlanetCStudios_Walker_Page(),
									)
								);

							}
							?>

							</ul>

						</nav><!-- .primary-menu-wrapper -->

					<?php
				}

				if ( true === $enable_header_search || has_nav_menu( 'expanded' ) ) {
					?>

					<div class="header-toggles hide-no-js">

					<?php
					if ( has_nav_menu( 'expanded' ) ) {
						?>

						<div class="toggle-wrapper nav-toggle-wrapper has-expanded-menu">

							<button class="toggle nav-toggle desktop-nav-toggle" data-toggle-target=".menu-modal" data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">
								<span class="toggle-inner">
									<span class="toggle-text"><?php _e( 'Menu', 'planetcstudios' ); ?></span>
									<span class="toggle-icon">
										<?php planetcstudios_the_theme_svg( 'ellipsis' ); ?>
									</span>
								</span>
							</button><!-- .nav-toggle -->

						</div><!-- .nav-toggle-wrapper -->

						<?php
					}

					if ( true === $enable_header_search ) {
						?>

						<div class="toggle-wrapper search-toggle-wrapper">

							<button class="toggle search-toggle desktop-search-toggle" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false">
								<span class="toggle-inner">
									<?php planetcstudios_the_theme_svg( 'search' ); ?>
									<span class="toggle-text"><?php _e( 'Search', 'planetcstudios' ); ?></span>
								</span>
							</button><!-- .search-toggle -->

						</div>

						<?php
					}
					?>

					</div><!-- .header-toggles -->
					<?php
				}
				?>

			</div><!-- .header-navigation-wrapper -->

		</div><!-- .header-inner -->

		<?php
		// Output the search modal (if it is activated in the customizer).
		if ( true === $enable_header_search ) {
			get_template_part( 'template-parts/modal-search' );
		}
		?>

	</header><!-- #site-header -->

	<?php
	// Output the menu modal.
	get_template_part( 'template-parts/modal-menu' );
