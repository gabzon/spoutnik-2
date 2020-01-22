@php
$theme_options = get_option('my_theme_settings');
$normal = $theme_options['tarif_normale'];
$reduit = $theme_options['tarif_reduit'];
$enfant = $theme_options['tarif_enfant'];
$membre = $theme_options['tarif_membre'];
$membre_annee = $theme_options['tarif_membre_annee'];
$cinema_address = $theme_options['spoutnik_address_cinema'];
$google_maps_cinema = $theme_options['google_map_cinema'];
$office_address = $theme_options['spoutnik_address_office'];
$google_maps_office = $theme_options['google_map_office'];
$colorpicker = $theme_options['colorpicker'];
$email = $theme_options['spoutnik_email'];
$phone = $theme_options['spoutnik_phone'];
$organisers = $theme_options['spoutnik_organisers'];
$committee = $theme_options['spoutnik_committee'];
$info = $theme_options['spoutnik_info'];
$horaire = $theme_options['spoutnik_horaire'];
@endphp



<div id="sidebar-computer-menu" class="ui right very wide sidebar vertical menu computer only"
  style="background:<?php echo $colorpicker; ?>; color:#fefefe;">
  <div class="sidebar-container" style="margin:0 30px">
    <br>
    <br>
    <div class="ui fluid accordion">

      <div class="title active">
        <h5 class="white"><i class="dropdown icon"></i>PROGRAMME</h5>
      </div>
      <div class="content active">
        <p class="transition visible" style="display: block !important;">
          @php(dynamic_sidebar('sidebar-primary'))
        </p>
      </div>
      <div class="title">
        <h5 class="white"><i class="dropdown icon"></i><?php _e('TARIFS','sage') ?></h5>
      </div>
      <div class="content">
        <h5 class="transition hidden sidebar-h5">
          <table>
            <tr>
              <td><?php _e('normal ','sage'); ?></td>
              <td>{{ $normal }}</td>
            </tr>
            <tr>
              <td><?php _e('reduction ','sage'); ?></td>
              <td><?php echo $reduit; ?></td>
            </tr>
            <tr>
              <td><?php _e('infant ','sage'); ?></td>
              <td><?php echo $enfant; ?></td>
            </tr>
            <tr>
              <td><?php _e('20years/20francs','sage'); ?></td>
              <td>Fr.5.– </td>
            </tr>
            <tr>
              <td><?php _e('member ','sage'); ?></td>
              <td>
                <?php echo $membre . ' ('. $membre_annee .')'; ?>
                <br>
                Amorti en 5 séances !
              </td>
            </tr>
          </table>
          <br>
          <h4><strong>Abonnement annuel</strong></h4>
          <p class="transition hidden">
            <table>
              <tr>
                <td>Abonnement normal</td>
                <td>Fr {{ $theme_options['tarif_abo_normal'] }}.-</td>
              </tr>
              <tr>
                <td>Abonnement réduit</td>
                <td>Fr {{ $theme_options['tarif_abo_reduit'] }}.-</td>
              </tr>
              <tr>
                <td>Abonnement soutien</td>
                <td>Fr {{ $theme_options['tarif_abo_soutien'] }}.-</td>
              </tr>
            </table>
          </p>
          <?php echo _e('En vente à la billetterie du Spoutnik','sage') ?>
        </h5>
      </div>

      <div class="title">
        <h5 class="white"><i class="dropdown icon"></i><?php _e('CONTACT','sage'); ?></h5>
      </div>
      <div class="content">
        <p class="transition hidden">
          <h5 class="sidebar-h5">
            <?php _e('Cinéma Spoutnik','sage'); ?><br>
            <?php echo $cinema_address; ?><br><br>
            <?php echo $google_maps_cinema; ?><br><br>
            <?php _e('Spoutnik Office','sage'); ?><br>
            <?php echo $office_address; ?><br><br>
            <i class="mail icon"></i> <?php echo $email; ?><br>
            <i class="phone icon"></i> <?php echo $phone; ?><br>
            <br>
            <?php //_e('Opening hours','sage'); ?><br>
            <?php if ($horaire): ?>
            <?php echo $horaire ?>
            <?php else: ?>
            <?php _e('Irregular schedule','sage'); ?>
            <?php endif; ?>
          </h5>

          <h5 class="sidebar-h5">
            <?php //_e('ORGANISERS: ','sage'); ?>
            <?php echo 'PERMANENCE'; ?>
            <br><br>
            @if ( $theme_options['spoutnik_programmation'] && $theme_options['spoutnik_comptabilite'] &&
            $theme_options['spoutnik_graphisme'] )
            Programme: {{ $theme_options['spoutnik_programmation'] }}<br />
            Comptabilité: {{ $theme_options['spoutnik_comptabilite'] }}<br />
            Graphisme: {{ $theme_options['spoutnik_graphisme'] }}<br />
            @else
            <?php echo $organisers; ?>
            @endif
          </h5>

          <h5 class="sidebar-h5">
            <?php _e('THE COMMITTEE:','sage'); ?><br><br>
            <?php echo $committee; ?>
          </h5>
        </p>
      </div>
      <div class="title">
        <h5 class="white"><i class="dropdown icon"></i><?php _e('INFO','sage'); ?></h5>
      </div>
      <div class="content">
        <h5 class="transition hidden sidebar-h5">
          <?php echo $info; ?>
        </h5>
      </div>
    </div>
  </div>
</div>

<div id="sidebar-mobile-menu" class="ui right wide sidebar vertical menu mobile only"
  style="background:<?php echo $colorpicker; ?>; color:#fefefe;">

  <div class="sidebar-container" style="margin:0 30px">
    <br>
    <br>
    <div class="ui fluid accordion">

      <div class="title active">
        <h5><i class="dropdown icon"></i>PROGRAMME</h5>
      </div>
      <div class="content active">
        <p class="transition visible" style="display: block !important;">
          @php(dynamic_sidebar('sidebar-primary'))
        </p>
      </div>
      <div class="title">
        <h5 style="text-transform:uppercase;"><i class="dropdown icon"></i><?php _e('TARIFS','sage') ?></h5>
      </div>
      <div class="content">
        <h5 class="transition hidden sidebar-h5">
          <table>
            <tr>
              <td><?php _e('normal ','sage'); ?></td>
              <td><?php echo $normal; ?></td>
            </tr>
            <tr>
              <td><?php _e('reduction ','sage'); ?></td>
              <td><?php echo $reduit; ?></td>
            </tr>
            <tr>
              <td><?php _e('infant ','sage'); ?></td>
              <td><?php echo $enfant; ?></td>
            </tr>
            <tr>
              <td><?php _e('20years/20francs','sage'); ?></td>
              <td>Fr.5.– </td>
            </tr>
            <tr>
              <td><?php _e('member ','sage'); ?></td>
              <td>
                <?php echo $membre . ' ('. $membre_annee .')'; ?>
                <br>
                Amorti en 5 séances !
              </td>
            </tr>
          </table>
          <br>
          <h4><strong>Abonnement annuel</strong></h4>
          <p class="transition hidden">
            <table>
              <tr>
                <td>Abonnement normal</td>
                <td>Fr {{ $theme_options['tarif_abo_normal'] }}.-</td>
              </tr>
              <tr>
                <td>Abonnement réduit</td>
                <td>Fr {{ $theme_options['tarif_abo_reduit'] }}.-</td>
              </tr>
              <tr>
                <td>Abonnement soutien</td>
                <td>Fr {{ $theme_options['tarif_abo_soutien'] }}.-</td>
              </tr>
            </table>
          </p>
          <?php echo _e('En vente à la billetterie du Spoutnik','sage') ?>
        </h5>
      </div>
      <div class="title">
        <h5><i class="dropdown icon"></i><?php _e('CONTACT','sage'); ?></h5>
      </div>
      <div class="content">
        <p class="transition hidden">
          <h5 class="sidebar-h5">
            <?php _e('Cinéma Spoutnik','sage'); ?><br>
            <?php echo $cinema_address; ?><br><br>
            <?php echo $google_maps_cinema; ?><br><br>
            <?php _e('Spoutnik Office','sage'); ?><br>
            <?php echo $office_address; ?><br><br>
            <i class="mail icon"></i> <?php echo $email; ?><br>
            <i class="phone icon"></i> <?php echo $phone; ?><br>
            <br>
            <?php _e('Opening hours','sage'); ?><br>
            <?php if ($horaire): ?>
            <?php echo $horaire ?>
            <?php else: ?>
            <?php _e('Irregular schedule','sage'); ?>
            <?php endif; ?>
          </h5>

          <h5 class="sidebar-h5">
            <?php //echo 'PERMANENCE'; ?>
            {{-- <br><br> --}}
            <br><br>
            @if ( $theme_options['spoutnik_programmation'] && $theme_options['spoutnik_comptabilite'] &&
            $theme_options['spoutnik_graphisme'] )
            gestion et programme: {{ $theme_options['spoutnik_programmation'] }}<br />
            Comptabilité: {{ $theme_options['spoutnik_comptabilite'] }}<br />
            Graphisme: {{ $theme_options['spoutnik_graphisme'] }}<br />
            @else
            <?php echo $organisers; ?>
            @endif
          </h5>

          <h5 class="sidebar-h5">
            <?= 'LE COMITÉ' ?>
            <br>
            <br>
            <?php echo $committee; ?>
          </h5>
        </p>
      </div>
      <div class="title">
        <h5><i class="dropdown icon"></i><?php _e('INFO','sage'); ?></h5>
      </div>
      <div class="content">
        <h5 class="transition hidden sidebar-h5">
          <?php echo $info; ?>
        </h5>
      </div>
    </div>
  </div>
</div>