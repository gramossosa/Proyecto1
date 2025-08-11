<?php
/**
 * Edesur Clone functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Edesur_Clone
 */

if ( ! function_exists( 'edesur_clone_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     */
    function edesur_clone_setup() {
        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary Menu', 'edesur-clone' ),
        ) );
    }
endif;
add_action( 'after_setup_theme', 'edesur_clone_setup' );
