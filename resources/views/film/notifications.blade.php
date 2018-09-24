@if ( get_post_meta($post->ID, 'film_landing', true) )
  <h4>
    @php
      echo get_post_meta($post->ID, 'film_landing', true);
    @endphp
  </h4>
@endif
@if ($notification_dates)
  @php($alerts = get_post_meta($post->ID,'film_notifications'))
  @if (count($alerts[0]) > 0)
    <div class="notifications">
      @for ($i=0; $i < count($alerts[0]); $i++)
        @php
        $raw_date = $alerts[0][$i]['film_notification_date'];
        $alert_date = DateTime::createFromFormat('d/m/Y', $raw_date)->format('Y-m-d');
        $alert_date = new DateTime($alert_date);
        $color_text = App::text_color();
        @endphp
        <h4 style="color:{{ $color_text }}; margin:0; padding:0;">
          {{ utf8_encode(strftime("%a %e %b %G", $alert_date->getTimestamp())) }}, {{ $alerts[0][$i]['film_notification_desc']}}
        </h4>
      @endfor
      <br>
    </div>
  @endif
@endif
