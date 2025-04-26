<?php

function klinik_test_enqueue_styles()
{
    wp_enqueue_style('tailwindcss', get_template_directory_uri() . '/src/output.css');
}
add_action('wp_enqueue_scripts', 'klinik_test_enqueue_styles');

function klinik_test_enqueue_scripts()
{
    wp_enqueue_script('navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'klinik_test_enqueue_scripts');

function klinik_scripts()
{
    // Enqueue your scripts here
    wp_enqueue_script('klinik-sidebar', get_template_directory_uri() . '/assets/js/sidebar.js', array(), '1.0.0', true);

    // Check if we should load the lightbox script
    $should_load_lightbox = false;

    // For single posts/pages, check the content
    if (is_singular()) {
        global $post;

        // Check if the post has the gallery block
        if ($post && has_shortcode($post->post_content, 'gallery')) {
            $should_load_lightbox = true;
        }

        // Check for ACF flexible content fields
        if (!$should_load_lightbox && function_exists('have_rows')) {
            // Check if the post has the section field with gallery_block layout
            if (have_rows('section', $post->ID)) {
                while (have_rows('section', $post->ID)) {
                    the_row();
                    if (get_row_layout() == 'gallery_block') {
                        $should_load_lightbox = true;
                        break;
                    }
                }
                // Reset the ACF loop to avoid affecting other code
                reset_rows();
            }
        }
    }

    // Always load on archive pages as we don't know if galleries are present
    if (is_archive() || is_home()) {
        $should_load_lightbox = true;
    }

    // Allow theme/plugins to force loading the lightbox
    $should_load_lightbox = apply_filters('klinik_should_load_lightbox', $should_load_lightbox);

    // Load the lightbox script if needed
    if ($should_load_lightbox) {
        wp_enqueue_script('klinik-custom-lightbox', get_template_directory_uri() . '/assets/js/custom-lightbox.js', array('jquery'), '1.0.0', true);
    }
}
add_action('wp_enqueue_scripts', 'klinik_scripts');
