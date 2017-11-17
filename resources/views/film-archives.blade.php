{{--
Template Name: Films Categories
--}}

@php
$director = array('director');
$cycle = array('cycle');

$parent_args = array(
  'orderby'           => 'name',
  'order'             => 'ASC',
  'hide_empty'        => true,
);

$directors = get_terms($director, $parent_args);
$cycles = get_terms($cycle, $parent_args);

function nestedCategories($cat){
  if (count($cat) > 0) {
    foreach ($cat as $c){
      $link = get_term_link( $c );
      echo '<a class="ui basic button" href="' . $link . '" style="font-weight:bold;margin-top: 5px;">';
      echo $c->name;
      $taxonomy_name = $c->taxonomy;
      echo $c->term_id;
      echo '</a>';
      $parent_id = $c->term_id;
      $subcategories = get_terms ( 'taxonomy_name', array ( 'child_of' => $parent_id, 'hide_empty' => false, 'orderby' => 'name', 'order' => 'ASC', ) );
      //then set the args for wp_list_categories
      $termchildren = get_term_children( $c->term_id, $taxonomy_name );
      if ($termchildren) {
        echo '<br>';
        foreach ( $termchildren as $child ) {
          $term = get_term_by( 'id', $child, $taxonomy_name );
          echo '<a href="' . get_term_link( $child, $taxonomy_name ) . '" class="ui basic button" style="margin-top: 5px;">' . $term->name . '</a>';
        }
      }
    }
  }
}
@endphp


@extends('layouts.app')


@section('content')
  <div class="ui container">
    @while(have_posts()) @php(the_post())
      @include('partials.page-header')
      @include('partials.content-page')
      {{ get_the_category_list() }}
    @endwhile


    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="cycles-tab" data-toggle="tab" href="#cycles" role="tab" aria-controls="cycles" aria-selected="true">Cycles</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="event-tab" data-toggle="tab" href="#event" role="tab" aria-controls="event" aria-selected="false">Event</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="collaboration-tab" data-toggle="tab" href="#collaboration" role="tab" aria-controls="collaboration" aria-selected="false">Collaboration</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="director-tab" data-toggle="tab" href="#director" role="tab" aria-controls="director" aria-selected="false">Director</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="country-tab" data-toggle="tab" href="#country" role="tab" aria-controls="country" aria-selected="false">Country</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="month-tab" data-toggle="tab" href="#month" role="tab" aria-controls="month" aria-selected="false">Month</a>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="cycles" role="tabpanel" aria-labelledby="cycles-tab">
        @include('archives.cycles')
      </div>
      <div class="tab-pane fade" id="event" role="tabpanel" aria-labelledby="event-tab">
        @include('archives.events')
      </div>
      <div class="tab-pane fade" id="collaboration" role="tabpanel" aria-labelledby="collaboration-tab">
        @include('archives.collaborations')
      </div>
      <div class="tab-pane fade" id="director" role="tabpanel" aria-labelledby="director-tab">
        @include('archives.directors')
      </div>
      <div class="tab-pane fade" id="country" role="tabpanel" aria-labelledby="country-tab">
        @include('archives.country')
      </div>
      <div class="tab-pane fade" id="month" role="tabpanel" aria-labelledby="month-tab">
        @include('archives.monthly')
      </div>
    </div>
  </div>
  <br>
  <br>
@endsection
