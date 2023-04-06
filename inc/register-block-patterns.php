<?php
/**
 * Block patterns
 *
 * @package client-name
 * @since 1.0.0
 */

/**
 * Display the search term in the heading on the search page.
 * Todo: Remove when the query title block is updated to work for the search page.
 *
 * @since 1.0.0
 *
 * @return string Search page title
 */
function client_name_search_title() {
	if ( isset( $_GET['s'] ) ) {
		$search_term = sanitize_text_field( wp_unslash( $_GET['s'] ) );
		/* translators: %s: Search term. */
		return isset( $search_term ) ? sprintf( esc_html__( 'Search results for "%s"', 'client-name' ), esc_html( $search_term ) ) : __( 'Search results', 'client-name' );
	} else {
		return __( 'Search results placeholder title', 'client-name' );
	}
}


/**
 * Registers block patterns and block pattern categories.
 *
 * @since 1.0.0
 *
 * @return void
 */
function client_name_register_block_patterns() {

	/**
	 * Register an example block pattern category.
	 *
	 * @since 1.0.0
	 */
	register_block_pattern_category(
		'client-name',
		array( 'label' => esc_html__( 'Client Name', 'client-name' ) )
	);

}
add_action( 'init', 'client_name_register_block_patterns', 9 );