<?php
/**
 * Frontpage Section: Contact
 *
 * @package Functionalities_Theme
 */

$title = get_theme_mod( 'ft_contact_title', __( 'Contact Us', 'functionalities-theme' ) );
$text = get_theme_mod( 'ft_contact_text', __( 'Have questions? We\'d love to hear from you. Fill out the form below and we\'ll get back to you as soon as possible.', 'functionalities-theme' ) );
$shortcode = get_theme_mod( 'ft_contact_shortcode', '' );
?>

<section class="section contact">
    <div class="container container-narrow">
        <?php if ( ! empty( $title ) ) : ?>
            <h2 class="section-title text-center"><?php echo esc_html( $title ); ?></h2>
        <?php endif; ?>

        <?php if ( ! empty( $text ) ) : ?>
            <div class="section-desc text-center">
                <?php echo wp_kses_post( $text ); ?>
            </div>
        <?php endif; ?>

        <div class="contact-form-container card">
            <div class="card-body">
                <?php if ( ! empty( $shortcode ) ) : ?>
                    <?php echo do_shortcode( $shortcode ); ?>
                <?php else : ?>
                    <p class="text-center text-muted">
                        <?php esc_html_e( 'Please add a form shortcode in the Customizer.', 'functionalities-theme' ); ?>
                    </p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
