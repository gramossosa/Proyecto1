<?php get_header(); ?>

<main id="main" class="site-main">
    <div class="container">
        <?php
        if ( have_posts() ) {
            // Start the Loop.
            while ( have_posts() ) {
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                    </header>
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                </article>
                <?php
            }
        } else {
            // If no content, include the "No posts found" template.
            echo "<p>Sorry, no posts matched your criteria.</p>";
        }
        ?>
    </div>
</main>

<?php get_footer(); ?>
