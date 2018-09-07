@extends('layouts.app')

@section('content')
  <br>
  <br>
  <br>
  <br>
  {{-- @include('partials.page-header') --}}

  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif

  <div class="ui container">
    @php( $image_cycle = get_term_meta(get_queried_object()->term_id, 'program_image', false) )
    <h1>{{ get_queried_object()->description }}</h1>
    <div class="ui grid stackable">
      <div class="one wide column"></div>
      <div class="seven wide column">
        @if ( $image_cycle[0] )
          <img src="{{ $image_cycle[0] }}" alt="" class="ui image" />
        @endif
        <br>
        @php( $pdf = get_term_meta(get_queried_object()->term_id, 'program_pdf', false) )
        @if ( $pdf[0] )
          @php( $pdf = get_term_meta(get_queried_object()->term_id, 'program_pdf', false) )
          <a href="<?= esc_url($pdf[0]); ?>" class="ui button">
            <?php _e('Télécharger le programme','sage'); ?>
          </a>
        @endif
      </div>
      <div class="seven wide column">
        @php
        echo get_term_meta(get_queried_object()->term_id, 'program_text', true)
        @endphp
      </div>
      <div class="one wide column"></div>
    </div>

    <br>
    <br>
    <br>

    @php( $program = [] )

    @while ( have_posts() )
      @php( the_post() )
      @php
      $movie_detail = [
        'id'          => get_the_ID(),
        'image'       => wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'full'),
        'title'       => get_the_title(),
        'link'        => get_the_permalink(),
        'tagline'     => get_post_meta(get_the_ID(),'film_landing',true),
        'description' => get_the_excerpt()
      ];
      array_push($program, $movie_detail);
      $reversed_program = array_reverse($program);
      //piklist::pre($reversed_program)
      @endphp
    @endwhile

    <div class="ui four column grid stackable">
      @foreach ($reversed_program as $key)
        <div class="column">
          <article <?php post_class(); ?>>
            <header>
              <a href="{{ $key['link'] }}">
                <img src="{{ $key['image'][0] }}" alt="" class="ui image"/>
              </a>
              <h2 class="entry-title"><a href="{{ $key['link'] }}" class="title-link">{{ $key['title'] }}</a></h2>
              <h4>
                @php
                  echo $key['tagline'];
                @endphp
              </h4>
            </header>
            <br>
            <div class="entry-summary">
              @php
                echo $key['description'];
              @endphp
            </div>
          </article>
        </div>
      @endforeach
    </div>
    {!! get_the_posts_navigation() !!}
    <br>
  </div>
<br>

@endsection
