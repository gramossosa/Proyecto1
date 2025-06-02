<?php

// Enqueue Theme Stylesheet
function my_theme_enqueue_styles() {
    wp_enqueue_style('my-theme-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');


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
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('after_setup_theme', 'my_theme_setup');

// Add editor style support
function my_theme_add_editor_styles() {
    add_editor_style('style.css'); // You can create a specific editor-style.css if needed
}
add_action('admin_init', 'my_theme_add_editor_styles');

?>
