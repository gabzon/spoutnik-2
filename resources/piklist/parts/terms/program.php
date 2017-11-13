<?php
/*
Title: Extra options
Taxonomy: program
Capability: manage_options
*/



 piklist('field', [
     'type'     => 'textarea',
     'field'    => 'program_text',
     'label'    => __('Text','sage'),
     'columns'  => 12
 ]);

 piklist('field', [
     'type'     => 'text',
     'field'    => 'program_image',
     'label'    => __('Add Photo link URL','sage'),
     'columns'  => 12
 ]);

 piklist('field', [
     'type'     => 'text',
     'field'    => 'program_pdf',
     'label'    => __('Add Program link URL','sage'),
     'columns'  => 12
 ]);
 ?>
