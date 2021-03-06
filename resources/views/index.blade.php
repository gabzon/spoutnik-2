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
    <div class="ui four column grid stackable">
      @while (have_posts()) @php(the_post())
        @include('partials.content-'.get_post_type())
      @endwhile
    </div>
  </div>
  <br>
  {!! get_the_posts_navigation() !!}
  <br>
@endsection
