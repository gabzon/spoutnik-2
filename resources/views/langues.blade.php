{{--
Template Name: Langues
--}}

{{-- tutorial: https://wordpress.stackexchange.com/questions/167944/query-multiple-taxonomies --}}

@extends('layouts.app')

@section('content')
  <br>
  <br>
  <br>
  <br>
  <div class="ui container">

    @while(have_posts()) @php(the_post())
      @include('partials.page-header')
      <h1>{{ get_queried_object()->name }}</h1>
      <div class="ui grid stackable">
        <div class="one wide column"></div>
        <div class="seven wide column">
          <img src="{{ get_the_post_thumbnail_url(get_the_ID()) }}" alt="" class="ui image" />
        </div>
        <div class="seven wide column">
          @include('partials.content-page')
        </div>
        <div class="one wide column"></div>
      </div>
      <br>
      <br>
      <br>
      @php
      if (site_url() === 'http://spoutnik.local') {
        $archive_id = 2;        
      }else if (site_url() === 'https://spoutnik.info') {
        $archive_id = 2402;
      }
      //echo 'archive id:' . $archive_id;
      $args = array(
        'post_type'      => 'film',
        'posts_per_page'  => -1,
        'category__not_in' => array( 2402 ),
        'order'       => 'ASC',
        'post_status'   => 'publish',
        'tax_query'      => array(
          'relation' => 'OR',
          array(
            'taxonomy' => 'language',
            'field'    => 'slug',
            'terms'    => array('vostang', 'vo-anglais', 'version-anglaise', 'sans-dial', 'muet', 'intertitres-anglais', 'version-anglaise'),
          ),
          array(
            'taxonomy' => 'cycle',
            'field'    => 'slug',
            'terms'    => array('performances', 'cine-concert'),
          ),
        ),
      );
      // The Query
      $the_query = new WP_Query( $args );
      @endphp
      <h1>Upcoming English speaking friendly films/events at Cinema Spoutnik</h1>      
      <br>
      <div class="ui container">
        <div class="ui four column grid stackable">
          @if ( $the_query->have_posts() )
            @while ($the_query->have_posts()) @php($the_query->the_post())
              <div class="column">
                <article @php(post_class())>
                  <header>
                    @php( $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'full') )
                    <a href="@php(the_permalink())">
                      <img src="{{ $thumb['0'] }}" alt="" class="ui image"/>
                    </a>
                    <h2 class="entry-title"><a href="@php(the_permalink())" class="title-link">@php( the_title() )</a></h2>
                    @if ( get_post_meta(get_the_ID(),'film_landing',true) )
                      <h4>
                        @php
                          echo get_post_meta(get_the_ID(),'film_landing',true);
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
            @endwhile
            @php
              wp_reset_postdata();
            @endphp
          @else
            Sorry nothing at the moment...
          @endif

        </div>
      </div>
      {!! get_the_posts_navigation() !!}
    </div>
  @endwhile
  <br>
  <br>
@endsection
