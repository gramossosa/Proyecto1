<?php

// Enqueue Theme Stylesheet
function my_theme_enqueue_styles() {
    // Enqueue Bootstrap CSS
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css', array(), '5.3.6', 'all');

    // Enqueue Theme Stylesheet (dependent on Bootstrap CSS)
    wp_enqueue_style('my-theme-style', get_stylesheet_uri(), array('bootstrap-css'));
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');

// Enqueue Theme Scripts
function my_theme_enqueue_scripts() {
    // Enqueue Bootstrap JS Bundle
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js', array(), '5.3.6', true);
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_scripts');


// Add Theme Support
function my_theme_setup() {
    // Add support for Post Thumbnails
    add_theme_support('post-thumbnails');

    // Add support for Automatic Feed Links
    add_theme_support('automatic-feed-links');

    // Add support for Title Tag
    add_theme_support('title-tag');

    // Register Navigation Menu
    register_nav_menus(array(
        'primary-menu' => __('Primary Menu', 'my-theme')
    ));

    // Register Sidebar Widget Area
    register_sidebar(array(
        'name'          => __('Main Sidebar', 'my-theme'),
        'id'            => 'main-sidebar',
        'description'   => __('Widgets added here will appear in the sidebar.', 'my-theme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s card mb-3">', // Added card and mb-3
        'after_widget'  => '</div></div>', // Closing card-body and card
        'before_title'  => '<div class="card-header"><h3 class="widget-title h5">', // Added card-header, h5
        'after_title'   => '</h3></div><div class="card-body">', // Closing card-header div, opening card-body
    ));
}
add_action('after_setup_theme', 'my_theme_setup');

// Add editor style support
function my_theme_add_editor_styles() {
    add_editor_style('style.css'); // You can create a specific editor-style.css if needed
}
add_action('admin_init', 'my_theme_add_editor_styles');

?>
