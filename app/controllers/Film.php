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
    }

  }

  public static function notification_dates($id)
  {
    $notifications = get_post_meta($id,'film_notifications');
    $dates = [];

    for ($i = 0; $i < count($notifications[0]); $i++) {
      if ($notifications[0][$i]['film_notification_date']) {
         $dates[] = DateTime::createFromFormat('d/m/Y', $notifications[0][$i]['film_notification_date'])->format('Y-m-d');
      }
    }

    return $dates;
  }

  public static function get_notification_message($id, $date)
  {
    $notifications = get_post_meta($id,'film_notifications');

    for ($i = 0; $i < count($notifications[0]); $i++) {
      if ($notifications[0][$i]['film_notification_date']) {
          $film_date = DateTime::createFromFormat('d/m/Y', $notifications[0][$i]['film_notification_date'])->format('Y-m-d');
      }
      if($film_date == $date) {
        return $notifications[0][$i]['film_notification_desc'];
      }
    }
  }
}
