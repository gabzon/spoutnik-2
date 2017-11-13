@php
$args = array (
  'post_type'     => [ 'film','post' ],
  'category_name' => 'landing-page',
  'order'         => 'ASC',
);

// The Query
$query = new WP_Query( $args );
@endphp

@if ( $query->have_posts() )
  <div class="slick mt5">
    @while ( $query->have_posts() )
      @php( $query->the_post() )
      @php( $feature_image = wp_get_attachment_url( get_post_thumbnail_id( the_ID() ) ) )

      {{--
      -- How to center a text over an image
      -- https://www.w3schools.com/howto/howto_css_image_text.asp
      --}}
      <div class="movie" style="height:75vh; position:relative">
        <img src="{{ $feature_image }}">
        <span class="white" style="position: absolute; bottom:30px; left: 50%; transform: translate(-50%, -50%);">
          <a href="@php( the_permalink() )" style="text-shadow: 1px 1px black;" class="white tc center f3">
            @php( the_title() ) <br>
            {{ get_post_meta($post->ID,'film_landing',true) }}
          </a>
        </span>

      </div>
    @endwhile
  </div>
@endif

@php( wp_reset_postdata() )
