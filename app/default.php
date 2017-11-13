<?php

/*add_action('wp_head', 'show_template');
function show_template() {
global $template;
print_r($template);
}*/

function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

add_filter('piklist_admin_pages', 'piklist_theme_setting_pages');
function piklist_theme_setting_pages($pages)
{
    $pages[] = array(
        'page_title' => __('Custom Settings')
        ,'menu_title' => __('Settings', 'piklist')
        ,'sub_menu' => 'themes.php' //Under Appearance menu
        ,'capability' => 'manage_options'
        ,'menu_slug' => 'custom_settings'
        ,'setting' => 'my_theme_settings'
        ,'menu_icon' => plugins_url('piklist/parts/img/piklist-icon.png')
        ,'page_icon' => plugins_url('piklist/parts/img/piklist-page-icon-32.png')
        ,'single_line' => true
        ,'default_tab' => 'Basic'
        ,'save_text' => __('Save Settings','sage')
    );

    return $pages;
}
