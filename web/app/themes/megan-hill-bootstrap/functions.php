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

//$labels = array(
//    'name'                  => _x( 'Case Studies', 'Post Type General Name', 'text_domain' ),
//    'singular_name'         => _x( 'Case Study', 'Post Type Singular Name', 'text_domain' ),
//    'menu_name'             => __( 'Case Studies', 'text_domain' ),
//    'name_admin_bar'        => __( 'Case Study', 'text_domain' ),
//    'archives'              => __( 'Case Study Archives', 'text_domain' ),
//    'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
//    'all_items'             => __( 'All case studies', 'text_domain' ),
//    'add_new_item'          => __( 'Add New case study', 'text_domain' ),
//    'add_new'               => __( 'Add new case study', 'text_domain' ),
//    'new_item'              => __( 'New case study', 'text_domain' ),
//    'edit_item'             => __( 'Edit case study', 'text_domain' ),
//    'update_item'           => __( 'Update case study', 'text_domain' ),
//    'view_item'             => __( 'View case study', 'text_domain' ),
//    'search_items'          => __( 'Search case study', 'text_domain' ),
//    'not_found'             => __( 'Not found', 'text_domain' ),
//    'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
//    'featured_image'        => __( 'Featured Image', 'text_domain' ),
//    'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
//    'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
//    'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
//    'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
//    'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
//    'items_list'            => __( 'Items list', 'text_domain' ),
//    'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
//    'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
//);
//$args = array(
//    'label'                 => __( 'Case Study', 'text_domain' ),
//    'description'           => __( 'Case Study Description', 'text_domain' ),
//    'labels'                => $labels,
//    'supports'              => array('title', 'editor', 'thumbnail', 'revisions' ),
//    'hierarchical'          => false,
//    'public'                => true,
//    'show_ui'               => true,
//    'show_in_menu'          => true,
//    'menu_position'         => 5,
//    'menu_icon'             => 'dashicons-search',
//    'show_in_admin_bar'     => true,
//    'show_in_nav_menus'     => true,
//    'can_export'            => true,
//    'has_archive'           => false,
//    'exclude_from_search'   => false,
//    'publicly_queryable'    => true,
//    'capability_type'       => 'page',
//    'rewrite'               => array('slug' => 'the-thrive-approach/case-studies')
//);
//register_post_type( 'case_study', $args );


add_action( 'init', 'create_event_post_type' );