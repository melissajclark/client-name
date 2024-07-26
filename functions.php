<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package client-name
 * @since 1.0.0
 */

/**
 * The theme version.
 *
 * @since 1.0.0
 */
define( 'CLIENT_NAME_VERSION', wp_get_theme()->get( 'Version' ) );

/**
 * Add theme support for block styles and editor style.
 *
 * @since 1.0.0
 *
 * @return void
 */
function client_name_setup() {

    /**
     * Block Editor Support
     */
	add_theme_support( 'wp-block-styles' );
	add_editor_style( './assets/css/editor.css' );
	remove_theme_support( 'core-block-patterns' );

    /**
	 * Register custom image sizes for this theme.
	 *
	 * @link https://developer.wordpress.org/reference/functions/add_image_size/ 
	 * 
	 */
	//add_image_size( 'client_name_large_thumbnail', 817, 1067, true ); // 467x610 * 1.75

	/**
	 * Add the custom image sizes to the backend for the client.
	 *
	 * @link https://developer.wordpress.org/reference/functions/add_image_size/#for-media-library-images-admin  
	 * 
	 */

	//add_filter( 'image_size_names_choose', 'client_name_custom_image_sizes' );

}
add_action( 'after_setup_theme', 'client_name_setup' );


/**
 * Remove Block directory suggestions
 * 
 * @link https://developer.wordpress.org/block-editor/reference-guides/filters/editor-filters/#block-directory
 */

 remove_action( 'enqueue_block_editor_assets', 'wp_enqueue_editor_block_directory_assets' );

/**
 * Enqueue the CSS files.
 *
 * @since 1.0.0
 *
 * @return void
 */
function client_name_styles() {

	wp_enqueue_style( 
	    'client-name-style', 
	    get_stylesheet_directory_uri() . '/assets/css/style.css',
	    array(),
		filemtime( get_stylesheet_directory() . '/assets/css/style.css' )
	 );

	wp_enqueue_script( 
		'client-name-scripts', // handle (name)
		get_template_directory_uri() . '/assets/js/theme.js', // file location
		array('jquery'), // dependencies
		filemtime( get_stylesheet_directory() . '/assets/js/theme.js' ),
		true // load in footer 
	);	

}
add_action( 'wp_enqueue_scripts', 'client_name_styles' );

/**
 * Enqueue login page scripts and styles.
 */

 function client_name_login_page_styling() {

    wp_enqueue_style(
		'client-name-login-style', 
		get_template_directory_uri() . '/assets/css/login.css', 
	    array(),
		filemtime( get_stylesheet_directory() . '/assets/css/login.css' )
    );
}
add_action('login_enqueue_scripts', 'client_name_login_page_styling');

/**
 *
 * WordPress Login Page: Home URL instead of wordpress.org
 *
 */
if ( ! function_exists( 'client_name_login_url' ) ) :
    function client_name_login_url() {
        return home_url();
    }
endif;

add_filter( 'login_headerurl', 'client_name_login_url' );

// Filters.
require_once get_theme_file_path( 'inc/filters.php' );

// Block variations
require_once get_theme_file_path( 'inc/register-block-variations.php' );

// Block style and types
require_once get_theme_file_path( 'inc/register-block-styles-and-types.php' );

// Block pattern and block category examples.
require_once get_theme_file_path( 'inc/register-block-patterns.php' );