<?php
/**
 * No content template
 *
 * @package Functionalities_Theme
 * @since 1.0.0
 */
?>

<section class="no-results not-found ft-card">
    <header class="ft-card-header">
        <h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'functionalities-theme' ); ?></h1>
    </header>

    <div class="page-content ft-card-body">
        <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

            <p>
                <?php
                printf(
                    wp_kses(
                        /* translators: 1: link to WP admin new post page. */
                        __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'functionalities-theme' ),
                        array( 'a' => array( 'href' => array() ) )
                    ),
                    esc_url( admin_url( 'post-new.php' ) )
                );
                ?>
            </p>

        <?php elseif ( is_search() ) : ?>

            <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'functionalities-theme' ); ?></p>
            <?php get_search_form(); ?>

        <?php else : ?>

            <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'functionalities-theme' ); ?></p>
            <?php get_search_form(); ?>

        <?php endif; ?>
    </div>
</section>
