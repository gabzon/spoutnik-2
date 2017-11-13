<?php

if ( ! function_exists('inactive_movie') ) {

    // Register Custom Status
    function inactive_movie() {

        $args = array(
            'label'                     => _x( 'Inactive', 'Status General Name', 'sage' ),
            'label_count'               => _n_noop( 'Inactive (%s)',  'Inactives (%s)', 'sage' ),
            'public'                    => true,
            'exclude_from_search'       => false,
            'show_in_admin_all_list'    => true,
            'show_in_admin_status_list' => true,
        );
        register_post_status( 'inactive', $args );

    }
    add_action( 'init', 'inactive_movie', 0 );
}
