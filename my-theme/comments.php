<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package My_Theme
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area mt-5 card">
    <div class="card-body">

    <?php if (have_comments()) : ?>
        <h2 class="comments-title mb-4 h4">
            <?php
            $my_theme_comment_count = get_comments_number();
            if ('1' === $my_theme_comment_count) {
                printf(
                    /* translators: 1: title. */
                    esc_html__('One thought on &ldquo;%1$s&rdquo;', 'my-theme'),
                    '<span>' . get_the_title() . '</span>'
                );
            } else {
                printf(
                    /* translators: 1: comment count number, 2: title. */
                    esc_html(_nx('%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $my_theme_comment_count, 'comments title', 'my-theme')),
                    number_format_i18n($my_theme_comment_count),
                    '<span>' . get_the_title() . '</span>'
                );
            }
            ?>
        </h2><!-- .comments-title -->

        <?php the_comments_navigation(array(
            'prev_text' => '<span class="btn btn-sm btn-outline-secondary">&larr; ' . __('Older comments', 'my-theme') . '</span>',
            'next_text' => '<span class="btn btn-sm btn-outline-secondary">' . __('Newer comments', 'my-theme') . ' &rarr;</span>',
            'screen_reader_text' => __('Comments navigation', 'my-theme'),
            'class' => 'comment-navigation mb-3 d-flex justify-content-between'
        )); ?>

        <ol class="comment-list list-unstyled">
            <?php
            wp_list_comments(array(
                'style'      => 'ol',
                'short_ping' => true,
                'avatar_size' => 50, // Display avatars with a size of 50px
                'walker'     => new My_Theme_Bootstrap_Comment_Walker(), // Custom walker for Bootstrap styling
            ));
            ?>
        </ol><!-- .comment-list -->

        <?php the_comments_navigation(array(
            'prev_text' => '<span class="btn btn-sm btn-outline-secondary">&larr; ' . __('Older comments', 'my-theme') . '</span>',
            'next_text' => '<span class="btn btn-sm btn-outline-secondary">' . __('Newer comments', 'my-theme') . ' &rarr;</span>',
            'screen_reader_text' => __('Comments navigation', 'my-theme'),
            'class' => 'comment-navigation mt-3 d-flex justify-content-between'
        ));

        // If comments are closed and there are comments, let's leave a little note, shall we?
        if (!comments_open()) :
            ?>
            <p class="no-comments text-muted mt-3"><?php esc_html_e('Comments are closed.', 'my-theme'); ?></p>
            <?php
        endif;

    endif; // Check for have_comments().

    // Comment Form
    $commenter = wp_get_current_commenter();
    $req = get_option('require_name_email');
    $aria_req = ($req ? " aria-required='true'" : '');
    $html_req = ($req ? " required" : '');

    $fields = array(
        'author' => '<div class="mb-3 comment-form-author">' .
                    '<label for="author" class="form-label">' . __('Name', 'my-theme') . ($req ? ' <span class="required text-danger">*</span>' : '') . '</label> ' .
                    '<input id="author" name="author" type="text" class="form-control" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . $html_req . ' /></div>',
        'email'  => '<div class="mb-3 comment-form-email"><label for="email" class="form-label">' . __('Email', 'my-theme') . ($req ? ' <span class="required text-danger">*</span>' : '') . '</label> ' .
                    '<input id="email" name="email" type="email" class="form-control" value="' . esc_attr($commenter['comment_author_email']) . '" size="30" aria-describedby="email-notes"' . $aria_req . $html_req . ' /></div>',
        'url'    => '<div class="mb-3 comment-form-url"><label for="url" class="form-label">' . __('Website', 'my-theme') . '</label>' .
                    '<input id="url" name="url" type="url" class="form-control" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" /></div>',
        'cookies' => '<div class="mb-3 form-check comment-form-cookies-consent">' .
                     '<input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" class="form-check-input" value="yes"' . (empty($commenter['comment_author_email']) ? '' : ' checked="checked"') . ' /> ' .
                     '<label for="wp-comment-cookies-consent" class="form-check-label">' . __('Save my name, email, and website in this browser for the next time I comment.', 'my-theme') . '</label></div>',
    );

    $defaults = array(
        'fields'               => $fields,
        'comment_field'        => '<div class="mb-3 comment-form-comment"><label for="comment" class="form-label">' . _x('Comment', 'noun', 'my-theme') . ' <span class="required text-danger">*</span></label><textarea id="comment" name="comment" class="form-control" cols="45" rows="5" maxlength="65525" aria-required="true" required></textarea></div>',
        /** This filter is documented in wp-includes/link-template.php */
        'must_log_in'          => '<p class="must-log-in text-muted">' . sprintf(
                                        /* translators: %s: login URL */
                                        __('You must be <a href="%s">logged in</a> to post a comment.', 'my-theme'),
                                        wp_login_url(apply_filters('the_permalink', get_permalink(get_the_ID()), get_the_ID()))
                                    ) . '</p>',
        /** This filter is documented in wp-includes/link-template.php */
        'logged_in_as'         => '<p class="logged-in-as text-muted">' . sprintf(
                                        /* translators: 1: edit user link, 2: logout link, 3: user name */
                                        __('Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s">Log out?</a>', 'my-theme'),
                                        get_edit_user_link(),
                                        $user_identity,
                                        wp_logout_url(apply_filters('the_permalink', get_permalink(get_the_ID()), get_the_ID()))
                                    ) . '</p>',
        'comment_notes_before' => '<p class="comment-notes text-muted"><span id="email-notes">' . __('Your email address will not be published.', 'my-theme') . '</span>' . ($req ? ' ' . __('Required fields are marked <span class="required text-danger">*</span>', 'my-theme') : '') . '</p>',
        'comment_notes_after'  => '',
        'id_form'              => 'commentform',
        'id_submit'            => 'submit',
        'class_form'           => 'comment-form',
        'class_submit'         => 'btn btn-primary',
        'name_submit'          => 'submit',
        'title_reply'          => esc_html__('Leave a Reply', 'my-theme'),
        'title_reply_to'       => esc_html__('Leave a Reply to %s', 'my-theme'),
        'title_reply_before'   => '<h3 id="reply-title" class="comment-reply-title h4">',
        'title_reply_after'    => '</h3>',
        'cancel_reply_before'  => ' <small>',
        'cancel_reply_after'   => '</small>',
        'cancel_reply_link'    => esc_html__('Cancel reply', 'my-theme'),
        'label_submit'         => esc_html__('Post Comment', 'my-theme'),
        'submit_button'        => '<button name="%1$s" type="submit" id="%2$s" class="%3$s">%4$s</button>',
        'submit_field'         => '<p class="form-submit">%1$s %2$s</p>',
        'format'               => 'html5', // Use HTML5 for the form
    );

    comment_form($defaults);
    ?>
    </div><!-- .card-body -->
</div><!-- #comments -->
<?php
// Custom walker is now in functions.php
?>
