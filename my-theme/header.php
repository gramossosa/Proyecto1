<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?> <?php bloginfo('name'); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <div class="top-bar-header bg-dark text-white py-2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <a class="navbar-brand text-white" href="<?php echo esc_url(home_url('/')); ?>">Logo 1 (Top)</a>
                </div>
                <div class="col-md-8">
                    <div class="text-md-end mb-2">Logo 2 (Top Right)</div>
                    <form role="search" method="get" class="search-form-top input-group input-group-sm mb-2" action="<?php echo esc_url(home_url('/')); ?>">
                        <label class="visually-hidden" for="top-search-form"><?php _e('Search for:', 'my-theme'); ?></label>
                        <input type="search" id="top-search-form" class="form-control" placeholder="<?php esc_attr_e('Search &hellip;', 'my-theme'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
                        <button type="submit" class="btn btn-primary"><?php esc_html_e('Search', 'my-theme'); ?></button>
                    </form>
                    <div class="social-icons-top text-md-end">
                        <a href="#" class="text-white me-2">IG</a>
                        <a href="#" class="text-white me-2">FB</a>
                        <a href="#" class="text-white me-2">YT</a>
                        <a href="#" class="text-white">TW</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <header class="bg-light main-navigation-header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light" aria-label="<?php esc_attr_e('Primary Navigation', 'my-theme'); ?>">
            <div class="container">
                <?php
                if (is_front_page() && is_home()) :
                    ?>
                    <h1 class="navbar-brand mb-0"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                    <?php
                else :
                    ?>
                    <p class="navbar-brand mb-0"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
                    <?php
                endif;
                ?>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'my-theme'); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <?php
                    if (has_nav_menu('primary-menu')) {
                        wp_nav_menu(array(
                            'theme_location' => 'primary-menu',
                            'container'      => false,
                            'menu_class'     => 'navbar-nav ms-auto mb-2 mb-lg-0',
                            'fallback_cb'    => false,
                            // 'walker'      => new My_Theme_Bootstrap_Nav_Walker() // Example if a walker is needed
                        ));
                    }
                    ?>
                </div>
                <?php $site_description = get_bloginfo('description', 'display');
                if ($site_description || is_customize_preview()) : ?>
                    <p class="site-description ms-2 mb-0 d-none d-lg-block text-muted small"><?php echo $site_description; ?></p>
                <?php endif; ?>
            </div>
        </nav>
    </header>
