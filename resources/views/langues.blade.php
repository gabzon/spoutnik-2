{{--
Template Name: Langues
--}}

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
      @php
      $args = array(
        'post_type'      => 'film',
        'post_status'    => 'publish',
        'tax_query'      => array(
          array(
            'taxonomy' => 'language',
            'field'    => 'slug',
            'terms'    => ['vostang', 'vo-anglais', 'version-anglaise', 'sans-dial', 'muet', 'intertitres-anglais'],
          ),
        ),
      );

      // The Query
      $the_query = new WP_Query( $args );

      // The Loop
      if ( $the_query->have_posts() ) {
        echo '<ul>';
        while ( $the_query->have_posts() ) {
          $the_query->the_post();
          echo '<li>' . get_the_title() . '</li>';
        }
        echo '</ul>';
        /* Restore original Post Data */
        wp_reset_postdata();
      } else {
        echo 'merci';
      }
      @endphp




    </div>
  @endwhile
  <br>
  <br>

@endsection
