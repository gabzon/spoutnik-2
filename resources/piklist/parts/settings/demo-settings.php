<?php
/*
Title: Spoutnik options
Setting: my_theme_settings
*/
piklist('field', array(
    'type' => 'text',
    'field' => 'tarif_normale',
    'label' => 'Tarif normale'
));

piklist('field', array(
    'type' => 'text',
    'field' => 'tarif_reduit',
    'label' => 'Tarif reduite'
));

piklist('field', array(
    'type' => 'text',
    'field' => 'tarif_enfant',
    'label' => 'Tarif enfant'
));

piklist('field', array(
    'type' => 'text',
    'field' => 'tarif_membre',
    'label' => 'Tarif membre'
));
piklist('field', array(
    'type' => 'text',
    'field' => 'tarif_membre_annee',
    'label' => 'Tarif membre annee'
));

piklist('field', array(
    'type' => 'colorpicker'
    ,'field' => 'colorpicker'
    ,'label' => 'Choose a color'
    ,'value' => '#aee029'
    ,'description' => 'Click in the box to select a color.'
    ,'help' => 'This is help text.'
    ,'attributes' => array(
        'class' => 'text'
    )
));

piklist('field', array(
    'type' => 'textarea',
    'field' => 'spoutnik_address_cinema',
    'label' => __('Cinema address','sage'),
    'columns' => 6
));

piklist('field', array(
    'type' => 'text',
    'field' => 'google_map_cinema',
    'label' => __('Google maps Cinema','sage'),
    'columns' => 10
));

piklist('field', array(
    'type' => 'textarea',
    'field' => 'spoutnik_address_office',
    'label' => __('Office address','sage'),
    'columns' => 6
));

piklist('field', array(
    'type' => 'text',
    'field' => 'google_map_office',
    'label' => __('Google maps office','sage'),
    'columns' => 10
));

piklist('field', array(
    'type' => 'text',
    'field' => 'spoutnik_phone',
    'label' => __('Phone','sage'),
    'columns' => 5
));

piklist('field', array(
    'type' => 'text',
    'field' => 'spoutnik_email',
    'label' => __('Email','sage'),
    'columns' => 5
));

piklist('field', array(
    'type' => 'textarea',
    'field' => 'spoutnik_info',
    'label' => 'Spoutnik info',
    'columns' => 12
));

piklist('field', array(
    'type' => 'textarea',
    'field' => 'spoutnik_horaire',
    'label' => __('Opening hours','sage'),
    'columns' => 12
));

piklist('field', array(
    'type' => 'text',
    'field' => 'spoutnik_programme_complet',
    'label' => __('Download full program PDF'),
    'columns' => 12
));

piklist('field', array(
    'type' => 'editor',
    'field' => 'spoutnik_organisers',
    'label' => __('Organisers','sage'),
    'columns' => 12
));

piklist('field', array(
    'type' => 'editor',
    'field' => 'spoutnik_committee',
    'label' => __('Committee','sage'),
    'columns' => 12
));

piklist('field', array(
    'type' => 'text',
    'field' => 'spoutnik_facebook',
    'label' => __('Facebook','sage'),
    'columns' => 12
));
