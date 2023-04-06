<?php
/**
 * Block Variations
 *
 * @package client-name
 * @since 1.0.0
 */

/**
 * Block variation registration in JS file.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-variations/
 *
 * @since 1.0.0
 *
 * @return void
 */
function client_name_register_block_variations() {
	wp_enqueue_script(
		'client-name-block-variations',
		get_template_directory_uri() . '/assets/js/block-variations.js',
		array( 'wp-blocks' ),
		filemtime( get_stylesheet_directory() . '/assets/js/block-variations.js' ),
		true
	);
}
add_action( 'enqueue_block_editor_assets', 'client_name_register_block_variations' );
