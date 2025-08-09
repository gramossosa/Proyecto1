<?php get_header(); ?>

<div class="container mt-4">
    <div class="row">
        <main class="col-md-8">
            <div class="main-content p-4">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('mb-5'); ?>>
                            <header class="entry-header mb-4">
                            <?php the_title('<h1 class="entry-title display-5">', '</h1>'); ?>
                            <p class="entry-meta text-muted small">
                                Posted on <?php the_time('F j, Y'); ?> by <?php the_author_posts_link(); ?>
                                <?php if (has_category()) : ?>
                                    | Categories: <?php the_category(', '); ?>
                                <?php endif; ?>
                                <?php if (get_edit_post_link()) : ?>
                                    | <?php edit_post_link(__('Edit this post', 'my-theme'), '<span class="edit-link">', '</span>'); ?>
                                <?php endif; ?>
                            </p>
                        </header>

                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail mb-4">
                                <?php the_post_thumbnail('large', array('class' => 'img-fluid rounded')); // Using 'large' or 'full', img-fluid for responsiveness ?>
                            </div>
                        <?php endif; ?>

                        <div class="entry-content">
                            <?php the_content(); ?>
                            <?php
                            wp_link_pages(array(
                                'before' => '<div class="page-links">' . __('Pages:', 'my-theme'),
                                'after'  => '</div>',
                                'link_before' => '<span class="page-number">',
                                'link_after'  => '</span>',
                            ));
                            ?>
                        </div><!-- .entry-content -->

                        <?php if (has_tag()) : ?>
                        <footer class="entry-footer mt-4 pt-2 border-top">
                            <p class="post-tags text-muted small">
                                <?php the_tags(__('Tags: ', 'my-theme'), ', ', ''); ?>
                            </p>
                        </footer><!-- .entry-footer -->
                        <?php endif; ?>

                    </article><!-- #post-<?php the_ID(); ?> -->

                    <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                    ?>

                <?php endwhile; // End of the loop. ?>
            <?php else : ?>
                <p><?php _e('Sorry, no post matched your criteria.', 'my-theme'); ?></p>
            <?php endif; ?>
            </div>
        </main>

        <aside class="col-md-4">
            <?php get_sidebar(); ?>
        </aside>
    </div><!-- .row -->
</div><!-- .container -->

<?php get_footer(); ?>
