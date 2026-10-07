<?php

function portfolio_enqueue_styles() {
    wp_enqueue_style('portfolio-style',get_stylesheet_uri(),array(),'1.0');
    wp_enqueue_style('portfolio-header',get_template_directory_uri() . '/assets/css/header.css',array('portfolio-style'),'1.0');
    wp_enqueue_style('portfolio-front-page',get_template_directory_uri() . '/assets/css/front-page.css',array('portfolio-style'),'1.0');
    wp_enqueue_style('portfolio-footer',get_template_directory_uri() . '/assets/css/footer.css',array('portfolio-style'),'1.0');
    wp_enqueue_style('portfolio-single-page',get_template_directory_uri() . '/assets/css/single-page.css',array('portfolio-style'),'1.0');

}

add_action('wp_enqueue_scripts', 'portfolio_enqueue_styles');

// Creation of the Project Custom Post Type
function portfolio_register_project_post_type() {

    $args = array(
        'labels' => array(
            'name'          => 'Projets',
            'singular_name' => 'Projet',
            'add_new_item'  => 'Ajouter un projet',
            'edit_item'     => 'Modifier le projet',
            'view_item'     => 'Voir le projet',
            'search_items'  => 'Rechercher un projet',
            'not_found'     => 'Aucun projet trouvé',
        ),

        'public'       => true,
        'has_archive'  => true,
        'show_in_rest' => true,
        'menu_icon'    => 'dashicons-portfolio',

        'supports' => array(
            'title',
            'editor',
            'thumbnail'
        ),

        'rewrite' => array(
            'slug' => 'projets'
        )
    );

    register_post_type('projet', $args);
}

add_action('init', 'portfolio_register_project_post_type');

// Theme setup
function portfolio_theme_setup() {

    // Featured images
    add_theme_support('post-thumbnails');

    // Automatic page title management
    add_theme_support('title-tag');

    // Menu locations
    register_nav_menus(
        array(
            'main-menu' => 'Menu principal'
        )
    );
}

add_action('after_setup_theme', 'portfolio_theme_setup');