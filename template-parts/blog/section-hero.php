<?php
/**
 * Blog Section: Hero
 */

$title = get_theme_mod( 'ft_blog_hero_title', '' );
$desc  = get_theme_mod( 'ft_blog_hero_desc', '' );

if ( empty( $title ) ) {
    if ( is_home() ) {
        $title = get_the_title( get_option( 'page_for_posts' ) );
    } else {
        $title = get_the_archive_title();
    }
}

if ( empty( $desc ) ) {
    $desc = get_the_archive_description();
}
?>

<header class="blog-hero section text-center">
    <div class="container container-narrow">
        <h1 class="page-title"><?php echo esc_html( $title ); ?></h1>
        <?php if ( ! empty( $desc ) ) : ?>
            <div class="section-desc"><?php echo wp_kses_post( $desc ); ?></div>
        <?php endif; ?>
    </div>
</header>
