<aside class="sidebar">
    <?php if (is_active_sidebar('main-sidebar')) : ?>
        <?php dynamic_sidebar('main-sidebar'); ?>
    <?php else : ?>
        <!-- Fallback content if no widgets are active -->
        <div class="widget card mb-3">
            <div class="card-header"><h3 class="widget-title h5">Search</h3></div>
            <div class="card-body">
                <?php // get_search_form(); // Default search form might need a filter for BS5 styling ?>
                <form role="search" method="get" class="search-form input-group" action="<?php echo esc_url(home_url('/')); ?>">
                    <label class="visually-hidden" for="s"><?php _e('Search for:', 'my-theme'); ?></label>
                    <input type="search" id="s" class="form-control" placeholder="<?php esc_attr_e('Search &hellip;', 'my-theme'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
                    <button type="submit" class="btn btn-outline-secondary"><?php esc_html_e('Search', 'my-theme'); ?></button>
                </form>
            </div>
        </div>

        <div class="widget card mb-3">
            <div class="card-header"><h3 class="widget-title h5">Recent Posts</h3></div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <?php
                    $recent_posts = wp_get_recent_posts(array(
                        'numberposts' => 5,
                        'post_status' => 'publish'
                    ));
                    foreach ($recent_posts as $post_item) : ?>
                        <li class="list-group-item">
                            <a href="<?php echo get_permalink($post_item['ID']); ?>">
                                <?php echo esc_html($post_item['post_title']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <div class="widget card mb-3">
            <div class="card-header"><h3 class="widget-title h5">Archives</h3></div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <?php wp_get_archives(array('type' => 'monthly', 'format' => 'html', 'before' => '<li class="list-group-item">', 'after' => '</li>')); ?>
                </ul>
            </div>
        </div>

        <div class="widget card mb-3">
            <div class="card-header"><h3 class="widget-title h5">Categories</h3></div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <?php wp_list_categories(array('title_li' => '', 'style' => 'list', 'walker' => new My_Theme_Category_Walker())); ?>
                </ul>
            </div>
        </div>
    <?php endif; ?>
</aside>
<?php
// Custom category walker is now in functions.php
?>
