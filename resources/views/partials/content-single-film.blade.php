<style media="screen">
  #distribution a {
    color: black;
  }
</style>

{{-- tutorial: https://developer.wordpress.org/reference/functions/has_term/ --}}

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
        <h2 class="tc" style="margin:0;padding:0; color:#A8A8A8">
          <i>{{ get_post_meta($post->ID,'film_original_title',true) }}</i></h2>
        @endif
        <br>
        @php( $feature_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)) )
        @php( $trailer = get_post_meta($post->ID,'film_trailer',true) )
        @if ($trailer)
        <div class="movie-trailer ui embed" data-source="youtube" data-id="{{ $trailer }}"
          data-placeholder="{{  $feature_image }}"></div>
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
    <br>
    <br>
    <br>
    @if ( has_term('cycles-focus','cycle') )

    @php
    $cycle = get_term_by('slug', 'cycles-focus', 'cycle');
    $focus_children = get_term_children( $cycle->term_id, 'cycle' );
    //https://spoutnik.info/cycle/satellites/
    @endphp

    @foreach ($focus_children as $item)
    @php $child_cycle = get_term_by('id', $item, 'cycle') @endphp
    @if (has_term($child_cycle->slug,'cycle'))

    <div class="ui grid stackable">
      <div class="one wide column"></div>
      <div class="seven wide column">
        <a href="{{ esc_url(site_url('cycle/' . $child_cycle->slug )) }}">
          <img src="{{ get_term_meta($child_cycle->term_id, 'image_cycle', true) }}" alt="{{$child_cycle->name}}" class="ui image" />
        </a>
        <br>
        <br>
      </div>
      <div class="seven wide column">
        <a href="{{ esc_url(site_url('cycle/' . $child_cycle->slug )) }}" style="color:black">
          <h1>{{ $child_cycle->name }}</h1>
        </a>
        {!! term_description( $child_cycle->term_id, 'cycle' ) !!}
        <br>
        <br>
      </div>
      <div class="one wide column"></div>
    </div>
    @endif
    @endforeach
    @endif
  </div>
  </div>
  <br>
  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav">
      <p>' . __('Pages:', 'sage'), 'after' => '</p>
    </nav>']) !!}
  </footer>
  @php(comments_template('/partials/comments.blade.php'))
</article>

{{-- @include('/program/week') --}}