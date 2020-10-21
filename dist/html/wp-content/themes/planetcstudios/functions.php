<?php
/**
 * Planet C Studios functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Planet_C_Studios
 * @since Planet C Studios 1.0
 */

/**
 * Table of Contents:
 * Theme Support
 * Required Files
 * Register Styles
 * Register Scripts
 * Register Menus
 * Custom Logo
 * WP Body Open
 * Register Sidebars
 * Enqueue Block Editor Assets
 * Enqueue Classic Editor Styles
 * Block Editor Settings
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

function planetcstudios_theme_support() {

	// Add default posts and comments RSS feed links to head.

	// add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */

	// add_theme_support( 'post-thumbnails' );

	// Set post thumbnail size.

	// set_post_thumbnail_size( 1200, 9999 );

	// Add custom image size used in Cover Template.

	// add_image_size( 'planetcstudios-fullscreen', 1980, 9999 );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */

	 add_theme_support( 'title-tag' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */

	 add_theme_support(

		'html5',

		array(

			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',

		)

	);

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Planet C Studios, use a find and replace
	 * to change 'planetcstudios' to the name of your theme in all the template files.
	 */

	load_theme_textdomain( 'planetcstudios' );

	// Add support for responsive embeds.

	add_theme_support( 'responsive-embeds' );

	// Add theme support for selective refresh for widgets.

	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * Adds `async` and `defer` support for scripts registered or enqueued
	 * by the theme.
	 */

	$loader = new PlanetCStudios_Script_Loader();

	add_filter( 'script_loader_tag', array( $loader, 'filter_script_loader_tag' ), 10, 2 );

}

add_action( 'after_setup_theme', 'planetcstudios_theme_support' );

/**
 * Register and Enqueue Styles.
 */

function planetcstudios_register_styles() {

	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style( 'planetcstudios-style', get_stylesheet_uri(), array(), $theme_version );

	wp_style_add_data( 'planetcstudios-style', 'rtl', 'replace' );

	// Add output of Customizer settings as inline style.

	wp_add_inline_style( 'planetcstudios-style', planetcstudios_get_customizer_css( 'front-end' ) );

	// Add print CSS.

	wp_enqueue_style( 'planetcstudios-print-style', get_template_directory_uri() . '/print.css', null, $theme_version, 'print' );

}

add_action( 'wp_enqueue_scripts', 'planetcstudios_register_styles' );

/**
 * Register and Enqueue Scripts.
 */

function planetcstudios_register_scripts() {

	$theme_version = wp_get_theme()->get( 'Version' );

	if ( ( ! is_admin() ) && is_singular() && comments_open() && get_option( 'thread_comments' ) ) {

		wp_enqueue_script( 'comment-reply' );

	}

	wp_enqueue_script( 'planetcstudios-js', get_template_directory_uri() . '/assets/js/index.js', array(), $theme_version, false );

	wp_script_add_data( 'planetcstudios-js', 'async', true );

}

add_action( 'wp_enqueue_scripts', 'planetcstudios_register_scripts' );

/**
 * Register navigation menus uses wp_nav_menu in one place.
 */

function planetcstudios_menus() {

	$locations = array(

		'primary'  => __( 'Primary Navigation', 'planetcstudios' )

	);

	register_nav_menus( $locations );

}

add_action( 'init', 'planetcstudios_menus' );

/**
 * Register widget areas.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function planetcstudios_sidebar_registration() {

	// Arguments used in all register_sidebar() calls.
	$shared_args = array(
		'before_title'  => '<h2 class="widget-title subheading heading-size-3">',
		'after_title'   => '</h2>',
		'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
		'after_widget'  => '</div></div>',
	);

	// Footer #1.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Footer #1', 'planetcstudios' ),
				'id'          => 'sidebar-1',
				'description' => __( 'Widgets in this area will be displayed in the first column in the footer.', 'planetcstudios' ),
			)
		)
	);

	// Footer #2.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Footer #2', 'planetcstudios' ),
				'id'          => 'sidebar-2',
				'description' => __( 'Widgets in this area will be displayed in the second column in the footer.', 'planetcstudios' ),
			)
		)
	);

}

add_action( 'widgets_init', 'planetcstudios_sidebar_registration' );

/**
 * Enqueue supplemental block editor styles.
 */
function planetcstudios_block_editor_styles() {

	// Enqueue the editor styles.
	wp_enqueue_style( 'planetcstudios-block-editor-styles', get_theme_file_uri( '/assets/css/editor-style-block.css' ), array(), wp_get_theme()->get( 'Version' ), 'all' );
	wp_style_add_data( 'planetcstudios-block-editor-styles', 'rtl', 'replace' );

	// Add inline style from the Customizer.
	wp_add_inline_style( 'planetcstudios-block-editor-styles', planetcstudios_get_customizer_css( 'block-editor' ) );

	// Add inline style for non-latin fonts.
	wp_add_inline_style( 'planetcstudios-block-editor-styles', PlanetCStudios_Non_Latin_Languages::get_non_latin_css( 'block-editor' ) );

	// Enqueue the editor script.
	wp_enqueue_script( 'planetcstudios-block-editor-script', get_theme_file_uri( '/assets/js/editor-script-block.js' ), array( 'wp-blocks', 'wp-dom' ), wp_get_theme()->get( 'Version' ), true );
}

add_action( 'enqueue_block_editor_assets', 'planetcstudios_block_editor_styles', 1, 1 );

/**
 * Enqueue classic editor styles.
 */
function planetcstudios_classic_editor_styles() {

	$classic_editor_styles = array(
		'/assets/css/editor-style-classic.css',
	);

	add_editor_style( $classic_editor_styles );

}

add_action( 'init', 'planetcstudios_classic_editor_styles' );

/**
 * Output Customizer settings in the classic editor.
 * Adds styles to the head of the TinyMCE iframe. Kudos to @Otto42 for the original solution.
 *
 * @param array $mce_init TinyMCE styles.
 * @return array TinyMCE styles.
 */
function planetcstudios_add_classic_editor_customizer_styles( $mce_init ) {

	$styles = planetcstudios_get_customizer_css( 'classic-editor' );

	if ( ! isset( $mce_init['content_style'] ) ) {
		$mce_init['content_style'] = $styles . ' ';
	} else {
		$mce_init['content_style'] .= ' ' . $styles . ' ';
	}

	return $mce_init;

}

add_filter( 'tiny_mce_before_init', 'planetcstudios_add_classic_editor_customizer_styles' );

/**
 * Output non-latin font styles in the classic editor.
 * Adds styles to the head of the TinyMCE iframe. Kudos to @Otto42 for the original solution.
 *
 * @param array $mce_init TinyMCE styles.
 * @return array TinyMCE styles.
 */
function planetcstudios_add_classic_editor_non_latin_styles( $mce_init ) {

	$styles = PlanetCStudios_Non_Latin_Languages::get_non_latin_css( 'classic-editor' );

	// Return if there are no styles to add.
	if ( ! $styles ) {
		return $mce_init;
	}

	if ( ! isset( $mce_init['content_style'] ) ) {
		$mce_init['content_style'] = $styles . ' ';
	} else {
		$mce_init['content_style'] .= ' ' . $styles . ' ';
	}

	return $mce_init;

}

add_filter( 'tiny_mce_before_init', 'planetcstudios_add_classic_editor_non_latin_styles' );

/**
 * Block Editor Settings.
 * Add custom colors and font sizes to the block editor.
 */
function planetcstudios_block_editor_settings() {

	// Block Editor Palette.
	$editor_color_palette = array(
		array(
			'name'  => __( 'Accent Color', 'planetcstudios' ),
			'slug'  => 'accent',
			'color' => planetcstudios_get_color_for_area( 'content', 'accent' ),
		),
		array(
			'name'  => __( 'Primary', 'planetcstudios' ),
			'slug'  => 'primary',
			'color' => planetcstudios_get_color_for_area( 'content', 'text' ),
		),
		array(
			'name'  => __( 'Secondary', 'planetcstudios' ),
			'slug'  => 'secondary',
			'color' => planetcstudios_get_color_for_area( 'content', 'secondary' ),
		),
		array(
			'name'  => __( 'Subtle Background', 'planetcstudios' ),
			'slug'  => 'subtle-background',
			'color' => planetcstudios_get_color_for_area( 'content', 'borders' ),
		),
	);

	// Add the background option.
	$background_color = get_theme_mod( 'background_color' );
	if ( ! $background_color ) {
		$background_color_arr = get_theme_support( 'custom-background' );
		$background_color     = $background_color_arr[0]['default-color'];
	}
	$editor_color_palette[] = array(
		'name'  => __( 'Background Color', 'planetcstudios' ),
		'slug'  => 'background',
		'color' => '#' . $background_color,
	);

	// If we have accent colors, add them to the block editor palette.
	if ( $editor_color_palette ) {
		add_theme_support( 'editor-color-palette', $editor_color_palette );
	}

	// Block Editor Font Sizes.
	add_theme_support(
		'editor-font-sizes',
		array(
			array(
				'name'      => _x( 'Small', 'Name of the small font size in the block editor', 'planetcstudios' ),
				'shortName' => _x( 'S', 'Short name of the small font size in the block editor.', 'planetcstudios' ),
				'size'      => 18,
				'slug'      => 'small',
			),
			array(
				'name'      => _x( 'Regular', 'Name of the regular font size in the block editor', 'planetcstudios' ),
				'shortName' => _x( 'M', 'Short name of the regular font size in the block editor.', 'planetcstudios' ),
				'size'      => 21,
				'slug'      => 'normal',
			),
			array(
				'name'      => _x( 'Large', 'Name of the large font size in the block editor', 'planetcstudios' ),
				'shortName' => _x( 'L', 'Short name of the large font size in the block editor.', 'planetcstudios' ),
				'size'      => 26.25,
				'slug'      => 'large',
			),
			array(
				'name'      => _x( 'Larger', 'Name of the larger font size in the block editor', 'planetcstudios' ),
				'shortName' => _x( 'XL', 'Short name of the larger font size in the block editor.', 'planetcstudios' ),
				'size'      => 32,
				'slug'      => 'larger',
			),
		)
	);

	add_theme_support( 'editor-styles' );

	// If we have a dark background color then add support for dark editor style.
	// We can determine if the background color is dark by checking if the text-color is white.
	if ( '#ffffff' === strtolower( planetcstudios_get_color_for_area( 'content', 'text' ) ) ) {
		add_theme_support( 'dark-editor-style' );
	}

}

add_action( 'after_setup_theme', 'planetcstudios_block_editor_settings' );

/**
 * Overwrite default more tag with styling and screen reader markup.
 *
 * @param string $html The default output HTML for the more tag.
 * @return string
 */
function planetcstudios_read_more_tag( $html ) {
	return preg_replace( '/<a(.*)>(.*)<\/a>/iU', sprintf( '<div class="read-more-button-wrap"><a$1><span class="faux-button">$2</span> <span class="screen-reader-text">"%1$s"</span></a></div>', get_the_title( get_the_ID() ) ), $html );
}

add_filter( 'the_content_more_link', 'planetcstudios_read_more_tag' );

/**
 * Enqueues scripts for customizer controls & settings.
 *
 * @since Planet C Studios 1.0
 *
 * @return void
 */
function planetcstudios_customize_controls_enqueue_scripts() {
	$theme_version = wp_get_theme()->get( 'Version' );

	// Add main customizer js file.
	wp_enqueue_script( 'planetcstudios-customize', get_template_directory_uri() . '/assets/js/customize.js', array( 'jquery' ), $theme_version, false );

	// Add script for color calculations.
	wp_enqueue_script( 'planetcstudios-color-calculations', get_template_directory_uri() . '/assets/js/color-calculations.js', array( 'wp-color-picker' ), $theme_version, false );

	// Add script for controls.
	wp_enqueue_script( 'planetcstudios-customize-controls', get_template_directory_uri() . '/assets/js/customize-controls.js', array( 'planetcstudios-color-calculations', 'customize-controls', 'underscore', 'jquery' ), $theme_version, false );
	wp_localize_script( 'planetcstudios-customize-controls', 'planetCStudiosBgColors', planetcstudios_get_customizer_color_vars() );
}

add_action( 'customize_controls_enqueue_scripts', 'planetcstudios_customize_controls_enqueue_scripts' );

/**
 * Enqueue scripts for the customizer preview.
 *
 * @since Planet C Studios 1.0
 *
 * @return void
 */
function planetcstudios_customize_preview_init() {
	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script( 'planetcstudios-customize-preview', get_theme_file_uri( '/assets/js/customize-preview.js' ), array( 'customize-preview', 'customize-selective-refresh', 'jquery' ), $theme_version, true );
	wp_localize_script( 'planetcstudios-customize-preview', 'planetCStudiosBgColors', planetcstudios_get_customizer_color_vars() );
	wp_localize_script( 'planetcstudios-customize-preview', 'planetCStudiosPreviewEls', planetcstudios_get_elements_array() );

	wp_add_inline_script(
		'planetcstudios-customize-preview',
		sprintf(
			'wp.customize.selectiveRefresh.partialConstructor[ %1$s ].prototype.attrs = %2$s;',
			wp_json_encode( 'cover_opacity' ),
			wp_json_encode( planetcstudios_customize_opacity_range() )
		)
	);
}

add_action( 'customize_preview_init', 'planetcstudios_customize_preview_init' );

/**
 * Get accessible color for an area.
 *
 * @since Planet C Studios 1.0
 *
 * @param string $area The area we want to get the colors for.
 * @param string $context Can be 'text' or 'accent'.
 * @return string Returns a HEX color.
 */
function planetcstudios_get_color_for_area( $area = 'content', $context = 'text' ) {

	// Get the value from the theme-mod.
	$settings = get_theme_mod(
		'accent_accessible_colors',
		array(
			'content'       => array(
				'text'      => '#000000',
				'accent'    => '#cd2653',
				'secondary' => '#6d6d6d',
				'borders'   => '#dcd7ca',
			),
			'header-footer' => array(
				'text'      => '#000000',
				'accent'    => '#cd2653',
				'secondary' => '#6d6d6d',
				'borders'   => '#dcd7ca',
			),
		)
	);

	// If we have a value return it.
	if ( isset( $settings[ $area ] ) && isset( $settings[ $area ][ $context ] ) ) {
		return $settings[ $area ][ $context ];
	}

	// Return false if the option doesn't exist.
	return false;
}

/**
 * Returns an array of variables for the customizer preview.
 *
 * @since Planet C Studios 1.0
 *
 * @return array
 */
function planetcstudios_get_customizer_color_vars() {
	$colors = array(
		'content'       => array(
			'setting' => 'background_color',
		),
		'header-footer' => array(
			'setting' => 'header_footer_background_color',
		),
	);
	return $colors;
}

/**
 * Get an array of elements.
 *
 * @since Planet C Studios 1.0
 *
 * @return array
 */
function planetcstudios_get_elements_array() {

	// The array is formatted like this:
	// [key-in-saved-setting][sub-key-in-setting][css-property] = [elements].
	$elements = array(
		'content'       => array(
			'accent'     => array(
				'color'            => array( '.color-accent', '.color-accent-hover:hover', '.color-accent-hover:focus', ':root .has-accent-color', '.has-drop-cap:not(:focus):first-letter', '.wp-block-button.is-style-outline', 'a' ),
				'border-color'     => array( 'blockquote', '.border-color-accent', '.border-color-accent-hover:hover', '.border-color-accent-hover:focus' ),
				'background-color' => array( 'button', '.button', '.faux-button', '.wp-block-button__link', '.wp-block-file .wp-block-file__button', 'input[type="button"]', 'input[type="reset"]', 'input[type="submit"]', '.bg-accent', '.bg-accent-hover:hover', '.bg-accent-hover:focus', ':root .has-accent-background-color', '.comment-reply-link' ),
				'fill'             => array( '.fill-children-accent', '.fill-children-accent *' ),
			),
			'background' => array(
				'color'            => array( ':root .has-background-color', 'button', '.button', '.faux-button', '.wp-block-button__link', '.wp-block-file__button', 'input[type="button"]', 'input[type="reset"]', 'input[type="submit"]', '.wp-block-button', '.comment-reply-link', '.has-background.has-primary-background-color:not(.has-text-color)', '.has-background.has-primary-background-color *:not(.has-text-color)', '.has-background.has-accent-background-color:not(.has-text-color)', '.has-background.has-accent-background-color *:not(.has-text-color)' ),
				'background-color' => array( ':root .has-background-background-color' ),
			),
			'text'       => array(
				'color'            => array( 'body', '.entry-title a', ':root .has-primary-color' ),
				'background-color' => array( ':root .has-primary-background-color' ),
			),
			'secondary'  => array(
				'color'            => array( 'cite', 'figcaption', '.wp-caption-text', '.post-meta', '.entry-content .wp-block-archives li', '.entry-content .wp-block-categories li', '.entry-content .wp-block-latest-posts li', '.wp-block-latest-comments__comment-date', '.wp-block-latest-posts__post-date', '.wp-block-embed figcaption', '.wp-block-image figcaption', '.wp-block-pullquote cite', '.comment-metadata', '.comment-respond .comment-notes', '.comment-respond .logged-in-as', '.pagination .dots', '.entry-content hr:not(.has-background)', 'hr.styled-separator', ':root .has-secondary-color' ),
				'background-color' => array( ':root .has-secondary-background-color' ),
			),
			'borders'    => array(
				'border-color'        => array( 'pre', 'fieldset', 'input', 'textarea', 'table', 'table *', 'hr' ),
				'background-color'    => array( 'caption', 'code', 'code', 'kbd', 'samp', '.wp-block-table.is-style-stripes tbody tr:nth-child(odd)', ':root .has-subtle-background-background-color' ),
				'border-bottom-color' => array( '.wp-block-table.is-style-stripes' ),
				'border-top-color'    => array( '.wp-block-latest-posts.is-grid li' ),
				'color'               => array( ':root .has-subtle-background-color' ),
			),
		),
		'header-footer' => array(
			'accent'     => array(
				'color'            => array( 'body:not(.overlay-header) .primary-menu > li > a', 'body:not(.overlay-header) .primary-menu > li > .icon', '.modal-menu a', '.footer-menu a, .footer-widgets a', '#site-footer .wp-block-button.is-style-outline', '.wp-block-pullquote:before', '.singular:not(.overlay-header) .entry-header a', '.archive-header a', '.header-footer-group .color-accent', '.header-footer-group .color-accent-hover:hover' ),
				'background-color' => array( '.social-icons a', '#site-footer button:not(.toggle)', '#site-footer .button', '#site-footer .faux-button', '#site-footer .wp-block-button__link', '#site-footer .wp-block-file__button', '#site-footer input[type="button"]', '#site-footer input[type="reset"]', '#site-footer input[type="submit"]' ),
			),
			'background' => array(
				'color'            => array( '.social-icons a', 'body:not(.overlay-header) .primary-menu ul', '.header-footer-group button', '.header-footer-group .button', '.header-footer-group .faux-button', '.header-footer-group .wp-block-button:not(.is-style-outline) .wp-block-button__link', '.header-footer-group .wp-block-file__button', '.header-footer-group input[type="button"]', '.header-footer-group input[type="reset"]', '.header-footer-group input[type="submit"]' ),
				'background-color' => array( '#site-header', '.footer-nav-widgets-wrapper', '#site-footer', '.menu-modal', '.menu-modal-inner', '.search-modal-inner', '.archive-header', '.singular .entry-header', '.singular .featured-media:before', '.wp-block-pullquote:before' ),
			),
			'text'       => array(
				'color'               => array( '.header-footer-group', 'body:not(.overlay-header) #site-header .toggle', '.menu-modal .toggle' ),
				'background-color'    => array( 'body:not(.overlay-header) .primary-menu ul' ),
				'border-bottom-color' => array( 'body:not(.overlay-header) .primary-menu > li > ul:after' ),
				'border-left-color'   => array( 'body:not(.overlay-header) .primary-menu ul ul:after' ),
			),
			'secondary'  => array(
				'color' => array( '.site-description', 'body:not(.overlay-header) .toggle-inner .toggle-text', '.widget .post-date', '.widget .rss-date', '.widget_archive li', '.widget_categories li', '.widget cite', '.widget_pages li', '.widget_meta li', '.widget_nav_menu li', '.powered-by-wordpress', '.to-the-top', '.singular .entry-header .post-meta', '.singular:not(.overlay-header) .entry-header .post-meta a' ),
			),
			'borders'    => array(
				'border-color'     => array( '.header-footer-group pre', '.header-footer-group fieldset', '.header-footer-group input', '.header-footer-group textarea', '.header-footer-group table', '.header-footer-group table *', '.footer-nav-widgets-wrapper', '#site-footer', '.menu-modal nav *', '.footer-widgets-outer-wrapper', '.footer-top' ),
				'background-color' => array( '.header-footer-group table caption', 'body:not(.overlay-header) .header-inner .toggle-wrapper::before' ),
			),
		),
	);

	/**
	* Filters Planet C Studios theme elements
	*
	* @since Planet C Studios 1.0
	*
	* @param array Array of elements
	*/
	return apply_filters( 'planetcstudios_get_elements_array', $elements );
}

/* Need to Organize */

/*----------------------------------------*\
   Title
\*----------------------------------------*/

// Notes...

/*----------------------------------------*\
   Support for SVG
\*----------------------------------------*/

// Notes...

// function cc_mime_types( $mimes ) {

	// $mimes['svg'] = 'image/svg+xml';

	// return $mimes;

// }

/*----------------------------------------*\
   Remove Block Library CSS
\*----------------------------------------*/

// Notes...

// function planetcstudios_remove_wp_block_library_css() {

	// wp_dequeue_style( 'wp-block-library' );

	// wp_dequeue_style( 'wp-block-library-theme' );

	// wp_dequeue_style( 'wc-block-style' ); // for WooCommerce

// }

// add_action( 'wp_enqueue_scripts', 'planetcstudios_remove_wp_block_library_css', 100);

/*----------------------------------------*\
   Deregister Features
\*----------------------------------------*/

// Notes...

// function deregister_features() {

	/* Title
	------------------------------------------*/

	// Notes...

	// wp_deregister_script( 'wp-embed' );

	/* Title
	------------------------------------------*/

	// Notes...

	// remove_action( 'wp_head', 'print_emoji_detection_script', 7 );

	// remove_action( 'wp_print_styles', 'print_emoji_styles' );

	/* Title
	------------------------------------------*/

	// Notes...

	// global $wp_widget_factory;

	// remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );

	/* Title
	------------------------------------------*/

	// Notes...

	// remove_action( 'wp_head', 'wp_generator' );

	/* Title
	------------------------------------------*/

	// Notes...

	// remove_action( 'wp_head', 'wlwmanifest_link' );

	/* Title
	------------------------------------------*/

	// Notes...

	// remove_action( 'wp_head', 'rsd_link' );

	/* Title
	------------------------------------------*/

	// Notes...

	// remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );

	/* Title
	------------------------------------------*/

	// Notes...

	// remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );

	// remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );

	/* Title
	------------------------------------------*/

	// Notes...

	// remove_action( 'wp_head', 'rel_canonical' );

	/* Title
	------------------------------------------*/

	// Notes...

	// remove_action( 'wp_head', 'wp_resource_hints', 2 );

// }

// add_action( 'init', 'deregister_features' );

/*----------------------------------------*\
   SVG
\*----------------------------------------*/

// Notes...

// function add_file_types_to_uploads($file_types) {

	// $new_filetypes = array();
	// $new_filetypes['svg'] = 'image/svg+xml';
	// $file_types = array_merge($file_types, $new_filetypes);

	// return $file_types;

// }

// add_action('upload_mimes', 'add_file_types_to_uploads');

/*----------------------------------------*\
   Contact Form 7
\*----------------------------------------*/

// Disable initial loading of stylesheet and script.

// add_filter( 'wpcf7_load_css', '__return_false' );

// add_filter( 'wpcf7_load_js', '__return_false' );

/*----------------------------------------*\
   Advanced Custom Fields
\*----------------------------------------*/

// Notes...

if ( function_exists( 'acf_add_options_page' ) ) {

	acf_add_options_page( array(

		'page_title'	=> 'Globals',
		'menu_title'	=> 'Globals',
		'menu_slug'		=> 'globals',
		'capability'	=> 'edit_posts',
		// 'redirect'		=> false

	) );

	acf_add_options_sub_page( array(

		'page_title'		=> 'About',
		'menu_title'		=> 'About',
		'parent_slug'	=> 'globals'

	) );
	
	acf_add_options_sub_page( array(

		'page_title'		=> 'Contact Information',
		'menu_title'		=> 'Contact Information',
		'parent_slug'	=> 'globals'

	) );

	acf_add_options_sub_page( array(

		'page_title'		=> 'Social Media',
		'menu_title'		=> 'Social Media',
		'parent_slug'	=> 'globals'

	) );

	acf_add_options_sub_page( array(

		'page_title'		=> '404',
		'menu_title'		=> '404',
		'parent_slug'	=> 'globals'

	) );

}
