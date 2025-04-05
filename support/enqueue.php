<?php

function klinik_test_enqueue_styles() {
    wp_enqueue_style('tailwindcss', get_template_directory_uri() . '/src/output.css');
    wp_enqueue_style('custom-styles', get_template_directory_uri() . '/assets/css/custom.css');
}
add_action('wp_enqueue_scripts', 'klinik_test_enqueue_styles');

function klinik_test_enqueue_scripts() {
    wp_enqueue_script('navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'klinik_test_enqueue_scripts');
