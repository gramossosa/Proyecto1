<?php get_header(); ?>

<div class="container mt-4"> <div class="row">
        <main class="col-md-8">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('card mb-4'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium_large', array('class' => 'card-img-top')); ?>
                            </a>
                        <?php endif; ?>
                        <div class="card-body">
                            <h2 class="card-title h4"><a href="<?php the_permalink(); ?>" class="text-decoration-none"><?php the_title(); ?></a></h2>
                            <p class="card-subtitle mb-2 text-muted small">
                                Posted on <?php the_time('F j, Y'); ?> by <?php the_author_posts_link(); ?>
                                <?php if (has_category()) : ?>
                                    | Categories: <?php the_category(', '); ?>
                                <?php endif; ?>
                            </p>
                            <div class="card-text">
                                <?php the_excerpt(); // Or the_content(); for full content ?>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-sm">Read More &raquo;</a>
                        </div>
                    </article>
                <?php endwhile; ?>

                <?php
                // Pagination
                the_posts_pagination(array(
                    'prev_text' => __('&laquo; Previous', 'my-theme'),
                    'next_text' => __('Next &raquo;', 'my-theme'),
                    'screen_reader_text' => __('Posts navigation', 'my-theme'),
                    'aria_label' => __('Posts', 'my-theme'),
                    'class' => 'pagination justify-content-center',
                ));
                ?>

            <?php else : ?>
                <p><?php _e('Sorry, no posts matched your criteria.', 'my-theme'); ?></p>
            <?php endif; ?>
        </main>

        <aside class="col-md-4">
            <?php get_sidebar(); ?>
        </aside>
    </div>
</div>

<?php get_footer(); ?>
