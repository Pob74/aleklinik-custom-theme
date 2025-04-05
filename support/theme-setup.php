<?php

//   Options page
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page('Inställningar hemsida');

}

// Register menus
function klinik_register_menus() {
    register_nav_menus(array(
        'primary_menu' => __('Primary Menu', 'klinik'),
        'mobile_menu' => __('Mobile Menu', 'klinik')
    ));
}
add_action('init', 'klinik_register_menus');

