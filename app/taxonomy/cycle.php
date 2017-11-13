<?php
if ( ! function_exists( 'cycle' ) ) {

// Register Custom Taxonomy
function cycle() {

	$labels = array(
		'name'                       => _x( 'Cycles', 'Taxonomy General Name', 'sage' ),
		'singular_name'              => _x( 'Cycle', 'Taxonomy Singular Name', 'sage' ),
		'menu_name'                  => __( 'Cycles', 'sage' ),
		'all_items'                  => __( 'All Cycles', 'sage' ),
		'parent_item'                => __( 'Parent Cycle', 'sage' ),
		'parent_item_colon'          => __( 'Parent Cycle:', 'sage' ),
		'new_item_name'              => __( 'New Cycle Name', 'sage' ),
		'add_new_item'               => __( 'Add New Cycle', 'sage' ),
		'edit_item'                  => __( 'Edit Cycle', 'sage' ),
		'update_item'                => __( 'Update Cycle', 'sage' ),
		'view_item'                  => __( 'View Cycle', 'sage' ),
		'separate_items_with_commas' => __( 'Separate cycles with commas', 'sage' ),
		'add_or_remove_items'        => __( 'Add or remove cycles', 'sage' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'sage' ),
		'popular_items'              => __( 'Popular Cycles', 'sage' ),
		'search_items'               => __( 'Search Cycles', 'sage' ),
		'not_found'                  => __( 'Not Found', 'sage' ),
	);
	$rewrite = array(
		'slug'                       => 'cycle',
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
	register_taxonomy( 'cycle', array( 'post', ' film' ), $args );

}
add_action( 'init', 'cycle', 0 );

}
