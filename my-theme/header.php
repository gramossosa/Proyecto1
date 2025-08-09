<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header class="main-header">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="<?php esc_attr_e('Primary Navigation', 'my-theme'); ?>">
            <div class="container">
                <div class="d-flex flex-column">
                    <?php if (is_front_page() && is_home()) : ?>
                        <h1 class="navbar-brand mb-0"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="text-white text-decoration-none"><?php bloginfo('name'); ?></a></h1>
                    <?php else : ?>
                        <p class="navbar-brand mb-0"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="text-white text-decoration-none"><?php bloginfo('name'); ?></a></p>
                    <?php endif; ?>
                    <?php $site_description = get_bloginfo('description', 'display');
                    if ($site_description || is_customize_preview()) : ?>
                        <p class="site-description text-white-50 small mb-0 d-none d-lg-block"><?php echo $site_description; ?></p>
                    <?php endif; ?>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav-collapse" aria-controls="main-nav-collapse" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'my-theme'); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="main-nav-collapse">
                    <?php
                    if (has_nav_menu('primary-menu')) {
                        wp_nav_menu(array(
                            'theme_location' => 'primary-menu',
                            'container'      => false,
                            'menu_class'     => 'navbar-nav ms-auto mb-2 mb-lg-0',
                            'fallback_cb'    => false,
                        ));
                    }
                    ?>
                    <div class="d-flex align-items-center ms-lg-3">
                        <form role="search" method="get" class="search-form-header input-group input-group-sm me-2" action="<?php echo esc_url(home_url('/')); ?>">
                            <label class="visually-hidden" for="header-search-form"><?php _e('Search for:', 'my-theme'); ?></label>
                            <input type="search" id="header-search-form" class="form-control form-control-sm" placeholder="<?php esc_attr_e('Search &hellip;', 'my-theme'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
                            <button type="submit" class="btn btn-primary btn-sm"><?php esc_html_e('Search', 'my-theme'); ?></button>
                        </form>
                        <div class="social-icons-header">
                            <a href="#" class="text-white-50 me-2">IG</a>
                            <a href="#" class="text-white-50 me-2">FB</a>
                            <a href="#" class="text-white-50">TW</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
