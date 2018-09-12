<?php
/*
 * Title: Film fields
 * Post type: film
**/

$film_date = array(
   'type'         => 'datepicker',
   'field'        => 'film_date',
   'label'        => 'Date(s)',
   'columns'      => 6,
   'options'      => array('dateFormat' => 'd/m/yy', 'firstDay' => '1')
);

$film_heure = array(
   'type'         => 'text',
   'field'        => 'film_heure',
   'label'        => 'Heure(s)',
   'columns'      => 6
);

piklist('field', array(
   'type'         => 'group',
   'field'        => 'film_horaire',
   'label'        => 'Horaire',
   'add_more' => true,
   'fields'       => array(
         $film_date,
         $film_heure
   )
));


piklist('field', array(
    'type' => 'text',
    'field' => 'film_original_title',
    'label' => 'Titre Original',
    'columns' => 12
));

piklist('field', array(
    'type' => 'text',
    'field' => 'film_duration',
    'label' => 'Durée',
    'description' => 'Duration in minutes (ex: 89\')',
    'columns' => 12
));

piklist('field', array(
    'type' => 'text',
    'field' => 'film_trailer',
    'label' => 'Movie trailer',
    'description' => 'Add the youtube/vimeo ID',
    'columns' => 12
));

piklist('field', array(
    'type' => 'text',
    'field' => 'film_website',
    'label' => 'Website',
    'columns' => 12
));

piklist('field', array(
    'type'      => 'text',
    'field'     => 'film_actors',
    'label'     => 'Actor(s)',
    'columns'   => 12,
    'add_more'  => true
));

piklist('field', array(
    'type' => 'text',
    'field' => 'film_landing',
    'label' => 'Slider texte',
    'description' => 'Use this field only if you want to display this message on the slider in the landing page',
    'columns' => 12
));
