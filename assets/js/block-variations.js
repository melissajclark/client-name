
/**
 * Include variable for ImageDateTitle icon from core. Used in the Query Block Variation below
 */
const external_wp_element_namespaceObject = window["wp"]["element"];
const external_wp_components_namespaceObject = window["wp"]["components"];

const imageDateTitle = (0, external_wp_element_namespaceObject.createElement)(external_wp_components_namespaceObject.SVG, {
	xmlns: "http://www.w3.org/2000/svg",
	viewBox: "0 0 48 48"
  }, (0,external_wp_element_namespaceObject.createElement)(external_wp_components_namespaceObject.Path, {
	d: "M7 9h34v6H7V9zm12 8H7v1h12v-1zm18 3H7v1h30v-1zm0 18H7v1h30v-1zM7 35h12v1H7v-1zm34-8H7v6h34v-6z"
  }));

/**
 *  Block Variations: Register Custom Block Variations for this theme
 *  https://developer.wordpress.org/block-editor/reference-guides/block-api/block-variations/ 
 */
	
// Query Block Post Template: Image, Category & Title
wp.blocks.registerBlockVariation( 'core/query', {
	name: 'query-post-template-image-cat-title',
	title : 'Image, Category, Title, Date, Author and Excerpt',
	icon: imageDateTitle,
	isDefault : true,
	scope : 'block',
	innerBlocks: [  
		['core/post-template', { className : 'client-post-template' }, [
			['core/post-featured-image', 
				{ sizeSlug : 'medium', isLink : true }
			],
			['core/group', { className : 'client-post-content' }, [
				['core/post-title',
					{ level : 2, isLink : true }
				],
				['core/post-terms',
					{ term : 'category', separator : ' | '}
				],
				['core/group', { className : 'client-post-byline'}, [
					['core/post-date']
				]],
				['core/post-excerpt', 
					{ showMoreOnNewLine : false}
				]
			]],
		] ], 
		['core/query-pagination', {
			layout : {
				type : 'flex',
				justifyContent : 'space-between'
			}
		}, [
			['core/query-pagination-previous', 
				{ label : 'Previous' }
			],
			['core/query-pagination-numbers'],
			['core/query-pagination-next', 
				{ label : 'Next' }
			]
		]]
	]
} 
);

// Query Next pagination renamed
wp.blocks.registerBlockVariation( 'core/query-pagination-next', {
	name: 'query-next-renamed',
	title : 'Query Pagination: Next',
	isDefault : true,
	scope : 'inserter',
	attributes : {
		label : 'Next',
	}
} );

// Query Previous pagination renamed
wp.blocks.registerBlockVariation( 'core/query-pagination-previous', {
	name: 'query-previous-renamed',
	title : 'Query Pagination: Previous',
	isDefault : true,
	scope : 'inserter',
	attributes : {
		label : 'Previous',
	}
} );


// Categories Block with correct separator for theme
wp.blocks.registerBlockVariation( 'core/post-terms', {
	name: 'post-terms-bullet-separator',
	title : 'Categories with | Separator',
	isDefault : true,
	scope : 'inserter',
	attributes : {
		term : 'category',
		separator : '|'
	}
} );