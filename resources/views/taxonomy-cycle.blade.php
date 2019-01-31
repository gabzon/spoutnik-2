@extends('layouts.app')

@section('content')
  {{-- @include('partials.page-header') --}}
  <br>
  <br>
  <br>
  <br>
  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif

  <div class="ui container">
    @php($image_cycle = get_term_meta(get_queried_object()->term_id, 'image_cycle', true))
    <h1>{{ get_queried_object()->name }}</h1>
    <div class="ui grid stackable">
      <div class="one wide column"></div>
      <div class="seven wide column">
        <img src="{{ $image_cycle }}" alt="" class="ui image" />
                @php
        echo get_queried_object()->term_id;
        echo $term_id;
        echo $image_cycle;
        @endphp
      </div>
      <div class="seven wide column">
        @php
        echo term_description( $term_id, $taxonomy );
        @endphp
      </div>
      <div class="one wide column"></div>
    </div>
  </div>
  <br>
  <br>
  <br>
  <div class="ui container">
    <div class="ui four column grid stackable">
      @while (have_posts()) @php(the_post())
        @include('partials.content-'.get_post_type())
      @endwhile
    </div>
  </div>
  {!! get_the_posts_navigation() !!}
  <br>
@endsection
