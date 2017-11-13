<?php
/*
Title: Extra options
Taxonomy: cycle
Capability: manage_options
*/

// Let's create a text box field
 piklist('field', [
     'type'     => 'text',
     'field'    => 'image_cycle',
     'label'    => __('Add image link URL'),
     'help'     => __('Image should have a width bigger than 980px'),
     'columns'  => 12
 ]);
 ?>
