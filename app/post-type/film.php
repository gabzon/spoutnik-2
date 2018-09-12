<?php

if ( ! function_exists('film_post_type') ) {

	// Register Custom Post Type
	function film_post_type() {

		$labels = array(
			'name'                => _x( 'Films', 'Post Type General Name', 'sage' ),
			'singular_name'       => _x( 'Film', 'Post Type Singular Name', 'sage' ),
			'menu_name'           => __( 'Films', 'sage' ),
			'name_admin_bar'      => __( 'Film', 'sage' ),
			'parent_item_colon'   => __( 'Parent Item:', 'sage' ),
			'all_items'           => __( 'All Films', 'sage' ),
			'add_new_item'        => __( 'Add New Film', 'sage' ),
			'add_new'             => __( 'Add New', 'sage' ),
			'new_item'            => __( 'New Film', 'sage' ),
			'edit_item'           => __( 'Edit Film', 'sage' ),
			'update_item'         => __( 'Update Film', 'sage' ),
			'view_item'           => __( 'View Film', 'sage' ),
			'search_items'        => __( 'Search Film', 'sage' ),
			'not_found'           => __( 'Not found', 'sage' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'sage' ),
		);
		$rewrite = array(
			'slug'                => 'film',
			'with_front'          => true,
			'pages'               => true,
			'feeds'               => true,
		);
		$args = array(
			'label'               => __( 'Film', 'sage' ),
			'description'         => __( 'List of movies playing at spoutnik', 'sage' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', ),
			'taxonomies'          => array( 'category', 'post_tag', 'film-year', 'director', 'language', 'country','format','cycle','couleur', 'program', 'distribution'),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-playlist-video',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'rewrite'             => $rewrite,
			'capability_type'     => 'post',
		);
		register_post_type( 'film', $args );
		flush_rewrite_rules();

	}
	add_action( 'init', __NAMESPACE__ . '\\film_post_type', 0 );
}
