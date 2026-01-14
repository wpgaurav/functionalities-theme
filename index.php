<?php
/**
 * Main template file
 *
 * @package Functionalities_Theme
 * @since 1.0.0
 */

get_header();

// Sections to render
$sections = array(
    'blog_hero'     => get_theme_mod( 'ft_blog_hero_priority', 10 ),
    'blog_featured' => get_theme_mod( 'ft_blog_featured_priority', 20 ),
    'blog_filters'  => get_theme_mod( 'ft_blog_filters_priority', 30 ),
    'blog_html'     => get_theme_mod( 'ft_blog_html_priority', 90 ),
);

asort( $sections );

$blog_layout = get_theme_mod( 'ft_blog_layout', 'grid' );
$blog_columns = get_theme_mod( 'ft_blog_columns', '3' );
$has_sidebar = ft_has_sidebar() && get_theme_mod( 'ft_blog_show_sidebar', true );

// Render sections before main loop
foreach ( $sections as $section_id => $priority ) {
    $enabled = get_theme_mod( "ft_{$section_id}_enable", true );
    if ( $enabled ) {
        get_template_part( 'template-parts/blog/section', str_replace( 'blog_', '', $section_id ) );
    }
}
?>

<div class="container main-content-wrap">
    <?php if ( $has_sidebar ) : ?>
    <div class="with-sidebar <?php echo esc_attr( ft_get_sidebar_class() ); ?>">
        <div class="content-area">
    <?php endif; ?>

    <?php if ( have_posts() ) : ?>
        
        <div class="posts <?php echo 'grid' === $blog_layout ? 'grid grid-' . esc_attr( $blog_columns ) : 'list-layout'; ?>">
            <?php while ( have_posts() ) : the_post(); ?>
                <?php 
                if ( 'grid' === $blog_layout ) {
                    get_template_part( 'template-parts/content-grid' ); 
                } else {
                    get_template_part( 'template-parts/content', get_post_type() );
                }
                ?>
            <?php endwhile; ?>
        </div>
        
        <?php ft_pagination(); ?>

    <?php else : ?>
        
        <?php get_template_part( 'template-parts/content', 'none' ); ?>

    <?php endif; ?>

    <?php if ( $has_sidebar ) : ?>
        </div><!-- .content-area -->
        <?php get_sidebar(); ?>
    </div><!-- .with-sidebar -->
    <?php endif; ?>
</div>

<?php
get_footer();
