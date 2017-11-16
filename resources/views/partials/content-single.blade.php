<div class="ui container">
  <br>
  <br>
  <br>
  @while ( have_posts() )
    @php(the_post())

    <article @php(post_class())>
      <header>
        <h1 class="entry-title">{{ get_the_title() }}</h1>
        {{-- @include('partials/entry-meta') --}}
      </header>
      <br><br>
      <div class="entry-content">
        <div class="ui two column grid stackable">
          <div class="column">
            @php( $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'full') )
            <img src="{{ $image[0] }}" alt="" class="ui image"/>
          </div>
          <div class="column">
            @php(the_content())
          </div>
        </div>
      </div>
      <br>
      <br>
      <footer>
        {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
      </footer>
      @php(comments_template('/partials/comments.blade.php'))
    </article>

  @endwhile
  <br>
  <br>
</div>
