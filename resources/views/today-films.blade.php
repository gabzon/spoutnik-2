@php( $todays_movies = todays_movies() )

@if ($todays_movies)
  <div class="ui grid stackable desktop only">
    @foreach ($todays_movies as $movie)
      <div class="one wide column"></div>
      <div class="fourteen wide column">
        <div class="ui grid">
          <div class="six wide column">
            <h1><?php echo $movie['hour']; ?></h1>
            <a href="<?php echo esc_url($movie['link']); ?>" style="color:black">
              <h1><?php echo $movie['title']; ?></h1>
            </a>
            <h3 style="margin:0">{{ get_post_meta($movie['id'],'film_landing',true) }}</h3>
            @php
            $notification_message = Film::get_notification_message($movie['id'], $movie['date']);
            $text_color = App::text_color();
            @endphp
            @if ($notification_message)
              <h3 style="color:{{$text_color}}; margin:0; padding:0;">{{ $notification_message }}</h3>
            @endif
          </div>
          <div class="ten wide column"></div>
        </div>
        <div class="ui grid stackable">
          <div class="five wide column">
            <p>
              <?php echo $movie['excerpt']; ?>
            </p>
            <a href="<?php echo esc_url($movie['link']); ?>" class="landing-info"><?php _e('More info','sage'); ?></a>
            <br>
            <br>
            <h5>
              <?php if ($movie['director']): ?>
                <?php _e('Director: ','sage'); ?>
                <?php foreach ($movie['director'] as $x) {
                  echo $x->name . ' ';
                } ?>
                <br>
              <?php endif; ?>

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
          <div class="one wide column"></div>
          <div class="ten wide column">
            <?php $trailer = get_post_meta($post->ID,'film_trailer',true); ?>
            <?php if ($trailer): ?>
              <div class="movie-trailer ui embed" data-source="youtube" data-id="<?php echo $trailer; ?>" data-placeholder="<?php echo $movie['image']; ?>"></div>
            <?php else: ?>
              <a href="<?php echo esc_url($movie['link']); ?>">
                <img src="<?php echo $movie['image']; ?>" alt="" class="ui image" />
              </a>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="one wide column"></div>
    @endforeach
  </div>
@else
  <br>
  <div class="ui grid">
    <div class="one wide column"></div>
    <div class="ten wide column">
      <h1><?php _e('Nothing for today at Spoutnik !','sage'); ?></h1>
    </div>
  </div>
@endif
<br>
<br>
<br>
