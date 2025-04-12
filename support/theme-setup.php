<?php

// Function to handle theme supports
function klinik_theme_support() {

    // ** === Add this line for Custom Logo Support === **
    add_theme_support( 'custom-logo', array(
        'height'      => 100,  // Optional: Suggest a height
        'width'       => 400,  // Optional: Suggest a width
        'flex-width'  => true, // Optional: Allow flexible width
        'flex-height' => true, // Optional: Allow flexible height
    ) );
    // ** === End Custom Logo Support === **

    // Add other theme supports here if needed (like title-tag, post-thumbnails etc.)

}
add_action( 'after_setup_theme', 'klinik_theme_support' );

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

