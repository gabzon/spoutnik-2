<?php

if ( ! function_exists( 'format' ) ) {

// Register Custom Taxonomy
function format() {

	$labels = array(
		'name'                       => _x( 'Formats', 'Taxonomy General Name', 'sage' ),
		'singular_name'              => _x( 'Format', 'Taxonomy Singular Name', 'sage' ),
		'menu_name'                  => __( 'Format', 'sage' ),
		'all_items'                  => __( 'All Formats', 'sage' ),
		'parent_item'                => __( 'Parent Format', 'sage' ),
		'parent_item_colon'          => __( 'Parent Format:', 'sage' ),
		'new_item_name'              => __( 'New Format Name', 'sage' ),
		'add_new_item'               => __( 'Add New Format', 'sage' ),
		'edit_item'                  => __( 'Edit Format', 'sage' ),
		'update_item'                => __( 'Update Format', 'sage' ),
		'view_item'                  => __( 'View Format', 'sage' ),
		'separate_items_with_commas' => __( 'Separate Formats with commas', 'sage' ),
		'add_or_remove_items'        => __( 'Add or remove Formats', 'sage' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'sage' ),
		'popular_items'              => __( 'Popular Formats', 'sage' ),
		'search_items'               => __( 'Search Formats', 'sage' ),
		'not_found'                  => __( 'Not Found', 'sage' ),
	);
	$rewrite = array(
		'slug'                       => 'format',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'format', array( 'post', ' film', ' event' ), $args );

}
add_action( 'init', 'format', 0 );

}
