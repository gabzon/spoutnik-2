<?php
$args = array (
'post_type'=> array( 'film' ),
'posts_per_page' => -1
);

// The Query
$query = new WP_Query( $args );

$current_year = date('Y');
$current_month = date('m');
?>

<section id="month-program" class="program" style="background:white">
  <div class="ui container">
    <div class="ui grid">
      <div class="sixteen wide column">
        <!-- <h1><?php //_e('This month','sage'); ?></h1> -->
        <h1><?php _e('This month','sage'); ?> </h1>
      </div>
    </div>
    <div class="ui four column grid stackable">
      <?php
      if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
          $query->the_post();
          $horaire = get_post_meta($post->ID,'film_horaire',true);
          //echo count($horaire['film_date']);
          $movie_title = $post->post_title;

          //$date = "Mar 03, 2011";
          //$date = strtotime($date);
          //$date = strtotime("+7 day", $date);
          //echo date('M d, Y', $date);

          ?>

          <div class="column">
            <?php
            $displayed_name = '';
            $current_name = '';
            foreach ($horaire as $key) {
              $movie_projection_date = $key['film_date'];
              $movie_date_reformatted = DateTime::createFromFormat('d/m/Y', $movie_projection_date)->format('Y-m-d');
              $movie_date = new DateTime($movie_date_reformatted);
              $movie_projection_year = $movie_date->format("Y");
              $movie_projection_month = $movie_date->format("m");
              $movie_projection_week = $movie_date->format("W");
              if ( $movie_projection_year == $current_year ) {
                if ($movie_projection_month == $current_month) {
                  $current_name = $movie_title;
                    ?>
                    <?php if ($displayed_name != $current_name): ?>
                      <h3>
                        <a href="<?php echo the_permalink(); ?>" style="color:black">
                          <?php echo $movie_title; ?>
                        </a>
                      </h3>
                    <br>
                    <?php $displayed_name = $current_name; ?>
                    <?php endif; ?>
                  <?php
                setlocale(LC_TIME, "fr_FR");
                echo '<h5 class="h5-regular">'. utf8_encode(strftime("%a %e %b", $movie_date->getTimestamp())) . ', ' . $key['film_heure'] . '</h5>';
              }
            }
          }
          for ( $i = 0 ; $i < count($horaire['film_date']) ; $i++ ) {
            $movie_projection_date = $horaire['film_date'][$i];
            $movie_date_reformatted = DateTime::createFromFormat('d/m/Y', $movie_projection_date)->format('Y-m-d');
            $movie_date = new DateTime($movie_date_reformatted);
            $movie_projection_year = $movie_date->format("Y");
            $movie_projection_month = $movie_date->format("m");
            $movie_projection_week = $movie_date->format("W");
            //echo $movie_projection_week;
            //echo strftime("%U",$movie_date->getTimestamp());
            if ( $movie_projection_year == $current_year ) {
              if ($movie_projection_month == $current_month) {

                if ($i == 0) {
                  ?>
                  <h3>
                    <a href="<?php echo the_permalink(); ?>" style="color:black">
                      <?php echo $movie_title; ?>
                    </a>
                  </h3>
                  <!-- <h5 class="h5-regular">
                  <?php //echo __('Duration: ','sage') . get_post_meta($post->ID,'film_duration',true) ?>
                </h5> -->
                <br>
                <?php
              }
              setlocale(LC_TIME, "fr_FR");
              echo '<h5 class="h5-regular">'. utf8_encode(strftime("%a %e %b", $movie_date->getTimestamp())) . ', ' . $horaire['film_heure'][$i] . '</h5>';
            }
          }
        }

        ?>
        <br><br>
      </div>
      <?php
    }
  }
  wp_reset_postdata();
  ?>
  <br>&nbsp;
  <br>&nbsp;
</div>
</div>
</section>
