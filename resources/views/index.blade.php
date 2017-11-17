@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif

  <div class="ui container">
    <div class="ui four column grid stackable">
      <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
      <?php endwhile; ?>
    </div>
  </div>
  <br>
  @while (have_posts()) @php(the_post())
    @include('partials.content-'.get_post_type())
  @endwhile

  {!! get_the_posts_navigation() !!}
@endsection
