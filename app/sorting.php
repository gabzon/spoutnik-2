<?php

function todays_movies(){
    $todays_movies = array();

    $args = array ('post_type'=> array( 'film' ),'posts_per_page' => 50);
    $query = new WP_Query( $args );

    if ( $query->have_posts() ):
        while ( $query->have_posts() ):
            $query->the_post();
            $schedule = get_post_meta(get_the_ID(),'film_horaire',true);
            $duration = get_post_meta(get_the_ID(),'film_duration',true);

            //the_title();
            //piklist::pre($schedule);
            foreach ($schedule as $key) {
                //echo $key['film_date'] . '<br>';
                $movie_iso_date = DateTime::createFromFormat('d/m/Y', $key['film_date'])->format('Y-m-d');
                //echo $movie_iso_date . '<br>';
                if (date('Y-m-d') == $movie_iso_date) {
                    $director = get_the_terms($post->ID,'director');
                    $countries = get_the_terms($post->ID,'country');
                    $languages = get_the_terms($post->ID,'language');
                    $year = get_the_terms($post->ID,'film-year');
                    $format = get_the_terms($post->ID,'format');

                    $featured_image = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
                    $film_detail = array(
                        'id'        => get_the_ID(),
                        'image'     => $featured_image,
                        'title'     => get_the_title(),
                        'duration'  => $duration,
                        'excerpt'   => get_the_excerpt(),
                        'link'      => get_permalink(),
                        'date'      => $movie_iso_date,
                        'hour'      => $key['film_heure'],
                        'director'  => $director,
                        'country'   => $countries,
                        'language'  => $languages,
                        'year'      => $year,
                        'format'    => $format,
                    );
                    array_push($todays_movies, $film_detail);
                }
            }
        endwhile;
        wp_reset_postdata();
    endif;
    return $todays_movies;
}

function date_sorting($film_list){
    $args = array ( 'post_type'=> array( 'film' ), 'posts_per_page' => -1 );
    // The Query
    $query = new WP_Query( $args );

    // Initializing information
    $current_year = date('Y');
    $current_month = date('m');
    $current_date = new DateTime();
    $current_week = $current_date->format("W");
    $film_day = array();
    $films_week = array();
    $film_month = array();

    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();
            $horaire = get_post_meta($post->ID,'film_horaire',true);
            $movie_title = $post->post_title;

            foreach ($horaire as $key) {
              $movie_projection_date = $key['film_date'];
              $movie_date_reformatted = DateTime::createFromFormat('d/m/Y', $movie_projection_date)->format('Y-m-d');
              $movie_date = new DateTime($movie_date_reformatted);
              $movie_projection_year = $movie_date->format("Y");
              $movie_projection_month = $movie_date->format("m");
              $movie_projection_week = $movie_date->format("W");
              if ( $movie_projection_year == $current_year ) {
                  if ($movie_projection_month == $current_month) {

                      if ($movie_projection_week == $current_week) {
                          $feature_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                          $film_detail = array(
                              'id'    => $post->ID,
                              'image' => $feature_image,
                              'title' => $movie_title,
                              'date'  => $movie_date_reformatted,
                              'hour'  => $key['film_heure']
                          );
                          array_push($films_week, $film_detail);
                      }
                  }
              }
            }
        }
    }
    wp_reset_postdata();

    $data = array( $film_day, $film_week, $film_month);
    print_r($data);
}
