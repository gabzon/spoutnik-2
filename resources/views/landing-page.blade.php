{{--
Template Name: Landing Template
--}}

@extends('layouts.front')

@php
$theme_options = get_option('my_theme_settings');
$full_program = $theme_options['spoutnik_programme_complet'];
@endphp

@section('content')
  <br>
  <div class="landing-content">
    <div class="gray-shadow">
      <div class="ui grid stackable" id="land">
        <div class="one wide column"></div>
        <div class="seven wide column">
          <br> @php( setlocale(LC_TIME, "fr_FR") )
          <h1 style="text-transform:uppercase">
            {{ __('TODAY ','sage') }} <br>
            {{ utf8_encode(strftime("%A %e %B")) }}
          </h1>
          <br>
        </div>
      </div>

      @include('today-films')

      @include('program.week')

      <div class="ui one column grid">
        <div class="column center aligned">
          @if ($full_program)
            <a href="<?= esc_url( $full_program ) ?>" style="color:black">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/journal-spoutnik-v3.svg" width="150" alt="" />
              <br>
              {{ __('full program','sage') }}
            </a>
          @endif
        </div>
      </div>
      <br><br>
    </div>
    <br>
    <br>
    <div class="ui grid stackable">
      <div class="one wide column"></div>
      <div class="fifteen wide column">
        <h1 class="ttu">Focus</h1>
      </div>
    </div>
    <br><br><br>
    @php
    $args = array(
      'posts_per_page'   => 3,
      'category_name'    => 'focus',
      'order'            => 'ASC',
      'post_type'        => 'post',
      'post_status'      => 'publish',
      'suppress_filters' => true
    );
    $focus_posts = get_posts( $args );
    @endphp
    <div class="ui grid four column stackable row">
      @foreach ($focus_posts as $post)
        <div class="three wide column col-3"></div>
        <div class="seven wide column col-3">
          <h1><a href="<?= get_permalink($post) ?>" style="color:black; text-transform:uppercase;">{{ $post->post_title }}</a></h1>

          {{-- https://wordpress.stackexchange.com/questions/268162/get-excerpt-from-post-post-content --}}
          <?php echo wp_trim_excerpt(); ?>

        </div>
        <div class="four wide column col-3">
          <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full'); ?>
          <img src="<?= $image[0]; ?>" alt="" class="ui image"/>
        </div>
        <div class="two wide column col-3"></div>
      @endforeach

      <?php foreach ( $posts as $post ) : setup_postdata( $post ); ?>

      <?php endforeach;
      wp_reset_postdata();?>
    </div>


  @php
  $the_slug = 'front-page';
  $args = [
    'name'        => $the_slug,
    'post_type'   => 'page',
    'post_status' => 'publish',
  ];
  $my_posts = get_posts($args);
  @endphp
  @if ($my_posts)
    @php($my_posts[0]->post_content)
  @endif
  <br>
  <br>
  <br>
</div>
<br>

@endsection
