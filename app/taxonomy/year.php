<?php

if ( ! function_exists( 'film_year_custom_taxonomy' ) ) {

// Register Custom Taxonomy
function film_year_custom_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Years', 'Taxonomy General Name', 'sage' ),
		'singular_name'              => _x( 'Year', 'Taxonomy Singular Name', 'sage' ),
		'menu_name'                  => __( 'Year', 'sage' ),
		'all_items'                  => __( 'All Years', 'sage' ),
		'parent_item'                => __( 'Parent Year', 'sage' ),
		'parent_item_colon'          => __( 'Parent Year:', 'sage' ),
		'new_item_name'              => __( 'New Year Name', 'sage' ),
		'add_new_item'               => __( 'Add New Year', 'sage' ),
		'edit_item'                  => __( 'Edit Year', 'sage' ),
		'update_item'                => __( 'Update Year', 'sage' ),
		'view_item'                  => __( 'View Year', 'sage' ),
		'separate_items_with_commas' => __( 'Separate years with commas', 'sage' ),
		'add_or_remove_items'        => __( 'Add or remove years', 'sage' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'sage' ),
		'popular_items'              => __( 'Popular years', 'sage' ),
		'search_items'               => __( 'Search years', 'sage' ),
		'not_found'                  => __( 'Not Found', 'sage' ),
	);
	$rewrite = array(
		'slug'                       => 'year',
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
	register_taxonomy( 'film-year', array( 'post', ' film' ), $args );

}
add_action( 'init', 'film_year_custom_taxonomy', 0 );

}
