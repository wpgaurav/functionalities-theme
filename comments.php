<?php
/**
 * Comments Template
 *
 * @package Functionalities_Theme
 * @since 1.0.0
 */

if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="ft-comments ft-card">

    <?php if ( have_comments() ) : ?>
        <h2 class="ft-comments-title ft-card-header">
            <?php
            $ft_comment_count = get_comments_number();
            if ( '1' === $ft_comment_count ) {
                printf(
                    /* translators: 1: title */
                    esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'functionalities-theme' ),
                    '<span>' . wp_kses_post( get_the_title() ) . '</span>'
                );
            } else {
                printf(
                    /* translators: 1: comment count number, 2: title */
                    esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $ft_comment_count, 'comments title', 'functionalities-theme' ) ),
                    number_format_i18n( $ft_comment_count ),
                    '<span>' . wp_kses_post( get_the_title() ) . '</span>'
                );
            }
            ?>
        </h2>

        <div class="ft-card-body">
            <?php the_comments_navigation(); ?>

            <ol class="comment-list">
                <?php
                wp_list_comments( array(
                    'style'      => 'ol',
                    'short_ping' => true,
                ) );
                ?>
            </ol>

            <?php the_comments_navigation(); ?>
        </div>

        <?php if ( ! comments_open() ) : ?>
            <p class="no-comments" style="padding: 16px;"><?php esc_html_e( 'Comments are closed.', 'functionalities-theme' ); ?></p>
        <?php endif; ?>

    <?php endif; ?>

    <div class="ft-card-body">
        <?php
        comment_form( array(
            'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title" style="margin-bottom: 16px;">',
            'title_reply_after'  => '</h3>',
        ) );
        ?>
    </div>

</div>
