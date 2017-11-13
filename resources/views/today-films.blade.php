@php( $todays_movies = todays_movies() )

@if ($todays_movies)
  <div class="ui grid stackable desktop only">
    @foreach ($todays_movies as $movie)
      <div class="row justify-content-md-center">
        <div class="col-12 col-sm-12 col-md-11 col-lg-10">

          <div class="row">
            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
              <h1>{{ $movie['hour'] }}</h1>
              <a href="{{ esc_url($movie['link']) }}" style="color:black">
                <h1>{{ $movie['title'] }}</h1>
              </a>
            </div>
            <div class="col-12 col-sm-6 col-md-8 col-lg-8"></div>
          </div>

          <div class="row">
            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
              <p>{{ $movie['excerpt'] }}</p>
              <a href="{{ esc_url($movie['link']) }}" class="landing-info">{{ __('More info','sage')}}</a>
              <br><br>
              <h5>
                @if ($movie['director'])
                  {{ __('Director: ','sage') }}
                  @foreach ($movie['director'] as $x)
                    {{ $x->name . ' ' }}
                  @endforeach
                  <br>
                @endif


                <?php if ($movie['countries']): ?>
                  <?php _e('Country: ','sage'); ?>
                  <?php foreach ($movie['country'] as $x) {
                    echo $x->name . ' ';
                  } ?>
                  <br>
                <?php endif; ?>

                <?php if ($movie['year']): ?>
                  <?php _e('Year: ','sage'); ?>
                  <?php foreach ($movie['year'] as $x) {
                    echo $x->name . ' ';
                  } ?>
                  <br>
                <?php endif ?>

                <?php if ($movie['language']): ?>
                  <?php _e('Language: ','sage'); ?>
                  <?php foreach ($movie['language'] as $x) {
                    echo $x->name . ' ';
                  } ?>
                  <br>
                <?php endif ?>

                <?php if ($movie['format']): ?>
                  <?php _e('Format: ','sage'); ?>
                  <?php foreach ($movie['format'] as $x) {
                    echo $x->name . ' ';
                  } ?>
                  <br>
                <?php endif ?>
                <?php if ($movie['duration']): ?>
                  <?php _e('Duration: ','sage'); ?>
                  <?php echo $movie['duration']; ?>
                <?php endif ?>
              </h5>
              <br><br>
            </div>
          </div>

          <div class="col-md-1 col-lg-1"></div>

          <div class="col-12 col-sm-12 col-md-7 col-lg-7">
            @php( $trailer = get_post_meta($post->ID,'film_trailer',true) )
            @if ($trailer)
              <div class="movie-trailer ui embed" data-source="youtube" data-id="<?php echo $trailer; ?>" data-placeholder="<?php echo $movie['image']; ?>"></div>
            @else
              <a href="{{ esc_url($movie['link']) }}">
                <img src="{{ $movie['image'] }}" alt="" class="img-fluid" />
              </a>
            @endif
          </div>
        </div>
      </div>
    @endforeach
  </div>
@else
  <br>
  <div class="row">
    <div class="col-1"></div>
    <div class="col-11">
      <h1><?php _e('Nothing at Spoutnik for today!','sage'); ?></h1>
    </div>
  </div>
@endif
<br>
<br>
<br>
