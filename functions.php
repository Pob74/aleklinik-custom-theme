<?php


// Exit if accessed directly
if (! defined('ABSPATH'))
    exit;

require_once get_template_directory() . '/support/register-post-type.php';
require_once get_template_directory() . '/support/enqueue.php';
require_once get_template_directory() . '/support/blocks.php';

/**
 * Register navigation menus
 */
function klinik_register_menus() {
    register_nav_menus(array(
        'primary_menu' => __('Primary Menu', 'klinik'),
        'mobile_menu' => __('Mobile Menu', 'klinik')
    ));
}
add_action('init', 'klinik_register_menus');

/**
 * Add custom classes to menu items
 */
function klinik_menu_item_classes($classes, $item, $args) {
    if (isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'klinik_menu_item_classes', 10, 3);

   
