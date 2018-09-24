<?php
$args = array (
  'post_type'=> array( 'film' ),
  'posts_per_page' => -1,
  'post_status' => 'publish'
);

// The Query
$query = new WP_Query( $args );

$current_year = date('Y');
$current_month = date('m');
$current_date = new DateTime();
$current_week = $current_date->format("W");

$date_now = $current_date->format('Y-m-d');
$date_next_14_days = new DateTime("now");
$date_next_14_days->modify('+30 day');
$date_film_soon = $date_next_14_days->format('Y-m-d');

$films_week = [];
?>

@if ( $query->have_posts() )
  @while ( $query->have_posts() )
    @php( $query->the_post() )

    @php( $schedule = get_post_meta(get_the_ID(),'film_horaire',true) )
    @php
    $feature_image = wp_get_attachment_url( get_post_thumbnail_id());
    $movie_title = get_the_title();
    @endphp

    @if ($schedule)

      @foreach ($schedule as $key)
        @php( $movie_projection_date = $key['film_date'] )
        @php( $movie_date_reformatted = DateTime::createFromFormat('d/m/Y', $movie_projection_date)->format('Y-m-d') )
        @if ( ($movie_date_reformatted >= $date_now) & ($movie_date_reformatted <= $date_film_soon) )
          @php
          $film_detail = array(
            'id'        => get_the_ID(),
            'image'     => $feature_image,
            'title'     => $movie_title,
            'date'      => $movie_date_reformatted,
            'hour'      => $key['film_heure'],
            'tagline'   => get_post_meta(get_the_ID(),'film_landing',true)
          );
          array_push($films_week, $film_detail);
          @endphp
        @endif
      @endforeach
    @endif

    @php
    $last_date = $schedule[ count($schedule)-1 ]['film_date'];
    $last_projection = Film::last_projection($last_date);
    Film::disable_film($last_projection,$date_now, get_the_ID());
    @endphp

  @endwhile
@endif

@php
wp_reset_postdata();

$date = [];
$hour = [];
@endphp
@foreach ($films_week as $key => $row)
  @php($date[$key]  = $row['date'])
  @php($hour[$key] = $row['hour'])
@endforeach

@php( array_multisort($date, SORT_ASC, $hour, SORT_ASC, $films_week) )

<section id="week-program" class="program" style="background:#eee">
  <div class="ui container">
    <div class="ui grid">
      <div class="sixteen wide column">
        <h1><?php _e('Soon','sage'); ?></h1>
      </div>
    </div>
    <div class="ui three column grid stackable">
      @if ($films_week)
        @foreach ($films_week as $film)
          <div class="column">
            <div class="img-container">
              <a href="<?php echo esc_url( get_permalink( $film['id'] ) ); ?>">
                <img src="<?php echo $film['image']; ?>" alt="" class="ui image film-image" />
              </a>
              <h3 class="film-title" style="text-shadow: 1px 1px black;"><?php echo $film['title']; ?></h3>
              <h5 class="film-tagline" style="text-shadow: 1px 1px black;"><?php echo $film['tagline']; ?></h5>
            </div>
            <?php setlocale(LC_TIME, "fr_FR"); ?>
            <?php $movie_date = new DateTime($film['date']);  ?>
            <h3 class="film-week-detail" style="margin-bottom:0; padding-bottom:0;">
              <?php echo utf8_encode(strftime("%a %e %b", $movie_date->getTimestamp())) . ', ' . $film['hour'] ; ?>
            </h3>
            @php( $alerts = Film::notification_dates($film['id']) )
            @if ( in_array($film['date'], $alerts) )
              @php
              $notification_message = Film::get_notification_message($film['id'], $film['date']);
              $text_color = App::text_color();
              @endphp
              <h3 style="color:{{$text_color}}; margin:0; padding:0; margin-left:10px;">{{ $notification_message }}</h3>
            @endif




            <?php $director = get_the_terms($film['id'],'director'); ?>
            <?php $country = get_the_terms($film['id'],'country'); ?>
            <?php $language = get_the_terms($film['id'],'language'); ?>
            <?php $year = get_the_terms($film['id'],'film-year'); ?>
            <?php $format = get_the_terms($film['id'],'format'); ?>
            {{-- <h5>

            @if ($director)
            @foreach ($director as $x)
            {{ $x->name . ' ' }}
          @endforeach
          <br>
        @endif

        @if ($country)
        @foreach ($country as $x)
        {{ $x->name . ' ' }}
      @endforeach
      <br>
    @endif

    @if ($year)
    @foreach ($year as $x)
    {{ $x->name . ' ' }}
  @endforeach
  <br>
@endif

@if ($language)
@foreach ($language as $x)
{{ $x->name . ' ' }}
@endforeach
<br>
@endif

@if ($format)
@foreach ($format as $x)
{{ $x->name . ' ' }}
@endforeach
@endif
<br>
@if (get_post_meta($post->ID,'film_duration',true) )
{{ ' ' . get_post_meta($post->ID,'film_duration',true) }}
@endif
</h5> --}}
</div>
@endforeach
@endif
</div>
<br>&nbsp;
</div>
</section>
