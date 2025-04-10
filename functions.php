<?php

// Include the custom nav walker
require_once get_template_directory() . '/inc/class-klinik-nav-walker.php';

// Exit if accessed directly
if (! defined('ABSPATH'))
    exit;

require_once get_template_directory() . '/support/register-post-type.php';
require_once get_template_directory() . '/support/enqueue.php';
require_once get_template_directory() . '/support/blocks.php';
require_once get_template_directory() . '/support/theme-setup.php';


// Add theme support for post thumbnails
add_theme_support('post-thumbnails');

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

// Modify main query for home page
function modify_home_query($query) {
    if (!is_admin() && $query->is_main_query() && $query->is_home()) {
        $query->set('posts_per_page', 10);
    }
}
add_action('pre_get_posts', 'modify_home_query');

   
