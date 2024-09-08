<?php
register_nav_menus(['primary' => 'Päävalikko']);

function luonnonystavat_assets()
{
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_script('luonnonystavat-script', get_template_directory_uri() . '/js/luonnonystavat.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'luonnonystavat_assets');

function luonnonystavat_widgets_init()
{
    register_sidebar(array(
        'name' => 'Sivupalkki',
        'id' => 'sidebar',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>'
    ));
}
add_action('widgets_init', 'luonnonystavat_widgets_init');

function theme_excerpt_read_more()
{
    global $post;
    return ' <a href="' . get_permalink($post->ID) . '">Lue lisää</a>';
}
add_filter('excerpt_more', 'theme_excerpt_read_more');

function theme_excerpt_length($length)
{
    return 12;
}
add_filter('excerpt_length', 'theme_excerpt_length');

function luonnonystavat_theme_setup()
{
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'luonnonystavat_theme_setup');
