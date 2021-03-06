@extends('layouts.app')

@section('content')
  <br>
  <br>
  <br>
  <br>
  <br>
  <div class="ui container">
    @include('partials.page-header')

    @if (!have_posts())
      <div class="alert alert-warning">
        {{  __('Sorry, no results were found.', 'sage') }}
      </div>
      {!! get_search_form(false) !!}
    @endif

    @while(have_posts()) @php(the_post())
      @include('partials.content-search')
      <br>
    @endwhile

    {!! get_the_posts_navigation() !!}
  </div>
  <br>
@endsection
