<?php
/**
 * Frontpage Section: Featured Posts
 *
 * @package Functionalities_Theme
 */

$title = get_theme_mod( 'ft_featured_posts_title', __( 'Featured Posts', 'functionalities-theme' ) );
$post_ids = get_theme_mod( 'ft_featured_posts_ids', '' );

if ( empty( $post_ids ) ) {
    return;
}

$ids = array_map( 'absint', explode( ',', $post_ids ) );

$featured_query = new WP_Query( array(
    'post__in'            => $ids,
    'orderby'             => 'post__in',
    'posts_per_page'      => count( $ids ),
    'ignore_sticky_posts' => true,
) );

if ( ! $featured_query->have_posts() ) {
    return;
}
?>

<section class="section featured-posts">
    <div class="container">
        <?php if ( ! empty( $title ) ) : ?>
            <h2 class="section-title"><?php echo esc_html( $title ); ?></h2>
        <?php endif; ?>

        <div class="posts-grid grid grid-auto">
            <?php
            while ( $featured_query->have_posts() ) :
                $featured_query->the_post();
                get_template_part( 'template-parts/content', 'grid' );
            endwhile;
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>
