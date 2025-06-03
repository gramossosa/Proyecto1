<?php get_header(); ?>

<div class="container mt-4">
    <div class="row">
        <main class="col-md-8">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('mb-5'); ?>>
                        <header class="entry-header mb-4">
                            <?php the_title('<h1 class="entry-title display-5">', '</h1>'); ?>
                            <?php if (get_edit_post_link()) : ?>
                                <p class="entry-meta text-muted small">
                                    <?php edit_post_link(__('Edit this page', 'my-theme'), '<span class="edit-link">', '</span>'); ?>
                                </p>
                            <?php endif; ?>
                        </header>

                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail mb-4">
                                <?php the_post_thumbnail('large', array('class' => 'img-fluid rounded')); ?>
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

                    </article><!-- #post-<?php the_ID(); ?> -->

                    <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                    ?>

                <?php endwhile; // End of the loop. ?>
            <?php else : ?>
                <p><?php _e('Sorry, no page matched your criteria.', 'my-theme'); ?></p>
            <?php endif; ?>
        </main>

        <aside class="col-md-4">
            <?php get_sidebar(); ?>
        </aside>
    </div><!-- .row -->
</div><!-- .container -->

<?php get_footer(); ?>
