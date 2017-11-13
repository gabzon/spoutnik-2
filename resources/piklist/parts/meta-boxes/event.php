<?php
/*
 * Title: Event fields
 * Post type: event
**/


piklist('field', array(
 'type' => 'datepicker'
 ,'scope' => 'post_meta' // Not used for settings sections
 ,'field' => 'event_date'
 ,'label' => __('Date','sage')
 ,'description' => 'Click in box'

));

piklist('field', array(
   'type'         => 'text',
   'field'        => 'event_heure',
   'label'        => __('Heure','sage')
));

piklist('field', array(
   'type'         => 'textarea',
   'field'        => 'event_adresse',
   'label'        => __('Adresse','sage')
));

piklist('field', array(
   'type'         => 'textarea',
   'field'        => 'event_google_maps',
   'label'        => __('Embeded Google Maps ','sage'),
   'columns'       => 12
));

piklist('field', array(
    'type' => 'text',
    'field' => 'event_landing',
    'label' => 'Slider texte',
    'description' => 'Utilisez ce champ pour afficher du text dans le home slider',
    'columns' => 12
));
