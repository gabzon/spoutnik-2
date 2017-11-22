@extends('layouts.app')

@section('content')
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
    <?php $image_cycle = get_term_meta(get_queried_object()->term_id, 'image_director', false); ?>
    <h1><?= get_queried_object()->description ?></h1>
    <div class="ui grid stackable">
      <div class="one wide column"></div>
      <div class="seven wide column">
        <img src="<?= $image_cycle[0]; ?>" alt="" class="ui image" />
      </div>
      <div class="seven wide column">
        <?php echo get_term_meta(get_queried_object()->term_id, 'director_bio', true); ?>
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
    {!! get_the_posts_navigation() !!}
    <br>
  </div>
  <br>
@endsection
