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
    <header class="bg-light"> <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary-menu',
                        'container' => false, // Remove nav container
                        'menu_class' => 'navbar-nav ms-auto mb-2 mb-lg-0', // Add Bootstrap navbar classes
                        'fallback_cb' => false, // Do not fall back to wp_page_menu()
                        // Consider adding a custom walker here for full Bootstrap 5 nav item (li) and nav link (a) classes
                        // For now, basic classes on ul should provide some Bootstrap styling.
                    ));
                    ?>
                </div>
                <p class="ms-2 mb-0 d-none d-lg-block"><?php bloginfo('description'); ?></p>
            </div>
        </nav>
    </header>
