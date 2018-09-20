@if ($notification_dates)
  @php($alerts = get_post_meta($post->ID,'film_notifications'))
  <div class="ui icon red message">
    <table>
      @for ($i=0; $i < count($alerts[0]); $i++)
        <tr>
          <td style="width:50%">
            <div class="header">
              @php
              $raw_date = $alerts[0][$i]['film_notification_date'];
              $alert_date = DateTime::createFromFormat('d/m/Y', $raw_date)->format('Y-m-d');
              $alert_date = new DateTime($alert_date);
              @endphp
              {{ utf8_encode(strftime("%a %e %b %G", $alert_date->getTimestamp())) }}
            </div>
          </td>
          <td>
            <p>{{ $alerts[0][$i]['film_notification_desc']}}</p>
          </td>
        </tr>
      @endfor
    </table>
  </div>
@endif
