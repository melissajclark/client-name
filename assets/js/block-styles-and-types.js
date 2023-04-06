wp.domReady(() => {

/**
 * Block Types: remove unecessary blocks for this theme
 */
	wp.blocks.unregisterBlockType( 'core/calendar' );
	wp.blocks.unregisterBlockType( 'core/comments' );
	wp.blocks.unregisterBlockType( 'core/latest-comments' );
	wp.blocks.unregisterBlockType( 'core/more' );
	wp.blocks.unregisterBlockType( 'core/nextpage' );
	wp.blocks.unregisterBlockType( 'core/pullquote' );
	wp.blocks.unregisterBlockType( 'core/post-comments-form' );
	wp.blocks.unregisterBlockType( 'core/tag-cloud' );
	wp.blocks.unregisterBlockType( 'core/verse' );

/**
 * Block Styles: Remove unecessary block styles for this theme
 */
	// buttons
	wp.blocks.unregisterBlockStyle( 'core/button', 'fill' );
	wp.blocks.unregisterBlockStyle( 'core/button', 'outline' );
	wp.blocks.unregisterBlockStyle( 'core/button', 'default' ); 

	// images
	wp.blocks.unregisterBlockStyle( 'core/image', 'rounded' );
	wp.blocks.unregisterBlockStyle( 'core/image', 'default' );

	// quote
	wp.blocks.unregisterBlockStyle( 'core/quote', 'default' );
	wp.blocks.unregisterBlockStyle( 'core/quote', 'large' );
	wp.blocks.unregisterBlockStyle( 'core/quote', 'plain' );

	// separator
	wp.blocks.unregisterBlockStyle( 'core/separator', 'wide' );
	wp.blocks.unregisterBlockStyle( 'core/separator', 'dots' );
	wp.blocks.unregisterBlockStyle( 'core/separator', 'default' );

	// social links
	wp.blocks.unregisterBlockStyle( 'core/social-links', 'default' );
	wp.blocks.unregisterBlockStyle( 'core/social-links', 'logos-only' );
	wp.blocks.unregisterBlockStyle( 'core/social-links', 'pill-shape' );

	// table
	wp.blocks.unregisterBlockStyle( 'core/table', 'default' );
	wp.blocks.unregisterBlockStyle( 'core/table', 'stripes' );


	/**
	 * Block Styles: Register custom Block Styles for this theme
	 */

	// Button Styles
	wp.blocks.registerBlockStyle (
		'core/button', {
			name: 'primary',
			label: 'Primary',
			isDefault: true
		}
	);

	wp.blocks.registerBlockStyle (
		'core/button', {
			name: 'secondary',
			label: 'Secondary'
		}
	);

	// typography styles
	wp.blocks.registerBlockStyle (
		'core/paragraph', {
			name: 'small-heading',
			label: 'Subheading'
		}
	);	
	
	wp.blocks.registerBlockStyle (
		'core/heading', {
			name: 'small-heading',
			label: 'Subheading'
		}
	);
	
	wp.blocks.registerBlockStyle (
		'core/post-title', {
			name: 'small-heading',
			label: 'Subheading'
		}
	);
	
});
