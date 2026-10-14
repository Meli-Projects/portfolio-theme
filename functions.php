<?php
// Enqueues the stylesheets and scripts used by the theme.
function portfolio_enqueue_styles() {
    wp_enqueue_style('portfolio-style', get_stylesheet_uri(), array(), '1.0');
    wp_enqueue_style('portfolio-header', get_template_directory_uri() . '/assets/css/header.css', array('portfolio-style'), '1.0');
    wp_enqueue_style('portfolio-front-page', get_template_directory_uri() . '/assets/css/front-page.css', array('portfolio-style'), '1.0');
    wp_enqueue_style('portfolio-footer', get_template_directory_uri() . '/assets/css/footer.css', array('portfolio-style'), '1.0');
    wp_enqueue_style('portfolio-single-page', get_template_directory_uri() . '/assets/css/single-page.css', array('portfolio-style'), '1.0');
    wp_enqueue_style('portfolio-project-card', get_template_directory_uri() . '/assets/css/project-card.css', array('portfolio-style'), '1.0');
    wp_enqueue_style('portfolio-project-modal', get_template_directory_uri() . '/assets/css/project-modal.css', array('portfolio-style'), '1.0');
    wp_enqueue_style('portfolio-animations', get_template_directory_uri() . '/assets/css/animations.css', array('portfolio-style'), '1.0');

    wp_enqueue_script('portfolio-project-modal', get_template_directory_uri() . '/assets/js/project-modal.js', array(), '1.0', true);
    wp_enqueue_script('portfolio-animations', get_template_directory_uri() . '/assets/js/animations.js', array(), '1.0', true);
}

add_action('wp_enqueue_scripts', 'portfolio_enqueue_styles');


// Creation of the Project Custom Post Type.
function portfolio_register_project_post_type() {

    // Labels displayed in the WordPress administration.
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

        // Makes the content publicly accessible and available in the block editor.
        'public'       => true,
        'has_archive'  => true,
        'show_in_rest' => true,
        'menu_icon'    => 'dashicons-portfolio',

        // Features available for each project.
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
        ),

        // URL structure used for project pages.
        'rewrite' => array(
            'slug' => 'projets',
        ),
    );

    register_post_type('projet', $args);
}

add_action('init', 'portfolio_register_project_post_type');

// Theme setup.
function portfolio_theme_setup() {

    // Featured images.
    add_theme_support('post-thumbnails');

    // Automatic page title management.
    add_theme_support('title-tag');

    // Menu locations.
    register_nav_menus(
        array(
            'main-menu' => 'Menu principal',
        )
    );
}

add_action('after_setup_theme', 'portfolio_theme_setup');