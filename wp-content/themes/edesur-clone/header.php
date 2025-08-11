<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="site">
    <header id="masthead" class="site-header">
        <div class="header-container">
            <div class="site-branding">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <img src="https://edesur.com.do/media/ft2g4dvn/logo.png" alt="Edesur Logo">
                </a>
            </div>
            <nav id="site-navigation" class="main-navigation">
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'edesur-clone' ); ?></button>
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                ) );
                ?>
            </nav><!-- #site-navigation -->
        </div>
    </header><!-- #masthead -->
    <div id="content" class="site-content">
