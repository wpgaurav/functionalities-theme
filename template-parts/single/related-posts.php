<?php
/**
 * Related Posts Template
 *
 * @package Functionalities_Theme
 */

$post_id = get_the_ID();
$post_type = get_post_type();
$categories = wp_get_post_categories( $post_id, array( 'fields' => 'ids' ) );
$count = get_theme_mod( "ft_{$post_type}_related_count", 3 );

if ( empty( $categories ) ) {
    return;
}

$related_query = new WP_Query( array(
    'category__in'        => $categories,
    'post__not_in'        => array( $post_id ),
    'posts_per_page'      => $count,
    'ignore_sticky_posts' => true,
    'orderby'             => 'rand',
) );

if ( ! $related_query->have_posts() ) {
    return;
}
?>

<aside class="related-posts section" aria-labelledby="related-posts-heading">
    <div class="container">
        <h3 id="related-posts-heading" class="section-title">
            <?php esc_html_e( 'Related Articles', 'functionalities-theme' ); ?>
        </h3>
        
        <div class="posts-grid grid grid-3">
            <?php
            while ( $related_query->have_posts() ) :
                $related_query->the_post();
                get_template_part( 'template-parts/content-grid' );
            endwhile;
            wp_reset_postdata();
            ?>
        </div>
    </div>
</aside>
