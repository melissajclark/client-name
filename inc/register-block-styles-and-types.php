<?php
/**
 * Block styles.
 *
 * @package client-name
 * @since 1.0.0
 */


/**
 * Theme settings for existing Block Styles and custom ones too.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-styles/
 * @see https://github.com/WordPress/gutenberg/pull/37580
 *
 * @since 1.0.0
 *
 * @return void
 */
function client_name_block_styles() {
	wp_enqueue_script(
		'client-name-block-styles',
		get_stylesheet_directory_uri() . '/assets/js/block-styles-and-types.js',
		array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ),
		filemtime( get_stylesheet_directory() . '/assets/js/block-styles-and-types.js' ),
		true
	);
}
add_action( 'enqueue_block_editor_assets', 'client_name_block_styles' );