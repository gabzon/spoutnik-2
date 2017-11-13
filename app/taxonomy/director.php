<?php

if ( ! function_exists( 'director' ) ) {

// Register Custom Taxonomy
function director() {

	$labels = array(
		'name'                       => _x( 'Directors', 'Taxonomy General Name', 'sage' ),
		'singular_name'              => _x( 'Director', 'Taxonomy Singular Name', 'sage' ),
		'menu_name'                  => __( 'Directors', 'sage' ),
		'all_items'                  => __( 'All Directors', 'sage' ),
		'parent_item'                => __( 'Parent Director', 'sage' ),
		'parent_item_colon'          => __( 'Parent Director:', 'sage' ),
		'new_item_name'              => __( 'New Director Name', 'sage' ),
		'add_new_item'               => __( 'Add New Director', 'sage' ),
		'edit_item'                  => __( 'Edit Director', 'sage' ),
		'update_item'                => __( 'Update Director', 'sage' ),
		'view_item'                  => __( 'View Director', 'sage' ),
		'separate_items_with_commas' => __( 'Separate directors with commas', 'sage' ),
		'add_or_remove_items'        => __( 'Add or remove directors', 'sage' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'sage' ),
		'popular_items'              => __( 'Popular Directors', 'sage' ),
		'search_items'               => __( 'Search Directors', 'sage' ),
		'not_found'                  => __( 'Not Found', 'sage' ),
	);
	$rewrite = array(
		'slug'                       => 'director',
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
	register_taxonomy( 'director', array( 'post', ' film', ' event' ), $args );

}
add_action( 'init', 'director', 0 );
}
