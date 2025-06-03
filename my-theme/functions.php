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

// Custom Walker for Bootstrap 5 styled comments
if (!class_exists('My_Theme_Bootstrap_Comment_Walker')) {
    class My_Theme_Bootstrap_Comment_Walker extends Walker_Comment {
        protected function html5_comment( $comment, $depth, $args ) {
            $tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
            ?>
            <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'parent media mb-3' : 'media mb-3', $comment ); ?>>
                <article id="div-comment-<?php comment_ID(); ?>" class="comment-body d-flex">
                    <?php if ( 0 != $args['avatar_size'] ) : ?>
                    <div class="flex-shrink-0 me-3">
                        <?php echo get_avatar( $comment, $args['avatar_size'], '', '', array('class' => 'img-fluid rounded-circle') ); ?>
                    </div>
                    <?php endif; ?>

                    <div class="comment-content media-body">
                        <div class="comment-meta d-flex justify-content-between">
                            <div class="comment-author vcard">
                                <?php printf( '<b class="fn">%s</b> <span class="says visually-hidden">says:</span>', get_comment_author_link( $comment ) ); ?>
                            </div><!-- .comment-author -->

                            <div class="comment-metadata">
                                <a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>" class="text-muted small">
                                    <time datetime="<?php comment_time( 'c' ); ?>">
                                        <?php
                                            /* translators: 1: date, 2: time */
                                            printf( esc_html__( '%1$s at %2$s', 'my-theme' ), get_comment_date( '', $comment ), get_comment_time() );
                                        ?>
                                    </time>
                                </a>
                                <?php edit_comment_link( esc_html__( 'Edit', 'my-theme' ), '<span class="edit-link ms-2 small">', '</span>' ); ?>
                            </div><!-- .comment-metadata -->
                        </div><!-- .comment-meta -->


                        <?php if ( '0' == $comment->comment_approved ) : ?>
                        <p class="comment-awaiting-moderation alert alert-info small mt-2"><?php esc_html_e( 'Your comment is awaiting moderation.', 'my-theme' ); ?></p>
                        <?php endif; ?>

                        <div class="comment-text mt-2">
                            <?php comment_text(); ?>
                        </div><!-- .comment-text -->

                        <?php
                        comment_reply_link(
                            array_merge(
                                $args,
                                array(
                                    'add_below' => 'div-comment',
                                    'depth'     => $depth,
                                    'max_depth' => $args['max_depth'],
                                    'before'    => '<div class="reply mt-2 small">',
                                    'after'     => '</div>',
                                    'class'     => 'btn btn-sm btn-outline-secondary'
                                )
                            )
                        );
                        ?>
                    </div><!-- .comment-content -->
                </article><!-- .comment-body -->
            <?php
        }
    }
}

// Basic walker for categories to add list-group-item class, if not using a plugin for this
if (!class_exists('My_Theme_Category_Walker')) {
    class My_Theme_Category_Walker extends Walker_Category {
        function start_el(&$output, $category, $depth = 0, $args = array(), $id = 0) {
            $output .= "<li class=\"list-group-item\">";
            $output .= "<a href='" . esc_url(get_term_link($category)) . "'>";
            $output .= esc_html($category->name);
            $output .= ' (' . esc_html($category->count) . ')';
            $output .= "</a>";
        }
        function end_el(&$output, $page, $depth = 0, $args = array()) {
            $output .= "</li>";
        }
    }
}

?>
