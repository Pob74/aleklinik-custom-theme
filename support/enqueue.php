<?php

function klinik_test_enqueue_styles() {
    wp_enqueue_style('tailwindcss', get_template_directory_uri() . '/src/output.css');
  
     
}
add_action('wp_enqueue_scripts', 'klinik_test_enqueue_styles');

function klinik_test_enqueue_scripts() {
    wp_enqueue_script('navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'klinik_test_enqueue_scripts');

function klinik_scripts() {
    // Enqueue your scripts here
    wp_enqueue_script('klinik-sidebar', get_template_directory_uri() . '/assets/js/sidebar.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'klinik_scripts');
