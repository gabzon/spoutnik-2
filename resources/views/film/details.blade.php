@php( $schedule = get_post_meta($post->ID,'film_horaire',true) )

@if ($notification_dates)
@foreach ($schedule as $key)
@php( $movie_date = DateTime::createFromFormat('d/m/Y', $key['film_date'])->format('Y-m-d') )
@php( setlocale(LC_TIME, "fr_FR") )
@if ( in_array($movie_date, $notification_dates ))
@php($alert = '<i class="user icon"></i>')
@else
@php($alert = '')
@endif
@php( $movie_date = new DateTime($movie_date) )
<h5 class="uppercase no-margin" style="margin:2px">
  {{ utf8_encode(strftime("%a %e %b %G", $movie_date->getTimestamp())) }}
  &nbsp;
  {{ $key['film_heure'] }}
  @php
  echo ' ' . $alert;
  @endphp
</h5>
@endforeach

@else
@foreach ($schedule as $key)
@php( $movie_date = DateTime::createFromFormat('d/m/Y', $key['film_date'])->format('Y-m-d') )
@php( setlocale(LC_TIME, "fr_FR") )
@php( $movie_date = new DateTime($movie_date) )
<h5 class="uppercase no-margin" style="margin:2px">
  {{ utf8_encode(strftime("%a %e %b %G", $movie_date->getTimestamp())) }}
  &nbsp;
  {{ $key['film_heure']}}
</h5>
@endforeach
@endif




@php
$website = get_post_meta($post->ID,'film_website',true);
$director = get_the_terms($post->ID,'director');
$country = get_the_terms($post->ID,'country');
$language = get_the_terms($post->ID,'language');
$year = get_the_terms($post->ID,'film-year');
$format = get_the_terms($post->ID,'format');
$actors = get_post_meta($post->ID,'film_actors');
@endphp
<table>
  @if ($director)
  <tr>
    <td valign="top" width="40%">
      <h5><?php _e('Director','sage'); ?> </h5>
    </td>
    <td>
      <h5>
        @foreach ($director as $x)
        <a class="movie-website" href="<?= get_term_link($x->term_id) ?>"><?= $x->description . '<br>'; ?></a>
        @endforeach
      </h5>
    </td>
  </tr>
  @endif
  <?php if ($country): ?>
  <tr>
    <td valign="top">
      <h5><?php _e('Country','sage'); ?></h5>
    </td>
    <td>
      <h5>
        <?php foreach ($country as $x) : ?>
        <a class="movie-website" href="<?= get_term_link($x->term_id) ?>"><?= $x->name . '<br>'; ?></a>
        <?php endforeach; ?>
      </h5>
    </td>
  </tr>
  <?php endif; ?>
  <?php if ($year): ?>
  <tr>
    <td valign="top">
      <h5><?php _e('Year','sage'); ?></h5>
    </td>
    <td>
      <h5><?php foreach ($year as $x) {echo $x->name . '<br>';} ?></h5>
    </td>
  </tr>
  <?php endif ?>
  <?php if ($language): ?>
  <tr>
    <td valign="top">
      <h5><?php _e('Language','sage'); ?></h5>
    </td>
    <td>
      <h5><?php foreach ($language as $x) {echo $x->name . '<br>';} ?></h5>
    </td>
  </tr>
  <?php endif ?>
  <?php if ($format): ?>
  <tr>
    <td valign="top">
      <h5><?php _e('Format','sage'); ?></h5>
    </td>
    <td>
      <h5><?php foreach ($format as $x) {echo $x->name . '<br>'; } ?></h5>
    </td>
  </tr>
  <?php endif ?>
  <?php if (get_post_meta($post->ID,'film_duration',true)): ?>
  <tr>
    <td valign="top">
      <h5><?php _e('Duration','sage'); ?></h5>
    </td>
    <td>
      <h5><?php echo ' ' . get_post_meta($post->ID,'film_duration',true); ?></h5>
    </td>
  </tr>
  <br>
  <?php endif ?>
  <?php if (get_post_meta($post->ID,'film_actors',true)): ?>
  <tr>
  <tr>
    <td valign="top">
      <h5><?php _e('Actors','sage'); ?></h5>
    </td>
    <td>
      <h5><?php foreach ($actors as $x) {echo $x . '<br>'; } ?></h5>
    </td>
  </tr>
  </tr>
  <?php endif; ?>

  @if ( has_term( '', 'distribution') )
  <tr id="distribution">
    <td valign="top" width="40%">
      <h5><?php _e('Distribution','sage'); ?></h5>
    </td>
    <td>
      <h5 style="color:black;"><?php the_terms( $post->ID, 'distribution', '', '<br>' ); ?></h5>
    </td>
  </tr>
  @endif

  @if ( has_term( '', 'collaboration') )
  <tr id="distribution">
    <td valign="top" width="40%">
      <h5><?php _e('Collaboration','sage'); ?></h5>
    </td>
    <td>
      <h5 style="color:black;"><?php the_terms( $post->ID, 'collaboration', '', '<br>' ); ?></h5>
    </td>
  </tr>
  @endif

  <tr>
    <td valign="top" width="40%">
      <h5><?php _e('Cycle','sage'); ?></h5>
    </td>
    <td>
      <h5 style="color:black;"><?php the_terms( $post->ID, 'cycle', '', '<br>' ); ?></h5>
    </td>
  </tr>

  <?php if ($website): ?>
  <tr>
    <td colspan="2">
      <a href="<?php echo esc_url($website); ?> " target="_blank" class="movie-website">
        <?php _e('Website','sage'); ?>
      </a>
    </td>
  </tr>
  <?php endif; ?>
</table>