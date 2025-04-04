<?php

function klinik_test_enqueue_styles() {
    wp_enqueue_style('tailwindcss', get_template_directory_uri() . '/src/output.css');
}
add_action('wp_enqueue_scripts', 'klinik_test_enqueue_styles');
