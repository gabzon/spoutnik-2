<style media="screen">
  #distribution a{ color: black;}
</style>

@php
  $notification_dates = Film::notification_dates($post->ID);
@endphp

<article @php(post_class())>
  <div class="ui container" id="the-movie">
    <br>
    <div class="ui grid stackable">
      <div class="one wide column">
      </div>
      <div class="fourteen wide column">
        <br><br>
        <h1 class="entry-title black film-title tc f1" style="margin-bottom:0;">{{ get_the_title() }}</h1>
        @if (get_post_meta($post->ID,'film_original_title',true))
          <h2 class="tc" style="margin:0;padding:0; color:#A8A8A8"><i>{{ get_post_meta($post->ID,'film_original_title',true) }}</i></h2>
        @endif
        <br>
        @php( $feature_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)) )
        @php( $trailer = get_post_meta($post->ID,'film_trailer',true) )
        @if ($trailer)
          <div class="movie-trailer ui embed" data-source="youtube" data-id="{{ $trailer }}" data-placeholder="{{  $feature_image }}"></div>
        @else
          <img src="{{ $feature_image }}" alt="" class="ui image" />
        @endif
      </div>
      <div class="one wide column">
      </div>
      <div class="ui grid stackable">
        <div class="one wide column">
        </div>
        <div class="four wide column">
          @include('film.details')
        </div>
        <div class="nine wide column film-content">
          @include('film.notifications')
          @php(the_content())
        </div>
      </div>
    </div>
  </div>
</div>
<br>
<footer>
  {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
</footer>
@php(comments_template('/partials/comments.blade.php'))
</article>

@include('/program/week')
