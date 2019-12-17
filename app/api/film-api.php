<?php

/**
* Films endpoints
* Tutorial : https://upnrunn.com/blog/2018/04/how-to-extend-wp-rest-api-from-your-custom-plugin-part-3/
*/
class Film_Endpoint extends WP_REST_Controller {
  /**
  * Constructor.
  */

  public function __construct() {
    $this->namespace = 'spoutnik-films/v1';
    $this->rest_base = 'films';
    $this->post_type = 'film';
  }
  /**
  * Register the component routes.
  */
  public function register_routes() {
    register_rest_route(
    $this->namespace,
    $this->rest_base,
    [[
      'methods'             => WP_REST_Server::READABLE,
      'callback'            => array( $this, 'get_items' ),
      'permission_callback' => array( $this, 'get_items_permissions_check' ),
      'args'                => $this->get_collection_params(),
      ]]
    );
  }
  /**
  * Retrieve voyages.
  */
  public function get_items( $request ) {
    $args = array(
      'post_type'      => $this->post_type,
      'posts_per_page' => $request['per_page'],
      'page'           => $request['page'],
    );
    $films = get_posts( $args );

    $data = array();

    if ( empty( $films ) ) {
      return null;
    }

    if ( $films ) {
      foreach ( $films as $film ) :
        $itemdata = $this->prepare_item_for_response( $film, $request );
        $data[] = $this->prepare_response_for_collection( $itemdata );
      endforeach;
    }
    $data = rest_ensure_response( $data );
    return $data;
  }


  /**
  * Check if a given request has access to restaurant items.
  */
  public function get_items_permissions_check( $request ) {
    return true;
  }



  /**
  * Get the query params for collections
  */
  public function get_collection_params() {
    return array(
      'page'     => array(
        'description'       => 'Current page of the collection.',
        'type'              => 'integer',
        'default'           => 1,
        'sanitize_callback' => 'absint',
      ),
      'per_page' => array(
        'description'       => 'Maximum number of items to be returned in result set.',
        'type'              => 'integer',
        'default'           => 10,
        'sanitize_callback' => 'absint',
      ),
    );
  }


  /**
  * Prepares restaurant data for return as an object.
  */
  public function prepare_item_for_response( $film, $request ) {

    $data = array(
      'id'                => $film->ID,
      'title'             => $film->post_title,
      'link'              => get_the_permalink( $film->ID ),
      'slug'              => $film->post_name,
      'status'            => $film->post_status,
      'date'              => $film->film_date,
      'heure'             => $film->film_heure,
      'horaire'           => $film->film_horaire,
      'original_title'    => $film->film_original_title,
      'duration'          => $film->film_duration,
      'trailer'           => $film->film_trailer,
      'website'           => $film->film_website,
      'actors'            => $film->film_actors,
      'landing'           => $film->film_landing,
      'notification_date' => $film->film_notification_date,
      'notification_desc' => $film->film_notification_desc,
      'notifications'     => $film->film_notifications,

    );
    return $data;
  }
}
