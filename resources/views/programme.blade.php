{{--
  Template Name: Program
--}}

@php
$theme_options = get_option('my_theme_settings');
$colorpicker = $theme_options['colorpicker'];
@endphp

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    {{-- @include('partials.page-header') --}}
    {{-- @include('partials.content-page') --}}
  @endwhile
  <div class="program-wrapper" style="background: <?php echo $colorpicker; ?>">
      <div class="" style="background:#fefefe">
          <br>
          <br>
          <br>
          {{-- @include('program.month') --}}
          @include('program.week')
          <br>
          <br>
          <div class="ui grid">
              <div class="one wide column"></div>
              <div class="ten wide column">
                  <h1 style="text-transform:uppercase">
                      @php( setlocale(LC_TIME, "fr_FR") )
                      {{ __('TODAY ','sage') }}<br>
                      {{ strftime("%A %e %B") }}
                  </h1>
              </div>
          </div>
          @include('today-films')
      </div>
  </div>

@endsection
