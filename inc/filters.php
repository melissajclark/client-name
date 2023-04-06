<?php
/**
 * Filters
 *
 * @package client-name
 * @since 1.0.0
 */

/**
 * Filter body classes
 * 
 * @link https://developer.wordpress.org/reference/functions/body_class/
*/

add_filter( 'body_class', 'client_name_body_classes' );

function client_name_body_classes( $classes ) {

	$classes[] = 'client-name';
	
	/**
	 * Add 'archive' class to all archive pages so the .archive class can be used for styling.
	 */
	if ( is_home() || is_search() ) {
		$classes[] = 'archive';
	}

	return $classes;
}

/**
 * 
 * Remove un-needed Gravity Forms styling
 * 
 * @link https://docs.gravityforms.com/guide-to-gravity-forms-2-5-for-theme-developers/  
 */

 add_filter( 'gform_disable_form_theme_css', '__return_true' );

/**
* Filters the next, previous and submit buttons.
* Replaces the forms &amp;lt;input&amp;gt; buttons with &amp;lt;button&amp;gt; while maintaining attributes from original &amp;lt;input&amp;gt;.
*
* @param string $button Contains the &amp;lt;input&amp;gt; tag to be filtered.
* @param object $form Contains all the properties of the current form.
*
* @link https://docs.gravityforms.com/gform_submit_button/#h-1-change-input-to-button 
* @return string The filtered button.
*/
	add_filter( 'gform_next_button', 'input_to_button', 10, 2 );
	add_filter( 'gform_previous_button', 'input_to_button', 10, 2 );
	add_filter( 'gform_submit_button', 'input_to_button', 10, 2 );
	function input_to_button( $button, $form ) {
	$dom = new DOMDocument();
	$dom->loadHTML( '<?xml encoding="utf-8" ?>' . $button );
	$input = $dom->getElementsByTagName( 'input' )->item(0);
	$new_button = $dom->createElement( 'button' );
	$new_button->appendChild( $dom->createTextNode( $input->getAttribute( 'value' ) ) );
	$input->removeAttribute( 'value' );
	foreach( $input->attributes as $attribute ) {
	$new_button->setAttribute( $attribute->name, $attribute->value );
	}
	$input->parentNode->replaceChild( $new_button, $input );
	
	return $dom->saveHtml( $new_button );
}

/**
 * Show '(No title)' if a post has no title.
 *
 * @since 1.0.0
 */
add_filter(
	'the_title',
	function( $title ) {
		if ( ! is_admin() && empty( $title ) ) {
			$title = _x( '(No title)', 'Used if post or pages has no title', 'client-name' );
		}

		return $title;
	}
);

/**
 * Remove the default [...] on excerpts.
 *
 * @since 1.0.0
*/
add_filter(
	'excerpt_more',
	function( $more ) {
		return '';
	}
);


/**
 * Decrease the default excerpt length
 *
 * @since 1.0.0
*/
add_filter(
	'excerpt_length',
	function( $length ) {
		return 30;
	}
);
