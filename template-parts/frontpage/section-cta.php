<?php
/**
 * Frontpage CTA Section
 *
 * @package Functionalities_Theme
 */

$title = get_theme_mod( 'ft_cta_title', __( 'Ready to get started?', 'functionalities-theme' ) );
$text = get_theme_mod( 'ft_cta_text', __( 'Join us today.', 'functionalities-theme' ) );
$btn_text = get_theme_mod( 'ft_cta_btn_text', __( 'Sign Up Now', 'functionalities-theme' ) );
$btn_url = get_theme_mod( 'ft_cta_btn_url', '#' );
?>

<section class="section cta bg-light">
    <div class="container text-center">
        <?php if ( ! empty( $title ) ) : ?>
            <h2 class="section-title"><?php echo esc_html( $title ); ?></h2>
        <?php endif; ?>

        <?php if ( ! empty( $text ) ) : ?>
            <div class="section-desc">
                <?php echo wp_kses_post( $text ); ?>
            </div>
        <?php endif; ?>

        <?php if ( ! empty( $btn_text ) ) : ?>
            <div class="section-actions">
                <a href="<?php echo esc_url( $btn_url ); ?>" class="btn btn-primary btn-lg">
                    <?php echo esc_html( $btn_text ); ?>
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>

