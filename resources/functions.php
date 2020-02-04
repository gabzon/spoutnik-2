<?php

/**
* Do not edit anything in this file unless you know what you're doing
*/

use Roots\Sage\Config;
use Roots\Sage\Container;

/**
* Helper function for prettying up errors
* @param string $message
* @param string $subtitle
* @param string $title
*/
$sage_error = function ($message, $subtitle = '', $title = '') {
  $title = $title ?: __('Sage &rsaquo; Error', 'sage');
  $footer = '<a href="https://roots.io/sage/docs/">roots.io/sage/docs/</a>';
  $message = "<h1>{$title}<br><small>{$subtitle}</small></h1><p>{$message}</p><p>{$footer}</p>";
  wp_die($message, $title);
};

/**
* Ensure compatible version of PHP is used
*/
if (version_compare('7', phpversion(), '>=')) {
  $sage_error(__('You must be using PHP 7 or greater.', 'sage'), __('Invalid PHP version', 'sage'));
}

/**
* Ensure compatible version of WordPress is used
*/
if (version_compare('4.7.0', get_bloginfo('version'), '>=')) {
  $sage_error(__('You must be using WordPress 4.7.0 or greater.', 'sage'), __('Invalid WordPress version', 'sage'));
}

/**
* Ensure dependencies are loaded
*/
if (!class_exists('Roots\\Sage\\Container')) {
  if (!file_exists($composer = __DIR__.'/../vendor/autoload.php')) {
    $sage_error(
      __('You must run <code>composer install</code> from the Sage directory.', 'sage'),
      __('Autoloader not found.', 'sage')
    );
  }
  require_once $composer;
}

/**
* Sage required files
*
* The mapped array determines the code library included in your theme.
* Add or remove files to the array as needed. Supports child theme overrides.
*/
array_map(function ($file) use ($sage_error) {
  $file = "../app/{$file}.php";
  if (!locate_template($file, true, true)) {
    $sage_error(sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file), 'File not found');
  }
}, [
  'helpers', 'setup', 'filters', 'admin', 'default', 'sorting', 'spoutnik',
  'status',
  'api/film-api',
  'taxonomy/couleur',
  'taxonomy/distribution',
  'taxonomy/country',
  'taxonomy/cycle',
  'taxonomy/director',
  'taxonomy/format',
  'taxonomy/language',
  'taxonomy/program',
  'taxonomy/year',
  'taxonomy/collaboration',
  //'post-status/film_status',
  'post-type/film',
]);

/**
* Here's what's happening with these hooks:
* 1. WordPress initially detects theme in themes/sage/resources
* 2. Upon activation, we tell WordPress that the theme is actually in themes/sage/resources/views
* 3. When we call get_template_directory() or get_template_directory_uri(), we point it back to themes/sage/resources
*
* We do this so that the Template Hierarchy will look in themes/sage/resources/views for core WordPress themes
* But functions.php, style.css, and index.php are all still located in themes/sage/resources
*
* This is not compatible with the WordPress Customizer theme preview prior to theme activation
*
* get_template_directory()   -> /srv/www/example.com/current/web/app/themes/sage/resources
* get_stylesheet_directory() -> /srv/www/example.com/current/web/app/themes/sage/resources
* locate_template()
* ├── STYLESHEETPATH         -> /srv/www/example.com/current/web/app/themes/sage/resources/views
* └── TEMPLATEPATH           -> /srv/www/example.com/current/web/app/themes/sage/resources
*/
array_map(
  'add_filter',
  ['theme_file_path', 'theme_file_uri', 'parent_theme_file_path', 'parent_theme_file_uri'],
  array_fill(0, 4, 'dirname')
);
Container::getInstance()
->bindIf('config', function () {
  return new Config([
    'assets' => require dirname(__DIR__).'/config/assets.php',
    'theme' => require dirname(__DIR__).'/config/theme.php',
    'view' => require dirname(__DIR__).'/config/view.php',
  ]);
}, true);

add_action( 'rest_api_init', function () {
  $controller = new Film_Endpoint();
  $controller->register_routes();
} );


// add_action('wp_head', 'show_template');
// function show_template() {
// 	global $template;
//     echo '<div style="background:red; position:fixed; bottom:10px;">';
//     print_r($template);
//     echo '</div>';
// }

// https://developer.wordpress.org/reference/hooks/pre_get_posts/
// https://wordpress.stackexchange.com/questions/82795/how-can-i-change-wp-main-archives-loop-to-sort-by-name-or-title
function cycles_archives_orderby( $query ) {
  $cycle_regulier = get_term_by('slug','cycles-reguliers','cycle');
  $termchildren_regulier = get_term_children( $cycle_regulier->term_id, 'cycle' );
  
  $cycle_focus = get_term_by('slug','cycles-focus','cycle');
  $termchildren_focus = get_term_children( $cycle_focus->term_id, 'cycle' );

  // echo 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam omnis voluptatem necessitatibus consequatur nam quisquam asperiores, perferendis blanditiis temporibus tempore quo sint! Quis aliquam earum officiis, sapiente et cumque corrupti?';
  // echo '<div style="padding-top:100px">';
  // echo 'is archive: ' . $query->is_archive();
  // echo '<br>';
  // echo 'is main query:' . $query->is_main_query();
  // echo '<br>';
  // echo 'is tax:' . $query->is_tax('cycle',array('cycle-reguliers'));
  // echo '<br>';
  // echo 'cycle regulier:'. $cycle_regulier->name;
  // print_r($termchildren);

  // foreach($termchildren as $t){
  //   $the_term = get_term( $t, 'cycle');
  //   echo $the_term->name;
  // }
  // echo '</div>';
  
  if ( $query->is_archive() && $query->is_main_query() && is_tax('cycle', $termchildren_focus)) {  
    $query->set( 'order', 'asc' );   
  }
}
add_action( 'pre_get_posts', 'cycles_archives_orderby' );



