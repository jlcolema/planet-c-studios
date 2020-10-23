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


	// Add custom image sizes for project covers.

	add_image_size( 'cover-large', 380, 560, true );

	add_image_size( 'cover-small', 180, 270, true );


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

	// add_theme_support( 'customize-selective-refresh-widgets' );

}

add_action( 'after_setup_theme', 'planetcstudios_theme_support' );

/**
 * Register and Enqueue Styles.
 */

function planetcstudios_register_styles() {

	// $theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style( 'styles', get_template_directory_uri() . '/assets/css/styles.css', array(), $theme_version );

	// wp_style_add_data( 'styles-rtl', 'rtl', 'replace' );

}

add_action( 'wp_enqueue_scripts', 'planetcstudios_register_styles' );

/**
 * Register and Enqueue Scripts.
 */

function planetcstudios_register_scripts() {

	// $theme_version = wp_get_theme()->get( 'Version' );

	// if ( ( ! is_admin() ) && is_singular() && comments_open() && get_option( 'thread_comments' ) ) {

		// wp_enqueue_script( 'comment-reply' );

	// }

	/* Add Modernizr for feature detection */

	/* Figure out why this moves the `head` element below the `body` element. */

	// wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/vendor/modernizr.3.6.0.js', array(), $theme_version, true );

	// wp_script_add_data( 'modernizr', 'async', true );

	/* Remove WordPress default jQuery and upgrade to latest version */

	if ( ! is_admin() ) {

		wp_deregister_script( 'jquery' );

		wp_register_script( 'jquery', get_template_directory_uri() . '/assets/js/vendor/jquery.3.5.1.js', array(), $theme_version, true );

		wp_enqueue_script( 'jquery' );

		wp_script_add_data( 'jquery', 'async', true );

	}

	wp_enqueue_script( 'functions', get_template_directory_uri() . '/assets/js/functions.js', array(), $theme_version, true );

	wp_script_add_data( 'functions', 'async', true );

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

// function planetcstudios_sidebar_registration() {

	// Arguments used in all register_sidebar() calls.

	// $shared_args = array(

		// 'before_title'  => '<h2 class="widget-title subheading heading-size-3">',
		// 'after_title'   => '</h2>',
		// 'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
		// 'after_widget'  => '</div></div>',

	// );

	// Footer #1.

	// register_sidebar(

		// array_merge(

			// $shared_args,

			// array(

				// 'name'        => __( 'Footer #1', 'planetcstudios' ),
				// 'id'          => 'sidebar-1',
				// 'description' => __( 'Widgets in this area will be displayed in the first column in the footer.', 'planetcstudios' ),

			// )

		// )

	// );

	// Footer #2.

	// register_sidebar(

		// array_merge(

			// $shared_args,

			// array(

				// 'name'        => __( 'Footer #2', 'planetcstudios' ),
				// 'id'          => 'sidebar-2',
				// 'description' => __( 'Widgets in this area will be displayed in the second column in the footer.', 'planetcstudios' ),

			// )

		// )

	// );

// }

// add_action( 'widgets_init', 'planetcstudios_sidebar_registration' );

/**
 * Enqueue classic editor styles.
 */

// function planetcstudios_classic_editor_styles() {

	// $classic_editor_styles = array(

		// '/assets/css/editor-style-classic.css',

	// );

	// add_editor_style( $classic_editor_styles );

// }

// add_action( 'init', 'planetcstudios_classic_editor_styles' );

/**
 * Output Customizer settings in the classic editor.
 * Adds styles to the head of the TinyMCE iframe. Kudos to @Otto42 for the original solution.
 *
 * @param array $mce_init TinyMCE styles.
 * @return array TinyMCE styles.
 */

// function planetcstudios_add_classic_editor_customizer_styles( $mce_init ) {

	// $styles = planetcstudios_get_customizer_css( 'classic-editor' );

	// if ( ! isset( $mce_init['content_style'] ) ) {

		// $mce_init['content_style'] = $styles . ' ';

	// } else {

		// $mce_init['content_style'] .= ' ' . $styles . ' ';

	// }

	// return $mce_init;

// }

// add_filter( 'tiny_mce_before_init', 'planetcstudios_add_classic_editor_customizer_styles' );

/**
 * Output non-latin font styles in the classic editor.
 * Adds styles to the head of the TinyMCE iframe. Kudos to @Otto42 for the original solution.
 *
 * @param array $mce_init TinyMCE styles.
 * @return array TinyMCE styles.
 */

// function planetcstudios_add_classic_editor_non_latin_styles( $mce_init ) {

	// $styles = PlanetCStudios_Non_Latin_Languages::get_non_latin_css( 'classic-editor' );

	// Return if there are no styles to add.

	// if ( ! $styles ) {

		// return $mce_init;

	// }

	// if ( ! isset( $mce_init['content_style'] ) ) {

		// $mce_init['content_style'] = $styles . ' ';

	// } else {

		// $mce_init['content_style'] .= ' ' . $styles . ' ';

	// }

	// return $mce_init;

// }

// add_filter( 'tiny_mce_before_init', 'planetcstudios_add_classic_editor_non_latin_styles' );

/**
 * Support for SVG
 */

// Notes...

// function cc_mime_types( $mimes ) {

	// $mimes['svg'] = 'image/svg+xml';

	// return $mimes;

// }

/**
 * Remove Block Library CSS
 */

function planetcstudios_remove_wp_block_library_css() {

	wp_dequeue_style( 'wp-block-library' );

	wp_dequeue_style( 'wp-block-library-theme' );

	// wp_dequeue_style( 'wc-block-style' ); // for WooCommerce

}

add_action( 'wp_enqueue_scripts', 'planetcstudios_remove_wp_block_library_css', 100);

/**
 * Deregister Features
 */

function deregister_features() {

	/* Title
	------------------------------------------*/

	/* Title
	------------------------------------------*/

	// Notes...

	wp_deregister_script( 'wp-embed' );

	/* Title
	------------------------------------------*/

	// Notes...

	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );

	remove_action( 'wp_print_styles', 'print_emoji_styles' );

	/* Title
	------------------------------------------*/

	// Notes...

	global $wp_widget_factory;

	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );

	/* Title
	------------------------------------------*/

	// Notes...

	remove_action( 'wp_head', 'wp_generator' );

	/* Title
	------------------------------------------*/

	// Notes...

	remove_action( 'wp_head', 'wlwmanifest_link' );

	/* Title
	------------------------------------------*/

	// Notes...

	remove_action( 'wp_head', 'rsd_link' );

	/* Title
	------------------------------------------*/

	// Notes...

	remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );

	/* Title
	------------------------------------------*/

	// Notes...

	remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );

	remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );

	/* Title
	------------------------------------------*/

	// Notes...

	remove_action( 'wp_head', 'rel_canonical' );

	/* Title
	------------------------------------------*/

	// Notes...

	remove_action( 'wp_head', 'wp_resource_hints', 2 );

}

add_action( 'init', 'deregister_features' );

/**
 * SVG
 */

// Notes...

// function add_file_types_to_uploads($file_types) {

	// $new_filetypes = array();
	// $new_filetypes['svg'] = 'image/svg+xml';
	// $file_types = array_merge($file_types, $new_filetypes);

	// return $file_types;

// }

// add_action('upload_mimes', 'add_file_types_to_uploads');

/**
 * Contact Form 7
 */

// Disable initial loading of stylesheet and script.

add_filter( 'wpcf7_load_css', '__return_false' );

// add_filter( 'wpcf7_load_js', '__return_false' );

/**
 * Advanced Custom Fields
 */

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
