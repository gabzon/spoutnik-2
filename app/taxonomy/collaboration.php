<?php

if ( ! function_exists( 'collaboration_taxonomy' ) ) {

// Register Custom Taxonomy
function collaboration_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Collaborations', 'Taxonomy General Name', 'sage' ),
		'singular_name'              => _x( 'Collaboration', 'Taxonomy Singular Name', 'sage' ),
		'menu_name'                  => __( 'Collaboration', 'sage' ),
		'all_items'                  => __( 'All collaborations', 'sage' ),
		'parent_item'                => __( 'Parent collaboration', 'sage' ),
		'parent_item_colon'          => __( 'Parent collaboration:', 'sage' ),
		'new_item_name'              => __( 'New Collaboration Name', 'sage' ),
		'add_new_item'               => __( 'Add New Collaboration', 'sage' ),
		'edit_item'                  => __( 'Edit Collaboration', 'sage' ),
		'update_item'                => __( 'Update Collaboration', 'sage' ),
		'view_item'                  => __( 'View Collaboration', 'sage' ),
		'separate_items_with_commas' => __( 'Separate collaborations with commas', 'sage' ),
		'add_or_remove_items'        => __( 'Add or remove collaborations', 'sage' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'sage' ),
		'popular_items'              => __( 'Popular collaborations', 'sage' ),
		'search_items'               => __( 'Search collaborations', 'sage' ),
		'not_found'                  => __( 'Not Found', 'sage' ),
		'no_terms'                   => __( 'No items', 'sage' ),
		'items_list'                 => __( 'Collaborations list', 'sage' ),
		'items_list_navigation'      => __( 'Collaborations list navigation', 'sage' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'show_in_rest'               => true,
	);
	register_taxonomy( 'collaboration', array( 'post', ' film' ), $args );

}
add_action( 'init', 'collaboration_taxonomy', 0 );

}