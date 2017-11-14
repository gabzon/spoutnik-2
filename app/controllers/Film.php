<?php

namespace App;

use Sober\Controller\Controller;
use DateTime;

class Film extends Controller
{
  public static function get_list_films()
  {
    $args = array (
      'post_type'=> array( 'film' ),
      'posts_per_page' => -1,
      'post_status' => 'publish'
    );

    // The Query
    $query = new WP_Query( $args );
    return $query;
  }

  public static function last_projection($date)
  {
    return DateTime::createFromFormat('d/m/Y', $date)->format('Y-m-d');
  }

  public static function disable_film($d1,$d2, $id)
  {
      if ($d1 < $d2)
      {
        global $wpdb;
        $wpdb->update( $wpdb->posts, array( 'post_status' => 'inactive' ), array( 'ID' => $id ) );
        clean_post_cache( get_the_ID() );
        $old_status = $post->post_status;
        $post->post_status = 'inactive';
        wp_transition_post_status( 'inactive', $old_status, $post );
        //echo 'je suis dedans';

      }
      //echo 'je suis dehors';

  }

}
