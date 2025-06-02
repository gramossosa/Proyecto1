<aside class="sidebar">
    <?php if (is_active_sidebar('main-sidebar')) : ?>
        <?php dynamic_sidebar('main-sidebar'); ?>
    <?php else : ?>
        <!-- Fallback content if no widgets are active -->
        <div class="widget">
            <h3>Search</h3>
            <?php get_search_form(); ?>
        </div>

        <div class="widget">
            <h3>Recent Posts</h3>
            <ul>
                <?php
                $recent_posts = wp_get_recent_posts(array(
                    'numberposts' => 5,
                    'post_status' => 'publish'
                ));
                foreach ($recent_posts as $post_item) : ?>
                    <li>
                        <a href="<?php echo get_permalink($post_item['ID']); ?>">
                            <?php echo esc_html($post_item['post_title']); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        
        <div class="widget">
            <h3>Archives</h3>
            <ul>
                <?php wp_get_archives('type=monthly'); ?>
            </ul>
        </div>

        <div class="widget">
            <h3>Categories</h3>
            <ul>
                <?php wp_list_categories('title_li='); ?>
            </ul>
        </div>
    <?php endif; ?>
</aside>
