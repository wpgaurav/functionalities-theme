<?php
/**
 * Blog Section: Custom HTML
 */

$html = get_theme_mod( 'ft_blog_custom_html', '' );

if ( empty( $html ) ) {
    return;
}
?>

<section class="blog-custom-html section">
    <div class="container">
        <?php echo do_shortcode( wp_kses_post( $html ) ); ?>
    </div>
</section>
