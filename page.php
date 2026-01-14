<?php
/**
 * Page template
 *
 * @package Functionalities_Theme
 * @since 1.0.0
 */

get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class( 'ft-card' ); ?>>
        <header class="ft-card-header">
            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        </header>

        <div class="ft-card-body">
            <?php ft_post_thumbnail(); ?>

            <div class="entry-content">
                <?php
                the_content();
                
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'functionalities-theme' ),
                    'after'  => '</div>',
                ) );
                ?>
            </div>

            <?php if ( get_edit_post_link() ) : ?>
                <footer class="entry-footer">
                    <?php
                    edit_post_link(
                        sprintf(
                            wp_kses(
                                /* translators: %s: Name of current post */
                                __( 'Edit <span class="screen-reader-text">%s</span>', 'functionalities-theme' ),
                                array( 'span' => array( 'class' => array() ) )
                            ),
                            wp_kses_post( get_the_title() )
                        ),
                        '<span class="edit-link">',
                        '</span>'
                    );
                    ?>
                </footer>
            <?php endif; ?>
        </div>
    </article>

    <?php
    if ( comments_open() || get_comments_number() ) {
        comments_template();
    }
    ?>

<?php endwhile; ?>

<?php
get_footer();
