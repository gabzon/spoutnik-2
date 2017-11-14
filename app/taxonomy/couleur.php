<?php
if ( ! function_exists( 'couleur' ) ) {

// Register Custom Taxonomy
function couleur() {

	$labels = array(
		'name'                       => _x( 'Couleurs', 'Taxonomy General Name', 'sage' ),
		'singular_name'              => _x( 'Couleur', 'Taxonomy Singular Name', 'sage' ),
		'menu_name'                  => __( 'Couleurs', 'sage' ),
		'all_items'                  => __( 'All couleurs', 'sage' ),
		'parent_item'                => __( 'Parent couleur', 'sage' ),
		'parent_item_colon'          => __( 'Parent couleur:', 'sage' ),
		'new_item_name'              => __( 'New couleur Name', 'sage' ),
		'add_new_item'               => __( 'Add New couleur', 'sage' ),
		'edit_item'                  => __( 'Edit couleur', 'sage' ),
		'update_item'                => __( 'Update couleur', 'sage' ),
		'view_item'                  => __( 'View couleur', 'sage' ),
		'separate_items_with_commas' => __( 'Separate couleurs with commas', 'sage' ),
		'add_or_remove_items'        => __( 'Add or remove couleurs', 'sage' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'sage' ),
		'popular_items'              => __( 'Popular couleurs', 'sage' ),
		'search_items'               => __( 'Search couleurs', 'sage' ),
		'not_found'                  => __( 'Not Found', 'sage' ),
	);
	$rewrite = array(
		'slug'                       => 'couleur',
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
		'query_var'                  => '',
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'couleur', array( 'post', ' film', ' event' ), $args );

}
add_action( 'init', 'couleur', 0 );

}
