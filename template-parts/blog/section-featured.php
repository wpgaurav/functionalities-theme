<?php
/**
 * Blog Section: Featured Posts
 */

$post_ids_raw = get_theme_mod( 'ft_blog_featured_ids', '' );
if ( empty( $post_ids_raw ) ) {
    return;
}

$post_ids = array_map( 'trim', explode( ',', $post_ids_raw ) );
$post_ids = array_filter( $post_ids, 'is_numeric' );

if ( empty( $post_ids ) ) {
    return;
}

$featured_query = new WP_Query( array(
    'post__in'            => $post_ids,
    'orderby'             => 'post__in',
    'posts_per_page'      => count( $post_ids ),
    'ignore_sticky_posts' => 1,
) );

if ( ! $featured_query->have_posts() ) {
    return;
}
?>

<section class="blog-featured section bg-light">
    <div class="container">
        <div class="posts-grid grid grid-3">
            <?php while ( $featured_query->have_posts() ) : $featured_query->the_post(); ?>
                <?php get_template_part( 'template-parts/content-grid' ); ?>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    </div>
</section>
