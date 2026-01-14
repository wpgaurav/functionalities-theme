<?php
/**
 * Frontpage Section: Custom HTML
 *
 * @package Functionalities_Theme
 */

$content = get_theme_mod( 'ft_custom_html_content', '' );

if ( empty( $content ) ) {
    return;
}
?>

<section class="section custom-html">
    <div class="container">
        <?php echo wp_kses_post( $content ); ?>
    </div>
</section>
