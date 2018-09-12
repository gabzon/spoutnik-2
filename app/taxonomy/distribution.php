<?php
if ( ! function_exists( 'distribution' ) ) {

  // Register Custom Taxonomy
  function distribution() {

    $labels = array(
      'name'                       => _x( 'Distributions', 'Taxonomy General Name', 'text_domain' ),
      'singular_name'              => _x( 'Distribution', 'Taxonomy Singular Name', 'text_domain' ),
      'menu_name'                  => __( 'Distributions', 'text_domain' ),
      'all_items'                  => __( 'All Distributions', 'text_domain' ),
      'parent_item'                => __( 'Parent Distribution', 'text_domain' ),
      'parent_item_colon'          => __( 'Parent Distribution:', 'text_domain' ),
      'new_item_name'              => __( 'New Distribution Name', 'text_domain' ),
      'add_new_item'               => __( 'Add New Distribution', 'text_domain' ),
      'edit_item'                  => __( 'Edit Distribution', 'text_domain' ),
      'update_item'                => __( 'Update Distribution', 'text_domain' ),
      'view_item'                  => __( 'View Distribution', 'text_domain' ),
      'separate_items_with_commas' => __( 'Separate Distributions with commas', 'text_domain' ),
      'add_or_remove_items'        => __( 'Add or remove Distributions', 'text_domain' ),
      'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
      'popular_items'              => __( 'Popular Distributions', 'text_domain' ),
      'search_items'               => __( 'Search Distributions', 'text_domain' ),
      'not_found'                  => __( 'Not Found', 'text_domain' ),
      'no_terms'                   => __( 'No Distributions', 'text_domain' ),
      'items_list'                 => __( 'Distributions list', 'text_domain' ),
      'items_list_navigation'      => __( 'Distributions list navigation', 'text_domain' ),
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
    register_taxonomy( 'distribution', array( 'post', ' film' ), $args );

  }
  add_action( 'init', 'distribution', 0 );
}
