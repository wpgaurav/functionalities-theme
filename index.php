<?php
/**
 * Main template file
 *
 * @package Functionalities_Theme
 * @since 1.0.0
 */

get_header();

$blog_layout = get_theme_mod( 'ft_blog_layout', 'grid' );
$has_sidebar = ft_has_sidebar() && ! is_front_page();
?>

<?php if ( $has_sidebar ) : ?>
<div class="with-sidebar <?php echo esc_attr( ft_get_sidebar_class() ); ?>">
    <div class="content-area">
<?php endif; ?>

<?php if ( ! is_front_page() ) : ?>
    <header class="page-header">
        <?php if ( is_home() && ! is_front_page() ) : ?>
            <h1 class="page-title"><?php single_post_title(); ?></h1>
        <?php elseif ( is_archive() ) : ?>
            <?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
            <?php the_archive_description( '<p class="page-subtitle">', '</p>' ); ?>
        <?php elseif ( is_search() ) : ?>
            <h1 class="page-title">
                <?php
                printf(
                    /* translators: %s: search query */
                    esc_html__( 'Search Results for: %s', 'functionalities-theme' ),
                    '<span>' . esc_html( get_search_query() ) . '</span>'
                );
                ?>
            </h1>
        <?php endif; ?>
    </header>
<?php endif; ?>

<?php if ( have_posts() ) : ?>
    
    <div class="posts grid-auto">
        <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'template-parts/content', get_post_type() ); ?>
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

<?php
get_footer();
