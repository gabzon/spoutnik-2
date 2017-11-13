<?php
/*
Title: Extra options
Taxonomy: director
Capability: manage_options
*/



 piklist('field', [
     'type'     => 'textarea',
     'field'    => 'director_bio',
     'label'    => __('Biography','sage'),
     'columns'  => 12
 ]);

 piklist('field', [
     'type'     => 'text',
     'field'    => 'image_director',
     'label'    => __('Add Photo link URL','sage'),
     'columns'  => 12
 ]);
 ?>
