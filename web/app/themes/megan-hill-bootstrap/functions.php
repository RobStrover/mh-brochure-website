<?php

function wpdocs_theme_name_scripts() {
    wp_enqueue_style( 'styles', get_template_directory_uri() . '/css/build/styles.css' );
    wp_enqueue_script( 'script', get_template_directory_uri() . '/js/build/script.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );

register_nav_menus( array(
    'primary' => __( 'Primary Menu',      'megan-hill-bootstrap' ),
    'social'  => __( 'Social Links Menu', 'megan-hill-bootstrap' ),
) );


function create_event_post_type() {
    register_post_type( 'event',
        array(
            'labels' => array(
                'name' => __( 'Events' ),
                'singular_name' => __( 'Event' ),
            ),
            'public' => true,
            'has_archive' => true,
        )
    );
}


add_action( 'init', 'create_event_post_type' );