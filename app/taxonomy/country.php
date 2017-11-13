<?php

if ( ! function_exists( 'Country' ) ) {

// Register Custom Taxonomy
function Country() {

	$labels = array(
		'name'                       => _x( 'Countries', 'Taxonomy General Name', 'sage' ),
		'singular_name'              => _x( 'Country', 'Taxonomy Singular Name', 'sage' ),
		'menu_name'                  => __( 'Country', 'sage' ),
		'all_items'                  => __( 'All Countries', 'sage' ),
		'parent_item'                => __( 'Parent Country', 'sage' ),
		'parent_item_colon'          => __( 'Parent Country:', 'sage' ),
		'new_item_name'              => __( 'New Country Name', 'sage' ),
		'add_new_item'               => __( 'Add New Country', 'sage' ),
		'edit_item'                  => __( 'Edit Country', 'sage' ),
		'update_item'                => __( 'Update Country', 'sage' ),
		'view_item'                  => __( 'View Country', 'sage' ),
		'separate_items_with_commas' => __( 'Separate countries with commas', 'sage' ),
		'add_or_remove_items'        => __( 'Add or remove countries', 'sage' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'sage' ),
		'popular_items'              => __( 'Popular countries', 'sage' ),
		'search_items'               => __( 'Search countries', 'sage' ),
		'not_found'                  => __( 'Not Found', 'sage' ),
	);
	$rewrite = array(
		'slug'                       => 'country',
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
	register_taxonomy( 'country', array( 'post', ' film' ), $args );

}
add_action( 'init', 'Country', 0 );

}
