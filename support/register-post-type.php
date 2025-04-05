<?php

// Custom post type
function create_posttype_horse() {

    register_post_type( 'Hästklinik',
    // CPT Options
        array(
          'hierarchical' => true,
            'labels' => array(
                'name' => __( 'Hästklinik' ),
                'singular_name' => __( 'Hästklinik' )
            ),
            'supports' => array(
                'title',
                'editor',
                'thumbnail',
                'page-attributes' /* This will show the post parent field */
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'hastklinik'),
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype_horse' );

// Custom post type
function create_posttype_animal() {

    register_post_type( 'Smådjursklinik',
    // CPT Options
        array(
          'hierarchical' => true,
            'labels' => array(
                'name' => __( 'Smådjur' ),
                'singular_name' => __( 'Smådjur' )
            ),
            'supports' => array(
                'title',
                'editor',
                'thumbnail',
                'page-attributes' /* This will show the post parent field */
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'smadjur'),
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype_animal' );
