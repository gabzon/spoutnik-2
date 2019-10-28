<?php

if ( ! function_exists('inactive') ) {

    // Register Custom Status
    function inactive() {
        $args = array(
            'label'                     => _x( 'Inactive', 'Status General Name', 'sage' ),
            'label_count'               => _n_noop( 'Inactive (%s)',  'Inactive (%s)', 'sage' ),
            'public'                    => true,
            'show_in_admin_all_list'    => true,
            'show_in_admin_status_list' => true,
            'exclude_from_search'       => false,
        );
        register_post_status( 'inactive', $args );

    }
    add_action( 'init', 'inactive', 0 );
}

?>
