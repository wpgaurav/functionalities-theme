<?php
/**
 * Frontpage Latest Posts Section
 *
 * @package Functionalities_Theme
 */

$title = get_theme_mod( 'ft_latest_posts_title', __( 'Latest News', 'functionalities-theme' ) );
$count = get_theme_mod( 'ft_latest_posts_count', 3 );

$latest = new WP_Query( array(
    'posts_per_page'      => $count,
    'ignore_sticky_posts' => true,
) );

if ( $latest->have_posts() ) :
?>
<section class="section latest-posts">
    <div class="container">
        <?php if ( ! empty( $title ) ) : ?>
            <h2 class="section-title">
                <?php ft_icon( 'file-text', 24 ); ?>
                <?php echo esc_html( $title ); ?>
            </h2>
        <?php endif; ?>
        
        <div class="posts-grid grid grid-auto">
            <?php while ( $latest->have_posts() ) : $latest->the_post(); ?>
                <?php get_template_part( 'template-parts/content-grid' ); ?>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    </div>
</section>
<?php endif; ?>
