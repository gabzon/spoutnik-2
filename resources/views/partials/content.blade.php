<div class="column">
  <article @php(post_class())>
    <header>
      @php( $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'full') )
      <a href="@php(the_permalink())">
        <img src="{{ $thumb['0'] }}" alt="" class="ui image"/>
      </a>
      <h2 class="entry-title"><a href="@php(the_permalink())" class="title-link">@php( the_title() )</a></h2>

      @if ( get_post_meta($post->ID,'film_landing',true) )
        <h4>
          @php
            echo get_post_meta($post->ID,'film_landing',true);
          @endphp
        </h4>
      @endif
    </header>
    <br>
    <div class="entry-summary">
      @php(the_excerpt())
    </div>
  </article>
</div>
