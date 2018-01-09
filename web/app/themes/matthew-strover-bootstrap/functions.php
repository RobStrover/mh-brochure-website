<?php

function wpdocs_theme_name_scripts() {
    wp_enqueue_style( 'styles', get_template_directory_uri() . '/css/build/styles.css' );
    wp_enqueue_script( 'script', get_template_directory_uri() . '/js/build/script.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );

register_nav_menus( array(
    'primary' => __( 'Primary Menu',      'matthew-strover-bootstrap' ),
    'social'  => __( 'Social Links Menu', 'matthew-strover-bootstrap' ),
) );

?>
