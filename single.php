<?php
/**
 * Single post template
 *
 * @package Functionalities_Theme
 * @since 1.0.0
 */

get_header();

$has_sidebar = ft_has_sidebar();
?>

<?php if ( $has_sidebar ) : ?>
<div class="with-sidebar <?php echo esc_attr( ft_get_sidebar_class() ); ?>">
    <div class="content-area">
<?php endif; ?>

<?php while ( have_posts() ) : the_post(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class( 'card single-post' ); ?>>
        <header class="card-header">
            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            
            <div class="entry-meta post-meta">
                <?php ft_posted_on(); ?>
                <?php ft_posted_by(); ?>
            </div>
        </header>

        <?php ft_post_thumbnail(); ?>

        <div class="card-body">
            <div class="entry-content readable-content">
                <?php
                the_content(
                    sprintf(
                        wp_kses(
                            /* translators: %s: Name of current post */
                            __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'functionalities-theme' ),
                            array( 'span' => array( 'class' => array() ) )
                        ),
                        wp_kses_post( get_the_title() )
                    )
                );
                
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'functionalities-theme' ),
                    'after'  => '</div>',
                ) );
                ?>
            </div>

            <footer class="entry-footer readable-content">
                <?php ft_entry_footer(); ?>
            </footer>
        </div>
    </article>

    <?php ft_post_navigation(); ?>

    <?php
    if ( comments_open() || get_comments_number() ) {
        comments_template();
    }
    ?>

<?php endwhile; ?>

<?php if ( $has_sidebar ) : ?>
    </div><!-- .content-area -->
    <?php get_sidebar(); ?>
</div><!-- .with-sidebar -->
<?php endif; ?>

<?php
get_footer();
