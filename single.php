<?php
/**
 * Single post template
 *
 * @package Functionalities_Theme
 * @since 1.0.0
 */

get_header();

$post_type = get_post_type();
$hero_layout = get_theme_mod( "ft_{$post_type}_hero_layout", 'top' );
$show_meta = get_theme_mod( "ft_{$post_type}_show_meta", true );
$has_sidebar = ft_has_sidebar() && get_theme_mod( "ft_{$post_type}_show_sidebar", true );
$show_author = get_theme_mod( "ft_{$post_type}_author_enable", true );
$show_related = get_theme_mod( "ft_{$post_type}_related_enable", true );
?>

<div class="container main-content-wrap">
    <?php if ( $has_sidebar ) : ?>
    <div class="with-sidebar <?php echo esc_attr( ft_get_sidebar_class() ); ?>">
        <div class="content-area">
    <?php endif; ?>

    <?php while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class( 'card single-post hero-layout-' . esc_attr( $hero_layout ) ); ?> itemscope itemtype="https://schema.org/Article">
            
            <?php if ( 'overlay' === $hero_layout && has_post_thumbnail() ) : ?>
                <div class="hero-overlay" style="background-image: url('<?php echo esc_url( get_the_post_thumbnail_url( null, 'full' ) ); ?>');">
                    <div class="hero-overlay-content">
                        <?php the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' ); ?>
                        <?php if ( $show_meta ) : ?>
                            <div class="entry-meta post-meta">
                                <?php ft_posted_on(); ?>
                                <?php ft_posted_by(); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php else : ?>
                
                <?php if ( 'top' === $hero_layout ) : ?>
                    <?php ft_post_thumbnail(); ?>
                <?php endif; ?>
                
                <header class="card-header">
                    <?php the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' ); ?>
                    
                    <?php if ( $show_meta ) : ?>
                        <div class="entry-meta post-meta">
                            <?php ft_posted_on(); ?>
                            <?php ft_posted_by(); ?>
                        </div>
                    <?php endif; ?>
                </header>
                
                <?php if ( 'bottom' === $hero_layout ) : ?>
                    <?php ft_post_thumbnail(); ?>
                <?php endif; ?>
                
            <?php endif; ?>

            <div class="card-body">
                <div class="entry-content readable-content" itemprop="articleBody">
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

        <?php if ( $show_author && 'post' === $post_type ) : ?>
            <?php get_template_part( 'template-parts/single/author-box' ); ?>
        <?php endif; ?>

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
</div>

<?php if ( $show_related && 'post' === $post_type ) : ?>
    <?php get_template_part( 'template-parts/single/related-posts' ); ?>
<?php endif; ?>

<?php
get_footer();
